<?php
if (!defined('TABLE_CARRIERS')) define('TABLE_CARRIERS','carriers');
if (!defined('TABLE_ORDERS_TRACKING')) define('TABLE_ORDERS_TRACKING','orders_tracking');

define('MODULE_SHIPPING_DHLGKAPI_EMAILTEXT','Votre colis sera exp�di� par DHL aujourd&apos;hui.');
define('MODULE_SHIPPING_DHLGKAPI_CANCELTEXT','L&apos;envoi par DHL a �t� annul�.');
define('MODULE_SHIPPING_DHLGKAPI_TRACKINGID_ERROR','Aucun num�ro d&apos;exp�dition disponible.');
define('MODULE_SHIPPING_DHLGKAPI_ORDERERROR','Num�ro de commande erron� !');
define('MODULE_SHIPPING_DHLGKAPI_BUTTON_STORNO','Annuler l&apos;exp�dition');
define('MODULE_SHIPPING_DHLGKAPI_BUTTON_GETLABEL','Demande d&apos;�tiquette');
define('MODULE_SHIPPING_DHLGKAPI_EU_COUNTRIES','DE,AT,BE,BG,CZ,CY,DK,EE,FI,FR,GR,HR,HU,IE,IT,LT,LU,LV,MC,MT,NL,PL,PT,RO,SK,SI,ES,SE,GB');

define('MODULE_SHIPPING_DHLGKAPI_SHIPMENTS','Colis');
define('MODULE_SHIPPING_DHLGKAPI_SHIPPER','Exp�diteur');
define('MODULE_SHIPPING_DHLGKAPI_RECEIVER','Destinataire');
define('MODULE_SHIPPING_DHLGKAPI_SHIPPINGDATE','Date d&apos;exp�dition');
define('MODULE_SHIPPING_DHLGKAPI_EKP_TEXT','DHL EKP');
define('MODULE_SHIPPING_DHLGKAPI_PRODUCT','DHL Produit');
define('MODULE_SHIPPING_DHLGKAPI_ATTENDANCE','DHL participation ');
define('MODULE_SHIPPING_DHLGKAPI_WEIGHT','Poids');
define('MODULE_SHIPPING_DHLGKAPI_EMAIL_TEXT','eMail');
define('MODULE_SHIPPING_DHLGKAPI_PHONE','T�l�phone');
define('MODULE_SHIPPING_DHLGKAPI_SERVICES','Services');
define('MODULE_SHIPPING_DHLGKAPI_SERVICE_PREMIUM_TEXT','Forfait de pr�f�rence');
define('MODULE_SHIPPING_DHLGKAPI_SERVICE_CASHONDELIVERY_TEXT','Contre-remboursement');
define('MODULE_SHIPPING_DHLGKAPI_SERVICE_ADDITIONALINSURANCE_TEXT','Assurance compl�mentaire');
define('MODULE_SHIPPING_DHLGKAPI_SERVICE_BULKYGOODS_TEXT','Marchandise encombrante');
define('MODULE_SHIPPING_DHLGKAPI_SERVICE_NOTICEOFNONDELIVERABILITY_TEXT','Message de non-livraison');
define('MODULE_SHIPPING_DHLGKAPI_SERVICE_PERSONALLY_TEXT','En personne');
define('MODULE_SHIPPING_DHLGKAPI_SERVICE_NONEIGHBOURDELIVERY_TEXT','Pas de livraison dans le quartier');
define('MODULE_SHIPPING_DHLGKAPI_SERVICE_NAMEDPERSONONLY_TEXT','Livraison personnelle');
define('MODULE_SHIPPING_DHLGKAPI_SERVICE_RETURN_TEXT','Cr�er une �tiquette de retour');
define('MODULE_SHIPPING_DHLGKAPI_SERVICE_PRINTONLYIFCODEABLE_TEXT','Ne cr�er que si elle peut �tre cod�e avec un plomb');
define('MODULE_SHIPPING_DHLGKAPI_SERVICE_VISUALCHECKOFAGE_TEXT','v�rification de l&apos;�ge');
define('MODULE_SHIPPING_DHLGKAPI_SERVICE_IDENTCHECK_TEXT','V�rification d&apos;identit�');

define('MODULE_SHIPPING_DHLGKAPI_CUSTOMS','D�claration en douane');
define('MODULE_SHIPPING_DHLGKAPI_TERMSOFTRADE','Clause commerciale');
define('MODULE_SHIPPING_DHLGKAPI_TERMSOFTRADE_DESC','incoterms codes:<br />DDP (Delivery Duty Paid)<br />DXV (Delivery duty paid (eXcl. VAT ))<br />DDU (DDU - Delivery Duty Unpaid)<br />DDX (Delivery duty paid (excl. Duties, taxes and VAT)');
define('MODULE_SHIPPING_DHLGKAPI_INVOICENUMBER','Num�ro de facture');
define('MODULE_SHIPPING_DHLGKAPI_ADDITIONALFEE','Droits de douane');
define('MODULE_SHIPPING_DHLGKAPI_CUSTOMSTARIFFNUMBER','Num�ro de tarif douanier');
define('MODULE_SHIPPING_DHLGKAPI_NETWEIGHTINKG','Poids net en kg');
define('MODULE_SHIPPING_DHLGKAPI_CUSTOMSVALUE','Valeur en douane');

define('MODULE_SHIPPING_DHLGKAPI_MINIMUMAGE','&Acirc;ge minimum:');

define('MODULE_SHIPPING_DHLGKAPI_TEST_OKAY','Test termin� avec succ�s !');
define('MODULE_SHIPPING_DHLGKAPI_TEST_NOT_OKAY','Pas r&eacute;ussi!<br />Veuillez v&eacute;rifier les donn&eacute;es saisies !');

define('MODULE_SHIPPING_DHLGKAPI_BACKEND_MODIFIED','La commande a �t� trait�e dans le backend ! L&apos;�tiquette peut maintenant �tre imprim�e...<br />Produit DHL nouvellement d�termin�: ');

$valid_services=array();
$valid_services['V01PAK']=array(
    'DayOfDelivery' => '0',
    'DeliveryTimeframe' => '0', 
    'PreferredTime' => '1',
    'IndividualSenderRequirement' => '1', 
    'PackagingReturn' => '1', 
    'ReturnImmediately' => '0', 
    'NoticeOfNonDeliverability' => '1', 
    'ShipmentHandling' => '0', 
    'Endorsement' => '0', 
    'VisualCheckOfAge' => '1', 
    'PreferredLocation' => '1', 
    'PreferredNeighbour' => '1', 
    'PreferredDay' => '1',
    'GoGreen' => '1', 
    'Perishables' => '0', 
    'Personally' => '1', 
    'NoNeighbourDelivery' => '1',
    'NamedPersonOnly' => '1', 
    'ReturnReceipt' => '0', 
    'Premium' => '0', 
    'CashOnDelivery' => '1', 
    'AdditionalInsurance' => '1', 
    'BulkyGoods' => '1', 
    'IdentCheck' => '1',
    'Return' => '1',
    'PrintOnlyIfCodeable' => '1'
);

$valid_services['V53WPAK']=array(
    'DayOfDelivery' => '0',
    'DeliveryTimeframe' => '0', 
    'PreferredTime' => '0',
    'IndividualSenderRequirement' => '0', 
    'PackagingReturn' => '0', 
    'ReturnImmediately' => '0', 
    'NoticeOfNonDeliverability' => '0', 
    'ShipmentHandling' => '0', 
    'Endorsement' => '1', 
    'VisualCheckOfAge' => '0', 
    'PreferredLocation' => '0', 
    'PreferredNeighbour' => '0', 
    'PreferredDay' => '0',
    'GoGreen' => '1', 
    'Perishables' => '0', 
    'Personally' => '0', 
    'NoNeighbourDelivery' => '0',
    'NamedPersonOnly' => '0', 
    'ReturnReceipt' => '1', 
    'Premium' => '1', 
    'CashOnDelivery' => '1', 
    'AdditionalInsurance' => '1', 
    'BulkyGoods' => '1', 
    'IdentCheck' => '0',
    'Return' => '0',
    'PrintOnlyIfCodeable' => '1'
);

$valid_services['V86PARCEL']=array(
    'DayOfDelivery' => '0',
    'DeliveryTimeframe' => '0', 
    'PreferredTime' => '0',
    'IndividualSenderRequirement' => '0', 
    'PackagingReturn' => '0', 
    'ReturnImmediately' => '0', 
    'NoticeOfNonDeliverability' => '0', 
    'ShipmentHandling' => '0', 
    'Endorsement' => '0', 
    'VisualCheckOfAge' => '0', 
    'PreferredLocation' => '0', 
    'PreferredNeighbour' => '0', 
    'PreferredDay' => '0',
    'GoGreen' => '0', 
    'Perishables' => '0', 
    'Personally' => '0', 
    'NoNeighbourDelivery' => '0',
    'NamedPersonOnly' => '0', 
    'ReturnReceipt' => '0', 
    'Premium' => '0', 
    'CashOnDelivery' => '1', 
    'AdditionalInsurance' => '1', 
    'BulkyGoods' => '1', 
    'IdentCheck' => '0',
    'Retoure' => '0',
    'PrintOnlyIfCodeable' => '1'
);

$valid_services['V87PARCEL']=array(
    'DayOfDelivery' => '0',
    'DeliveryTimeframe' => '0', 
    'PreferredTime' => '0',
    'IndividualSenderRequirement' => '0', 
    'PackagingReturn' => '0', 
    'ReturnImmediately' => '0', 
    'NoticeOfNonDeliverability' => '0', 
    'ShipmentHandling' => '0', 
    'Endorsement' => '0', 
    'VisualCheckOfAge' => '0', 
    'PreferredLocation' => '0', 
    'PreferredNeighbour' => '0', 
    'PreferredDay' => '0',
    'GoGreen' => '0', 
    'Perishables' => '0', 
    'Personally' => '0', 
    'NoNeighbourDelivery' => '0',
    'NamedPersonOnly' => '0', 
    'ReturnReceipt' => '0', 
    'Premium' => '0', 
    'CashOnDelivery' => '1', 
    'AdditionalInsurance' => '1', 
    'BulkyGoods' => '1', 
    'IdentCheck' => '0',
    'Return' => '0',
    'PrintOnlyIfCodeable' => '1'
);

$valid_services['V82PARCEL']=array(
    'DayOfDelivery' => '0',
    'DeliveryTimeframe' => '0', 
    'PreferredTime' => '0',
    'IndividualSenderRequirement' => '0', 
    'PackagingReturn' => '0', 
    'ReturnImmediately' => '0', 
    'NoticeOfNonDeliverability' => '0', 
    'ShipmentHandling' => '0', 
    'Endorsement' => '0', 
    'VisualCheckOfAge' => '0', 
    'PreferredLocation' => '0', 
    'PreferredNeighbour' => '0', 
    'PreferredDay' => '0',
    'GoGreen' => '0', 
    'Perishables' => '0', 
    'Personally' => '0', 
    'NoNeighbourDelivery' => '0',
    'NamedPersonOnly' => '0', 
    'ReturnReceipt' => '0', 
    'Premium' => '0', 
    'CashOnDelivery' => '0', 
    'AdditionalInsurance' => '1', 
    'BulkyGoods' => '1', 
    'IdentCheck' => '0',
    'Return' => '0',
    'PrintOnlyIfCodeable' => '1'
);

define('MODULE_SHIPPING_DHLGKAPI_VALID_SERVICES',serialize($valid_services));

define('MODULE_SHIPPING_DHLGKAPI_DISPLAY_SERVICES',serialize(array(
    'NoticeOfNonDeliverability', 
    'Personally',
    'NamedPersonOnly', 
    'NoNeighbourDelivery', 
    'Premium', 
    'CashOnDelivery', 
    'AdditionalInsurance', 
    'BulkyGoods',
    'VisualCheckOfAge',
    'IdentCheck',
    'Return',
    'PrintOnlyIfCodeable'
)));

define('MODULE_SHIPPING_DHLGKAPI_RETOURE_PRODUCTS',serialize(array(
    'V01PAK' => '07',
    'V06PAK' => '07',
    'V86PARCEL' => '83',
    'V87PARCEL' => '85'
)));
?>
