<?php
/* --------------------------------------------------------------
   $Id: stats_products_purchased.php 899 2005-04-29 02:40:57Z hhgag $   

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2003 XT-Commerce
   --------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(stats_products_purchased.php,v 1.27 2002/11/18); www.oscommerce.com 
   (c) 2003	 nextcommerce (stats_products_purchased.php,v 1.9 2003/08/18); www.nextcommerce.org

   Released under the GNU General Public License 
   --------------------------------------------------------------*/

  require('includes/application_top.php');
  
  require (DIR_WS_INCLUDES.'head.php');
?>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->
<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
    
<!-- body_text //-->
    <td class="boxCenter" width="100%" valign="top">
      <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr>
          <td>
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td width="80" rowspan="2"><?php echo xtc_image(DIR_WS_ICONS.'heading_statistic.gif'); ?></td>
                <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
              </tr>
              <tr>
                <td class="main" valign="top">Statistics</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td>
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td valign="top">
                  <table border="0" width="100%" cellspacing="0" cellpadding="2">
                    <tr class="dataTableHeadingRow">
                      <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_NUMBER; ?></td>
                      <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_MODEL; ?></td>
                      <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_PRODUCTS; ?></td>
                      <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_PURCHASED; ?>&nbsp;</td>
                      <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_QUANTITY; ?>&nbsp;</td>
                    </tr>
                    <?php
                    $rows = (isset($_GET['page']) && $_GET['page'] > 1) ? $_GET['page'] * $maxrows - $maxrows : 0;                    
                    $products_query_raw = "select p.products_id,
                                                  p.products_model,  
                                                  p.products_ordered,
                                                  p.products_quantity,
                                                  pd.products_name 
                                             from " . TABLE_PRODUCTS . " p, 
                                                  " . TABLE_PRODUCTS_DESCRIPTION . " pd 
                                            where pd.products_id = p.products_id 
                                              and pd.language_id = '" . $_SESSION['languages_id'] . "' 
                                              and p.products_ordered > 0 
                                         group by pd.products_id 
                                         order by p.products_ordered DESC, pd.products_name";
                    $products_split = new splitPageResults($_GET['page'], '20', $products_query_raw, $products_query_numrows, 'p.products_id');

                    $products_query = xtc_db_query($products_query_raw);
                    while ($products = xtc_db_fetch_array($products_query)) {
                      $rows++;
                      if (strlen($rows) < 2) {
                        $rows = '0' . $rows;
                      }
                    ?>
                    <tr class="dataTableRow" onmouseover="this.className='dataTableRowOver';this.style.cursor='pointer'" onmouseout="this.className='dataTableRow'" onclick="document.location.href='<?php echo xtc_href_link(FILENAME_CATEGORIES, 'action=new_product_preview&read=only&pID=' . $products['products_id'] . '&origin=' . FILENAME_STATS_PRODUCTS_PURCHASED . '?page=' . $_GET['page'], 'NONSSL'); ?>'">
                      <td class="dataTableContent"><?php echo $rows; ?>.</td>
                      <td class="dataTableContent"><?php echo $products['products_model']; ?>&nbsp;</td>
                      <td class="dataTableContent"><?php echo $products['products_name']; ?></td>                      
                      <td class="dataTableContent" align="center"><?php echo $products['products_ordered']; ?>&nbsp;</td>
                      <td class="dataTableContent" align="center"><?php echo $products['products_quantity']; ?>&nbsp;</td>
                    </tr>
                  <?php
                    }
                  ?>
                  </table>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <table border="0" width="100%" cellspacing="0" cellpadding="2">
                    <tr>
                      <td class="smallText" valign="top"><?php echo $products_split->display_count($products_query_numrows, '20', $_GET['page'], TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></td>
                      <td class="smallText" align="right"><?php echo $products_split->display_links($products_query_numrows, '20', MAX_DISPLAY_PAGE_LINKS, $_GET['page']); ?>&nbsp;</td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->
<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>