<?php
  /* --------------------------------------------------------------
   $Id: shop_offline.php 3512 2012-08-23 17:46:58Z web28 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]

   --------------------------------------------------------------

   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(configuration.php,v 1.40 2002/12/29); www.oscommerce.com 
   (c) 2003 nextcommerce (configuration.php,v 1.16 2003/08/19); www.nextcommerce.org
   (c) 2003 XT-Commerce - www.xt-commerce.de
   (c) 2008 Gambio OHG - www.gambio.de

   Released under the GNU General Public License 
   --------------------------------------------------------------*/

  require('includes/application_top.php');
  require_once(DIR_FS_INC . 'xtc_get_shop_conf.inc.php');  
  require_once(DIR_FS_INC . 'xtc_wysiwyg.inc.php');

  if(isset($_POST['go'])) {
    xtc_db_query("UPDATE ". "shop_configuration" ." SET configuration_value= '" . $_POST['shop_offline']. "' WHERE configuration_key = 'SHOP_OFFLINE'");
    xtc_db_query("UPDATE ". "shop_configuration" ." SET configuration_value= '" . $_POST['offline_msg'] . "' WHERE configuration_key = 'SHOP_OFFLINE_MSG'");
    xtc_redirect(xtc_href_link('shop_offline.php'));  
  }
  
  require (DIR_WS_INCLUDES.'head.php');
?>
</head>
<body>
    <!-- header //-->
    <?php require(DIR_WS_INCLUDES . 'header.php'); ?>
    <!-- header_eof //-->
    <!-- body //-->
<div class="row">
<!-- body_text //-->
    <div class='col-xs-12'>
        <p class="h2">
            <?php echo HEADING_TITLE; ?>
        </p>
    </div>
<div class='col-xs-12'><br></div>
<div class='col-xs-12'>
    <div class="col-xs-12 dataTableHeadingContent">
      <?php echo BOX_SHOP_OFFLINE; ?>                          
    </div>
</div>
        
<div class='col-xs-12'>
    <div class="main col-xs-12"  style="border: 1px solid; border-color: #aaaaaa; padding: 5px;">    
      <?php echo xtc_draw_form('img_upload', 'shop_offline.php', '', 'post', 'role="form" enctype="multipart/form-data"'); ?>
                        <input type="checkbox" name="shop_offline" value="checked" <?php echo xtc_get_shop_conf('SHOP_OFFLINE'); ?>>
                        <?php echo SETTINGS_OFFLINE ?><br /><br />
                        <?php echo SETTINGS_OFFLINE_MSG ?>:<br />
                        <?php
          echo xtc_draw_textarea_field('offline_msg', 'soft', '150', '20', stripslashes(xtc_get_shop_conf('SHOP_OFFLINE_MSG')),'','class="form-control"');
                        ?>
                        <br />
                        <br />
                        <?php echo '<input type="submit" name="go" class="btn btn-default" onclick="this.blur();" value="' . BUTTON_SAVE . '"/>'; ?>
                      </form>
    </div>
</div>
</div>
    <!-- body_eof //-->
    <!-- footer //-->
    <?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
    <!-- footer_eof //-->
    <?php 
    if (USE_WYSIWYG == 'true') {
      $query = xtc_db_query("SELECT code FROM ".TABLE_LANGUAGES." WHERE languages_id='".$_SESSION['languages_id']."'");
      $data = xtc_db_fetch_array($query);
      $languages = xtc_get_languages();
      echo xtc_wysiwyg('shop_offline',$data['code']);
    }
    ?>
  </body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>