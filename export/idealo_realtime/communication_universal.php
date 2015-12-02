<?php

/*
	Idealo, Export-Modul

	(c) Idealo 2013,
	
	Please note that this extension is provided as is and without any warranty. It is recommended to always backup your installation prior to use. Use at your own risk.
	
	Extended by
	
	Christoph Zurek (Idealo Internet GmbH, http://www.idealo.de)
*/






define('IDEALO_REQUEST_ERROR_TABLE', 'idealo_realtime_failed_request');

class communication_universal{
	public $certificate = true;
	public $modul_deactivate = array ('not_Partner' => 'NOT Partner',
									  'csv_mode' => 'CSV update mode',
									  'not_active' => 'shop is not active for partnerLogin',
									  'not_known' => 'shop is unknown in database',
							        );
									 
	public $noMoreSendError = array('Empty content',
	                                'There is no SKU in line',
	                                'Wrong price format in line',
	                               );

	public $login = array();
	
	private $PWSURL = 'http://ftp.idealo.de/software/modules/version.xml';
	
	 public function checkShopStatus($result_exec){
	 	foreach($this->modul_deactivate as $rule){
	 		if(strpos($result_exec, $rule)){
		 		$this->deaktivateModule();
		 		$this->dropErrorTable();
		 		return false;
		 	}
	 	}
	 	
	 	return true;
	 }


	public function getPWSURL(){
		$xml_idealo = simplexml_load_file($this->PWSURL);
		
		if($xml_idealo === false){
			$xml_idealo = new DOMDocument();
			$xml_idealo->loadXml(file_get_contents($this->PWSURL));
			if($xml_idealo !== false){
				$xml_idealo = $this->_process($xml_idealo);
				return $xml_idealo['version']['partenws']['live_v1']['#text'];
			}else{
				$this->errorMessageSimpleXML();
			}
		}else{
			return (string)$xml_idealo->partenws->live_v1;
		}
	}

	function _process($node) { 
		$occurance = array();
 
		foreach($node->childNodes as $child) {
			$occurance[$child->nodeName]++;
		}
 
		if($node->nodeType == XML_TEXT_NODE) { 
			$result = html_entity_decode(htmlentities($node->nodeValue, ENT_COMPAT, 'UTF-8'), 
                                     ENT_COMPAT,'ISO-8859-15');
		} 
		else {
			if($node->hasChildNodes()){
				$children = $node->childNodes;
 
				for($i=0; $i<$children->length; $i++) {
					$child = $children->item($i);
 
					if($child->nodeName != '#text') {
						if($occurance[$child->nodeName] > 1) {
							$result[$child->nodeName][] = $this->_process($child);
						}
						else {
							$result[$child->nodeName] = $this->_process($child);
						}
					}
					else if ($child->nodeName == '#text') {
						$text = $this->_process($child);
 
						if (trim($text) != '') {
							$result[$child->nodeName] = $this->_process($child);
						}
					}
				}
			} 
 
			if($node->hasAttributes()) { 
				$attributes = $node->attributes;
 
				if(!is_null($attributes)) {
					foreach ($attributes as $key => $attr) {
						$result["@".$attr->name] = $attr->value;
					}
				}
			}
		}
 
		return $result;
	}
	public function getTestLogin(){		
		$xml_idealo = simplexml_load_file($this->PWSURL);
		
		if($xml_idealo === false){
			$xml_idealo = new DOMDocument();
			$xml_idealo->loadXml(file_get_contents($this->PWSURL));
			if($xml_idealo !== false){
				$xml_idealo = $this->_process($xml_idealo);
				$this->login = array(	'shop_id'	=> $xml_idealo['version']['partenws']['shopid']['#text'],
										'user'		=> $xml_idealo['version']['partenws']['user']['#text'],
										'password'	=> $xml_idealo['version']['partenws']['password']['#text'],
										'url'		=> $xml_idealo['version']['partenws']['url']['#text'],
										'testmode'	=> '1'
									);
			}else{
				$this->errorMessageSimpleXML();
			}
		}else{
			$this->login = array(	'shop_id'	=> (string)$xml_idealo->partenws->shopid,
									'user'		=> (string)$xml_idealo->partenws->user,
									'password'	=> (string)$xml_idealo->partenws->password,
									'url'		=> (string)$xml_idealo->partenws->url,
									'testmode'	=> '1'
								);
		}
	
	}
	
	public function errorMessageSimpleXML(){
		echo '<script type="text/javascript">
			alert("Daten konnten nicht geladen werden!\n\nFragen Sie bei Ihren Hoster nach, ob SimpleXML, oder DomDocument für Ihren Shop verfügbar ist?\nOhne SimpleXML können wichtige Daten vom Modul nicht geladen werden und damit keine Angebote an idealo übertragen werden!");
			</script>';
	}
	
	public function getOfferList($page){
		$ch = curl_init ();

		$this->createErrorTable();
		setlocale(LC_ALL, 'de_DE'); 
		date_default_timezone_set('Europe/Berlin');
		$date = date("j.n.Y H:i:s"); 

		$header = array(
		            	'shopId: ' . str_replace(" ", "", $this->login['shop_id']),
		           		'Content-Type: application/xml; charset=utf-8',
		           		'Expect:'.''
		  	           );

		curl_setopt($ch, CURLOPT_HTTPGET, TRUE);	
		curl_setopt($ch, CURLOPT_TIMEOUT, 180);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, str_replace(" ", "", $this->login['user']) . ':' . str_replace(" ", "", $this->login['password']));
		curl_setopt($ch, CURLOPT_URL, $this->login['url'] . 'getOffers/?pageNumber=' . $page . '&pageSize=50');           

		if($this->certificate === false){
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		}
		
		$result_exec = curl_exec($ch);

		if(strpos($result_exec, 'sku') !== false){
			$oXML = new SimpleXMLElement($result_exec);
		}else{
			return array();
		}

		curl_close($ch);		
		return $oXML;
	}
	
	
	
	public function checkXML($xml){
		$dom = new DOMDocument();
		$dom->loadXML($xml);
		$elements = $dom->getElementsByTagName('*');
		
		foreach($elements as $element){
		   if(!$element->hasChildNodes() OR $element->nodeValue == ''){
		       $element->parentNode->removeChild($element);
		   }
		} 

		if($dom->getElementsByTagName('offers')->length > 0){
			return $dom->saveXML();
		}else{
			return false;
		}
		
	}


	public function sendRequest($xml, $showLog = false, $db_request_failed_id = '-1'){

		if($xml !== false  && $xml != ''){
			$ch = curl_init($this->login['url'] . "updateOffers");
	
			$this->createErrorTable();
			setlocale(LC_ALL, 'de_DE'); 
			date_default_timezone_set('Europe/Berlin');
			$date = date("j.n.Y H:i:s"); 
	
			$header = array(
			            	'shopId: ' . str_replace(" ", "", $this->login['shop_id']),
			           		'Content-Type: application/xml; charset=utf-8',
			           		'Expect:'.''
			  	           );
					
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_TIMEOUT, 180);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_USERPWD, str_replace(" ", "", $this->login['user']) . ':' . str_replace(" ", "", $this->login['password']));
	
			if($this->certificate === false){
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			}
			
			$result_exec = curl_exec($ch);
	
			if($this->checkShopStatus($result_exec) === true){				
				$ws_result = '';
				$missed = false;
				$error_message = '';
				$info = curl_getinfo($ch);
				$error = curl_error($ch);
				$xml_elements = '';
	
				try{
					@$ws_result = new SimpleXMLElement($result_exec);
					$xml_elements = count($ws_result);
					$ws_error = '';
					
					if(isset($ws_result->error[0]->message) || isset($ws_result->error[0]->code)){
						$ws_error = 'PartnerWS:<br><br>';
						for($i = 0; $i < $xml_elements; $i++){
							$message = '';
							if(isset($ws_result->error[$i]->message)){
								$message = $ws_result->error[$i]->message;
							}
							
							$code = '';
							
							if(isset($ws_result->error[$i]->code)){
								$code = $ws_result->error[$i]->code;
							}
							
							$ws_error .= 'MESSAGE: '. $message . '   WS_CODE: ' . $code . '<br>';
						}
					}else{
						$ws_error = '';
					}
			
					$result = array (	'info' 		=> $info,
									  	'error'		=> $error,
									  	'ws_error'	=> $ws_error
									);
	
					if($result['error'] != '' || $result['info']['http_code'] != '200' || $result['ws_error'] != ''){
						$error_message = $result['error'] . '<br>' . $result['ws_error'];
						$missed = true;
					}
				}catch(Exception $e){	
					$error_message = $result_exec . '<br>HTTP_CODE: ' . $info['http_code'] . '<br>' . $error;
					$missed = true;
				}
				
				$login = false;
				
				if(strpos($result_exec, 'Access denied') || strpos($result_exec, 'This request requires HTTP authentication')){				
					curl_close ($ch);
					echo '<script type="text/javascript">
						alert("Zugriff verweigert!\nShopID, Nutzername, oder Passwort falsch!");
					</script>';
					return false;
				}
				
				if($missed){
					if(isset($this->login['testmode'])){
						if($this->login['testmode'] == '0'){
							$this->updateErrorTable($xml, $db_request_failed_id, $this->login['shop_id'], $date, $error_message);
						}
					}else{
						$this->updateErrorTable($xml, $db_request_failed_id, $this->login['shop_id'], $date, $error_message);
					}
				}
				
				$path = $this->path.'export/';
				
				if($missed && isset($this->login['testmode'])){
					if($this->login['testmode'] == '1' ){
						$dateihandle = fopen($path . 'idealo_realtime_test.html', "r");
						$zeile = fgets($dateihandle, 4096);
											
						if($zeile == 'no errors'){		
							$fp = fopen($path . 'idealo_realtime_test.html', "w");
							fputs($fp,  $error_message);
					    	fclose($fp);
						}else{
							$fp = fopen($path . 'idealo_realtime_test.html', "a+");
							fputs($fp,  $error_message);
					    	fclose($fp);
						}
					}
				}			
				
		        $fp = fopen($path . 'last_answer.xml', "w+");
		        @chmod($path . 'last_answer.xml', 0666);
		        fputs($fp, $result_exec);
		        fclose($fp);
		        $fp = fopen($path . 'last_request.xml', "w+");
		       	@chmod($path . 'last_request.xml', 0666);
		        fputs($fp, $xml);
		        fclose($fp);
				$function = $this->getListFromXML($path . 'last_request.xml' ,"offer", "command");
				$status_array = array();
				$sku_array = array();
				$statusMsg_array = array();
				$idealo_id_array = array();
				$log ='';
				$log .= 'request at ' . $date;
				$log .= "<br><br>";
				$timestamp = false;
				
				$products_errors = '';
				if($missed){		    
					$log .= $error_message;
					$log .= "<br><br>";
				}elseif(strpos($xml, '<updateTimestamp>')){
					$timestamp = true;
					$stemp = $this->getListFromXML($path . 'last_request.xml', "offers", "updateTimestamp");			
					$stemp = str_replace("T", " ", $stemp[0]);
					if($missed){
						$log = 'Timestamp updated from shop: ' . $this->login['shop_id'] . ' at ' . $stemp . ' FAILED';
					}else{
						$log = 'Timestamp was updated from shop: ' . $this->login['shop_id'] . ' at ' . $stemp;
					}	
						
					$log .= "<br>";
				}else{
					$products_errors = '';
					for($i = 0; $i < $xml_elements ; $i++){
						$statusMsg = '';
						if(isset($ws_result->offerResponse[$i]->statusMsg)){
							$statusMsg = $ws_result->offerResponse[$i]->statusMsg;
						}
						
						$sku = $ws_result->offerResponse[$i]->sku;
						$status = $ws_result->offerResponse[$i]->status;
						$idealo_id = $ws_result->offerResponse[$i]->id;
						
						if(($idealo_id == '-1' || $status == 'FAILED') && $status != 'IGNORED'){
							if(strpos($statusMsg, 'Failed to deactivate Offer') === false 
								 && strpos($statusMsg, 'No offer with given sku found') === false 
							  ){
								$products_errors .= '<br>SKU:</b> ' . $sku . ' <b>STATUS:</b> ' . $status . ' <b>STATUS_MSG:</b> ' . $statusMsg . ' <b>idealo_ID:</b> ' . $idealo_id . '<br><br>';
							}
						}
						
						$status_array[$i] = $status;
						$sku_array[$i] = $sku;
						$statusMsg_array[$i] = $statusMsg;
						$idealo_id_array[$i] = $idealo_id;
						$log .= 'product was "' . $function[$i] . '" sku = '. $sku . '; idealo_ID = '. $idealo_id . '; transfer = ' . $status . ' ' . $statusMsg;
						$log .= "<br>";
					}
					
					if($products_errors != ''){
						if(isset($this->login['testmode'])){
							if($this->login ['testmode'] == '0'){
								$this->updateErrorTable($xml, $db_request_failed_id, $this->login['shop_id'], $date, $products_errors);
							}
						}else{
							$this->updateErrorTable($xml, $db_request_failed_id, $this->login['shop_id'], $date, $products_errors);
						}
					}
				}
				
				if($db_request_failed_id != '-1' && $missed !== true){
					if(isset($this->login['testmode'])){
						if($this->login['testmode'] == '0'){
							$this->deleteFromErrorTable($db_request_failed_id);
						}
					}else{
						$this->deleteFromErrorTable($db_request_failed_id);
					}
				}
					
				if($products_errors != ''){
					$dateihandle = fopen($path . 'idealo_realtime_test.html', "r");
					$zeile = fgets($dateihandle, 4096);
										
					if($zeile == 'no errors'){		
						$fp = fopen($path . 'idealo_realtime_test.html', "w");
						fputs($fp,  $error_message);
				    	fclose($fp);
					}else{
						$fp = fopen($this->path . 'export/idealo_realtime_test.html', "a+");
						fputs($fp,  $products_errors);
				    	fclose($fp);
					}
				}
				
				$log = "<br><br>" . $log;
				$fp = fopen($path . 'log_' . date("n_Y") . '.html', "a+");
		        @chmod($path . 'log_' . date("n_Y") . '.html', 0666);
		        fputs($fp, $log);
		        fclose($fp);
		        
		        if(!$missed && $timestamp !== true){
		        	if(isset($this->login['testmode'])){
		        		if($this->login['testmode'] == '1'){
		        			$this->createTestfile($path, $status_array, $statusMsg_array, $xml, $idealo_id_array);	
		        		}
		        	}
		        }
	        }
	
	        curl_close($ch);
	        return true;
		}else{
			return false;
		}
	  }
	  
	  
	  public function testLogin(){
	  	return $this->setTimeStamp();
	  }
	  	  
	
	public function createTestfile($path, $status_array, $statusMsg_array, $xml, $result_idealo_id){
	    try{
	        $xml = new SimpleXMLElement($xml);
		}catch(Exception $e){}
		
		$shipping_header = '';
		$i = 0;
		$delete = true;
		while($delete && count($xml) > $i){
			if($xml->offer[$i]->command == 'InsertOrReplace'){
				$delete = false;
			}
			
			if($delete === false){
				foreach($xml->offer[$i]->shipping as $hipping){
				   $shipping_header .= $hipping['type'] . '_' . $hipping['context'] . '|';
				}
			}else{
				$i++;
			}
		}

		$this->createTestfileExport($status_array, $statusMsg_array, $xml, $shipping_header, $result_idealo_id, $path);
	}
	  
	  
	  public function getListFromXML($xml, $tag01, $tag02){
		$list = array();
		
		try{
		  $objDOM = new DOMDocument();
		  @$objDOM->load($xml);
		  $note = $objDOM->getElementsByTagName($tag01);
		  foreach($note as $value){
		    $tasks = $value->getElementsByTagName($tag02);
		    $task  = $tasks->item(0)->nodeValue;
		    $list [] = $task;
		  } 
		}catch(Exception $e){}

		return $list;					
	}
	
	
	public function deleteProduct($list, $showLog = false){
		while(count($list) >= $this->login['pagesize']){
			$this->deleteFromIdealo(array_splice($list, 0, $this->login['pagesize'], array()));
		}
		
		if(!empty($list)){
			$this->deleteFromIdealo($list);
		}
	}	
	
	
	public function deleteFromIdealo($list, $showLog = false){	
		try{
			if(!empty($list)){
				$request_text =	'<?xml version="1.0" encoding="UTF-8"?>' .
								'<offers>';
				
				if(isset($this->login['testmode'])){
					if($this->login['testmode'] != '0'){
						$request_text .= '<testMode>true</testMode>';
					}
				}
				
				foreach($list as $id){
					$request_text .= 	'<offer>';
					$request_text .=	'<command>DELETE</command>'.				
										'<sku><![CDATA[' . $id . ']]></sku>' .
										'</offer>'; 
				}
				
				$request_text .= '</offers>';				
				$this->sendRequest($request_text, $showLog);			
			}
		} catch ( Exception $e ){}
	}
		
	
	public function createTestfileExport($status_array, $statusMsg_array, $xml, $shipping_header, $result_idealo_id, $path){
		try{
			if($shipping_header != ''){
		    	$dateihandle = fopen($this->path . 'export/idealo_realtime_test.csv', "r" );
				$zeile = fgets($dateihandle, 4096);
				$schema = '';
				
				if($zeile == 'empty'){
					$schema .= 'command|protokoll|Uebertragen am|sku|title|ean|han|url|price|image|brand|description|delivery|category|' . $shipping_header . 'shippingComment|baseprice|';
					$schema .= "\n";
					setlocale(LC_ALL, 'de_DE'); 
		         	$date = date("d.m.y H:i:s");   
					
					$schema .= 'Datei zuletzt erstellt am ' . $date . ' Uhr';
					$schema .= "\n";
					$schema .= MODULE_VERSION_TEXT;
					$schema .= "\n";
					
					$fp = fopen($this->path . 'export/idealo_realtime_test.csv', "w");
			        fputs($fp, $schema);
			        fclose ($fp);	
			        $schema = '';
				}
				
				$i = -1;
				setlocale(LC_ALL, 'de_DE'); 
				date_default_timezone_set('Europe/Berlin');
				$date = date("j.n.Y H:i:s");
				
				foreach($xml as $article){
						if(isset($article->command) && $article->price != '0.00'){
							$schema .=  $article->command . '|' . $status_array[$i] . ' ' . $statusMsg_array[$i] . '|' . $date . '|' . $article->sku . '|' .  $article->title. '|' . $article->ean. '|' . $article->han. '|' . $article->url. '|' . $article->price. '|' . $article->image. '|' . $article->brand . '|' . $article->description . '|' . $article->delivery . '|' . $article->category . '|';
							foreach($article->shipping as $sh){
								$schema .= $sh . '|';
							}
						
						$baseprise = '';
						
						if($article->basePrice != ''){
							$attrs = $article->basePrice->attributes();	
							$baseprise = $article->basePrice . ' EUR / ' . $attrs->measure . ' ' . $attrs->unit;
						}

							$schema .= $article->shippingComment . '|' . $baseprise . '|';
							$schema .= "\n";
					}
					
					$i++;
				}
				
				$fp = fopen($this->path . 'export/idealo_realtime_test.csv', "a+");
		        fputs($fp, $schema);
		        fclose($fp);	
			}
        }catch(Exception $e){}
	}
	
	
	 public function createErrorTable(){
	 	try{
		 	if(!$this->db_connection->checkTableExists(IDEALO_REQUEST_ERROR_TABLE)){
				$sql = "CREATE TABLE `" . IDEALO_REQUEST_ERROR_TABLE . "` (	`id` INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id),
																			`try` INT,
																			`first_send_date` CHAR(20),
																			`xml` LONGBLOB
																		   );";
				$this->db_connection->writeDB($sql);
		 	}
	 	}catch(Exception $e){}
	 }
	
	
	public function dropErrorTable(){
		try{
			if($this->db_connection->checkTableExists(IDEALO_REQUEST_ERROR_TABLE)){
				$sql = "DROP TABLE `" . IDEALO_REQUEST_ERROR_TABLE . "`";
				$this->db_connection->writeDB($sql);
			}
		}catch(Exception $e){}
	}
	
	
	 public function deleteFromErrorTable($db_request_failed_id){
	 	try{
			$sql = "DELETE FROM `" . IDEALO_REQUEST_ERROR_TABLE . "` WHERE `id` = " . $db_request_failed_id . ";";
			$this->db_connection->writeDB($sql);
		}catch(Exception $e){}
	  }
	  
	  
	  public function updateErrorTable($xml, $db_request_failed_id, $shop_id, $date, $log){
	  	try{
			$try = 1;
			if($db_request_failed_id != '-1'){
				$sql = "SELECT `try`, `first_send_date` FROM " . IDEALO_REQUEST_ERROR_TABLE . " WHERE `id` = "  . $db_request_failed_id . ";";
				$try = $this->db_connection->readDB($sql);
				$first_date = $try[0]['first_send_date'];
				$try = $try[0]['try'];
				$try++;
				if($try == 6){
					$this->sendErrorMail($xml, $shop_id, $first_date, '', $try, $text = '' , $log);
				}
				
				if($try == 96){
				    $this->sendErrorMail($xml, $shop_id, $first_date, 'FATAL', $try, $text = 'Request wird nicht mehr geschickt!', $log);
					$this->deleteFromErrorTable($db_request_failed_id);
				}
				
				$sql = "UPDATE " . IDEALO_REQUEST_ERROR_TABLE . " SET `try` = '" . $try . "' WHERE `id` = " . $db_request_failed_id . ";";
			}else{
				$sql = "INSERT INTO `" . IDEALO_REQUEST_ERROR_TABLE . "` (`try`, `first_send_date`, `xml`) VALUES ('1', '" . $date . "', '" . mysqli_real_escape_string(xtc_db_connect(), $xml) . "');";
				
			}

			$this->db_connection->writeDB($sql);
		}catch(Exception $e){}
	  }
	  
	  
	  public function sendErrorMail($xml, $shop_id, $date, $type = '', $try, $text = '', $log){
		try{
			$eMail = $this->tools->getEmail();
			$log = str_replace("\n", "<br>", $log);
		  	$to      = 'modul_notification@idealo.de';
			$subject = $type . ' ERROR Productsupdate FAILED from ' . $shop_id;
			$message = 'Shop ' . $shop_id . ' versucht schon ' . $try . ' x einen Request ohne Erfolg zu schicken!<br><br>
						Erster Versuch: ' . $date . ' ' . $text . '<br><br>
						Modul-Version: ' . MODULE_VERSION_TEXT . '<br>
						Modified for Shop: ' . TEXT_IDEALO_REALTIME_MODIFIED . '<br><br>
						<b>ERROR:</b><br>' . 
						$log . '<br><br>		
						Request siehe Anhang';
			$mime_boundary = "-----=" . md5(uniqid(mt_rand(), 1));
			$data = chunk_split(base64_encode($xml));
			$header =  "From: SHOP " . $shop_id . "<" . $eMail . ">\n";
			$header .= "MIME-Version: 1.0\r\n";
			$header .= "Content-Type: multipart/mixed;\r\n";
			$header .= " boundary=\"" . $mime_boundary . "\"\r\n";
			$content =  "This is a multi-part message in MIME format.\r\n\r\n";
			$content .= "--" . $mime_boundary . "\r\n";
			$content .= "Content-Type: text/html charset=\"utf-8\"\r\n";
			$content .= "Content-Transfer-Encoding: utf-8\r\n\r\n";
			$content .= $message . "\r\n";
		    $content .= "--" . $mime_boundary . "\r\n";
		    $content .= "Content-Disposition: attachment;\r\n";
		    $content .= "\tfilename=\"request.xml\";\r\n";
		    $content .= "Content-Type: \"text/plain\"; name=\"request.xml\"\r\n";
		    $content .= "Content-Transfer-Encoding: base64\r\n\r\n";
		    $content .= $data . "\r\n";
			@mail($to, $subject, $content, $header);
		}catch(Exception $e){}
	  }
	  
	
	 public function setTimeStamp(){
	 	try{
		 	setlocale(LC_ALL, 'de_DE'); 
		 	date_default_timezone_set('Europe/Berlin');
	    	$date = date("Y-m-d");  
	    	$time = date("H:i:s"); 				 
			$xml = '<?xml version="1.0" encoding="UTF-8"?><offers>' .
				   '<updateTimestamp>' . $date . 'T' . $time . '</updateTimestamp>' .		
				   '</offers>';			
			return $this->sendRequest($xml, false);
		} catch(Exception $e){}
	 }
	 
	 
	 public function deleteAllFromIdealo(){
	     do{
	         $list = array();
	         $article = $this->getOfferList(1);
	     
	         if(count($article) > 0){
	             foreach($article as $art){
	                 $list[] = (string) $art->sku[0];
	             }
	         }else{
	             break;
	         }

	         $this->deleteProduct($list);
	     }while(count($article) > 0);
	     echo'all products removed from idealo<br>';
	     sleep(1);
	 }
	 
}

?>