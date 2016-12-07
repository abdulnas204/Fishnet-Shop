<?php
/* --------------------------------------------------------------
   $Id: shipping_status.php 1125 2005-07-28 09:59:44Z novalis $

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2003 XT-Commerce
   --------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(orders_status.php,v 1.19 2003/02/06); www.oscommerce.com
   (c) 2003	 nextcommerce (orders_status.php,v 1.9 2003/08/18); www.nextcommerce.org

   Released under the GNU General Public License 
   --------------------------------------------------------------*/

  require('includes/application_top.php');

  switch ($_GET['action']) {
    case 'insert':
    case 'save':
      $error = array();
      $shipping_status_id = xtc_db_prepare_input($_GET['oID']);

      $languages = xtc_get_languages();
      for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
        $shipping_status_name_array = $_POST['shipping_status_name'];
        $language_id = $languages[$i]['id'];

            $check_if_name_exist = xtc_db_find_database_field_by_language(TABLE_SHIPPING_STATUS, 'shipping_status_name', $shipping_status_name_array[$language_id], $language_id,'language_id');
            if(!$shipping_status_name_array[$language_id] || $check_if_name_exist){
                $url_action = 'edit';
                if($_GET['action'] == 'save'){
                    if($check_if_name_exist['shipping_status_id'] != $shipping_status_id){
                        $error[] = ERROR_TEXT_NAME;
                    }
                } else {
                    $url_action = 'new';
                    $error[] = ERROR_TEXT_NAME;
                }
            }
        }
      
      if(empty($error)){  
      for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
        $shipping_status_name_array = $_POST['shipping_status_name'];
        $language_id = $languages[$i]['id'];

        $sql_data_array = array('shipping_status_name' => xtc_db_prepare_input($shipping_status_name_array[$language_id]));

        if ($_GET['action'] == 'insert') {
          if (!xtc_not_null($shipping_status_id)) {
            $next_id_query = xtc_db_query("select max(shipping_status_id) as shipping_status_id from " . TABLE_SHIPPING_STATUS . "");
            $next_id = xtc_db_fetch_array($next_id_query);
            $shipping_status_id = $next_id['shipping_status_id'] + 1;
          }

          $insert_sql_data = array('shipping_status_id' => $shipping_status_id,
                                   'language_id' => $language_id);
          $sql_data_array = xtc_array_merge($sql_data_array, $insert_sql_data);
          xtc_db_perform(TABLE_SHIPPING_STATUS, $sql_data_array);
        } elseif ($_GET['action'] == 'save') {
			//BOF - web28 - 2010-07-11 - BUGFIX no entry stored for previous deactivated languages
			$shipping_status_query = xtc_db_query("select * from ".TABLE_SHIPPING_STATUS." where language_id = '".$language_id."' and shipping_status_id = '".xtc_db_input($shipping_status_id)."'");
			if (xtc_db_num_rows($shipping_status_query) == 0) xtc_db_perform(TABLE_SHIPPING_STATUS, array ('shipping_status_id' => xtc_db_input($shipping_status_id), 'language_id' => $language_id));
			//EOF - web28 - 2010-07-11 - BUGFIX no entry stored for previous deactivated languages
			xtc_db_perform(TABLE_SHIPPING_STATUS, $sql_data_array, 'update', "shipping_status_id = '" . xtc_db_input($shipping_status_id) . "' and language_id = '" . $language_id . "'");
        }
      }

      if ($shipping_status_image = xtc_try_upload('shipping_status_image',DIR_WS_ICONS)) {
        xtc_db_query("update " . TABLE_SHIPPING_STATUS . " set shipping_status_image = '" . $shipping_status_image->filename . "' where shipping_status_id = '" . xtc_db_input($shipping_status_id) . "'");
      }

      if ($_POST['default'] == 'on') {
        xtc_db_query("update " . TABLE_CONFIGURATION . " set configuration_value = '" . xtc_db_input($shipping_status_id) . "' where configuration_key = 'DEFAULT_SHIPPING_STATUS_ID'");
      }

      xtc_redirect(xtc_href_link(FILENAME_SHIPPING_STATUS, 'page=' . $_GET['page'] . '&oID=' . $shipping_status_id));
      
        } else {
            $_SESSION['repopulate_form'] = $_REQUEST;
            $_SESSION['errors'] = $error;
            xtc_redirect(xtc_href_link(FILENAME_SHIPPING_STATUS, 'page='.$_GET['page'].'&action='.$url_action.'&errors=1&oID=' . $shipping_status_id));
        }
      break;
  }
  require (DIR_WS_INCLUDES.'head.php');
?>

</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onload="SetFocus();">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<div class="row">
<!-- body_text //-->
    <div class='col-xs-12'>
        <p class="h2">
            <?php echo BOX_SHIPPING_STATUS; ?>
        </p>
        Configuration
    </div>
<?php include DIR_WS_INCLUDES.FILENAME_ERROR_DISPLAY; ?>
<div class='col-xs-12'><br></div>
<div class='col-xs-12'>
    <div id='responsive_table' class='table-responsive pull-left col-sm-12'>
    <table class="table table-bordered table-striped">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent hidden-xs" width="1"><?php echo TABLE_HEADING_SHIPPING_STATUS; ?></td>
                <td class="dataTableHeadingContent" >&nbsp;</td>
                <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
              </tr>
<?php
  $shipping_status_query_raw = "select shipping_status_id, shipping_status_name,shipping_status_image from " . TABLE_SHIPPING_STATUS . " where language_id = '" . $_SESSION['languages_id'] . "' order by shipping_status_id";
  $shipping_status_split = new splitPageResults($_GET['page'], '20', $shipping_status_query_raw, $shipping_status_query_numrows);
  $shipping_status_query = xtc_db_query($shipping_status_query_raw);
  while ($shipping_status = xtc_db_fetch_array($shipping_status_query)) {
    if (((!$_GET['oID']) || ($_GET['oID'] == $shipping_status['shipping_status_id'])) && (!$oInfo) && (substr($_GET['action'], 0, 3) != 'new')) {
      $oInfo = new objectInfo($shipping_status);
    }

    if ( (is_object($oInfo)) && ($shipping_status['shipping_status_id'] == $oInfo->shipping_status_id) ) {
      echo '                  <tr class="dataTableRowSelected" onmouseover="this.style.cursor=\'pointer\'" onclick="document.location.href=\'' . xtc_href_link(FILENAME_SHIPPING_STATUS, 'page=' . $_GET['page'] . '&oID=' . $oInfo->shipping_status_id . '&action=edit') . '#edit-box\'">' . "\n";
    } else {
      echo '                  <tr class="dataTableRow" onmouseover="this.className=\'dataTableRowOver\';this.style.cursor=\'pointer\'" onmouseout="this.className=\'dataTableRow\'" onclick="document.location.href=\'' . xtc_href_link(FILENAME_SHIPPING_STATUS, 'page=' . $_GET['page'] . '&oID=' . $shipping_status['shipping_status_id']) . '#edit-box\'">' . "\n";
    }

    if (DEFAULT_SHIPPING_STATUS_ID == $shipping_status['shipping_status_id']) {
        echo '<td class="dataTableContent hidden-xs" align="left">';
     if ($shipping_status['shipping_status_image'] != '') {
       echo xtc_image(DIR_WS_ICONS . $shipping_status['shipping_status_image'] , IMAGE_ICON_INFO);
     }
     echo '</td>';
      echo '                <td class="dataTableContent"><b>' . $shipping_status['shipping_status_name'] . ' (' . TEXT_DEFAULT . ')</b></td>' . "\n";
    } else {

      			echo '<td class="dataTableContent hidden-xs" align="left">';
                       if ($shipping_status['shipping_status_image'] != '') {
                           echo xtc_image(DIR_WS_ICONS . $shipping_status['shipping_status_image'] , IMAGE_ICON_INFO);
                           }
                           echo '</td>';
      echo '                <td class="dataTableContent">' . $shipping_status['shipping_status_name'] . '</td>' . "\n";
    }
?>
<!-- BOF - Tomcraft - 2009-06-10 - added some missing alternative text on admin icons -->
<!--
                <td class="dataTableContent" align="right"><?php if ( (is_object($oInfo)) && ($shipping_status['shipping_status_id'] == $oInfo->shipping_status_id) ) { echo xtc_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . xtc_href_link(FILENAME_SHIPPING_STATUS, 'page=' . $_GET['page'] . '&oID=' . $shipping_status['shipping_status_id']) . '#edit-box">' . xtc_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
-->
                <td class="dataTableContent" align="right"><?php if ( (is_object($oInfo)) && ($shipping_status['shipping_status_id'] == $oInfo->shipping_status_id) ) { echo xtc_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ICON_ARROW_RIGHT); } else { echo '<a href="' . xtc_href_link(FILENAME_SHIPPING_STATUS, 'page=' . $_GET['page'] . '&oID=' . $shipping_status['shipping_status_id']) . '#edit-box">' . xtc_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
<!-- EOF - Tomcraft - 2009-06-10 - added some missing alternative text on admin icons -->
              </tr>
<?php
  }
?>
              </table>
                  <div class='col-xs-12'>
                    <div class="smallText col-xs-6"><?php echo $shipping_status_split->display_count($shipping_status_query_numrows, '20', $_GET['page'], TEXT_DISPLAY_NUMBER_OF_SHIPPING_STATUS); ?></div>
                    <div class="smallText col-xs-6 text-right"><?php echo $shipping_status_split->display_links($shipping_status_query_numrows, '20', MAX_DISPLAY_PAGE_LINKS, $_GET['page']); ?></div>
                  </div>
<?php
  if (substr($_GET['action'], 0, 3) != 'new') {
?>
                  <div class="col-xs-12 text-right">
                    <?php echo '<a class="btn btn-default" onclick="this.blur();" href="' . xtc_href_link(FILENAME_SHIPPING_STATUS, 'page=' . $_GET['page'] . '&action=new') . '">' . BUTTON_INSERT . '</a>'; ?>
                  </div>
<?php
  }
?>
    </div>
<?php
  $heading = array();
  $contents = array();
  switch ($_GET['action']) {
    case 'new':
      $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_NEW_SHIPPING_STATUS . '</b>');

        if(isset($_SESSION['repopulate_form'])){
            $ss_name = ($_SESSION['repopulate_form']['shipping_status_name']) ? $_SESSION['repopulate_form']['shipping_status_name'] : '';
            unset($_SESSION['repopulate_form']);
        }

      $contents = array('form' => xtc_draw_form('status', FILENAME_SHIPPING_STATUS, 'page=' . $_GET['page'] . '&action=insert', 'post', 'enctype="multipart/form-data"'));
      $contents[] = array('text' => TEXT_INFO_INSERT_INTRO);

      $shipping_status_inputs_string = '';
      $languages = xtc_get_languages();
      for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
        $shipping_status_inputs_string .= '<br />' . xtc_image(DIR_WS_LANGUAGES.$languages[$i]['directory'].'/admin/images/'.$languages[$i]['image']) . '&nbsp;' . xtc_draw_input_field('shipping_status_name[' . $languages[$i]['id'] . ']', $ss_name[$languages[$i]['id']]);
      }
      $contents[] = array('text' => '<br />' . TEXT_INFO_SHIPPING_STATUS_IMAGE . '<br />' . xtc_draw_file_field('shipping_status_image'));
      $contents[] = array('text' => '<br />' . TEXT_INFO_SHIPPING_STATUS_NAME . $shipping_status_inputs_string);
      $contents[] = array('text' => '<br />' . xtc_draw_checkbox_field('default') . ' ' . TEXT_SET_DEFAULT);
      $contents[] = array('align' => 'center', 'text' => '<br /><input type="submit" class="btn btn-default" onclick="this.blur();" value="' . BUTTON_INSERT . '"/> <a class="btn btn-default" onclick="this.blur();" href="' . xtc_href_link(FILENAME_SHIPPING_STATUS, 'page=' . $_GET['page']) . '">' . BUTTON_CANCEL . '</a>');
      break;

    case 'edit':
      $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_EDIT_SHIPPING_STATUS . '</b>');

      $contents = array('form' => xtc_draw_form('status', FILENAME_SHIPPING_STATUS, 'page=' . $_GET['page'] . '&oID=' . $oInfo->shipping_status_id  . '&action=save', 'post', 'enctype="multipart/form-data"'));
      $contents[] = array('text' => TEXT_INFO_EDIT_INTRO);

      $shipping_status_inputs_string = '';
      $languages = xtc_get_languages();
      for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
        $shipping_status_inputs_string .= '<br />' . xtc_image(DIR_WS_LANGUAGES.$languages[$i]['directory'].'/admin/images/'.$languages[$i]['image']) . '&nbsp;' . xtc_draw_input_field('shipping_status_name[' . $languages[$i]['id'] . ']', xtc_get_shipping_status_name($oInfo->shipping_status_id, $languages[$i]['id']));
      }
      $contents[] = array('text' => '<br />' . TEXT_INFO_SHIPPING_STATUS_IMAGE . '<br />' . xtc_draw_file_field('shipping_status_image',$oInfo->shipping_status_image));
      $contents[] = array('text' => '<br />' . TEXT_INFO_SHIPPING_STATUS_NAME . $shipping_status_inputs_string);
      if (DEFAULT_SHIPPING_STATUS_ID != $oInfo->shipping_status_id) $contents[] = array('text' => '<br />' . xtc_draw_checkbox_field('default') . ' ' . TEXT_SET_DEFAULT);
      $contents[] = array('align' => 'center', 'text' => '<br /><input type="submit" class="btn btn-default" onclick="this.blur();" value="' . BUTTON_UPDATE . '"/> <a class="btn btn-default" onclick="this.blur();" href="' . xtc_href_link(FILENAME_SHIPPING_STATUS, 'page=' . $_GET['page'] . '&oID=' . $oInfo->shipping_status_id) . '">' . BUTTON_CANCEL . '</a>');
      break;

    default:
      if (is_object($oInfo)) {
        $heading[] = array('text' => '<b>' . $oInfo->shipping_status_name . '</b>');

        $contents[] = array('align' => 'center', 'text' => '<a class="btn btn-default" onclick="this.blur();" href="' . xtc_href_link(FILENAME_SHIPPING_STATUS, 'page=' . $_GET['page'] . '&oID=' . $oInfo->shipping_status_id . '&action=edit') . '#edit-box">' . BUTTON_EDIT . '</a>');

        $shipping_status_inputs_string = '';
        $languages = xtc_get_languages();
        for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
          $shipping_status_inputs_string .= '<br />' . xtc_image(DIR_WS_LANGUAGES.$languages[$i]['directory'].'/admin/images/'.$languages[$i]['image']) . '&nbsp;' . xtc_get_shipping_status_name($oInfo->shipping_status_id, $languages[$i]['id']);
        }

        $contents[] = array('text' => $shipping_status_inputs_string);
      }
      break;
  }

  if ( (xtc_not_null($heading)) && (xtc_not_null($contents)) ) {
    echo '<div class="col-md-3 col-sm-12 col-xs-12 pull-right edit-box-class">' . "\n";

    $box = new box;
    echo $box->infoBox($heading, $contents);

    echo '</div>' . "\n";
        ?>
    <script>
        //responsive_table
        $('#responsive_table').addClass('col-md-9');
    </script>               
    <?php
  }
?>
</div></div>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br />
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>