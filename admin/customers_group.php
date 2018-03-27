<?php
/* --------------------------------------------------------------
$Id: customers_group.php André Estel $

Estelco - Ebusiness & more
http://www.estelco.de

Copyright (c) 2008 Estelco
--------------------------------------------------------------
Released under the GNU General Public License
--------------------------------------------------------------*/

require('includes/application_top.php');

switch ($_GET['action']) {
    case 'send':
        //var_dump($_POST);
        if (isset($_POST['cg']) && is_array($_POST['cg'])) {
            if (isset($_POST['categories']) || isset($_POST['products']) || isset($_POST['content'])) {
                if (isset($_POST['categories'])) {
                    foreach ($_POST['cg'] as $cgID=>$value) {
                        xtc_db_query('UPDATE ' . TABLE_CATEGORIES . ' SET group_permission_' . (int)$cgID . '=' . ($_POST['permission'] == 'true'?'1':'0'));
                    }
                    $messageStack->add(constant('TEXT_CATEGORIES_SUCCESSFULLY_' . ($_POST['permission'] == 'true'?'SET':'UNSET')), 'success');
                }
                if (isset($_POST['products'])) {
                    foreach ($_POST['cg'] as $cgID=>$value) {
                        xtc_db_query('UPDATE ' . TABLE_PRODUCTS . ' SET group_permission_' . (int)$cgID . '=' . ($_POST['permission'] == 'true'?'1':'0'));
                    }
                    $messageStack->add(constant('TEXT_PRODUCTS_SUCCESSFULLY_' . ($_POST['permission'] == 'true'?'SET':'UNSET')), 'success');
                }
                if (isset($_POST['content'])) {
                    $content_query = xtc_db_query('SELECT content_id, group_ids FROM ' . TABLE_CONTENT_MANAGER . ' ORDER BY content_id');
                    while ($result = xtc_db_fetch_array($content_query)) {
                        $values = explode(',', $result['group_ids']);
                        if (in_array('', $values)) {
                            unset($values[array_search('', $values)]);
                        }
                        if ($_POST['permission'] == 'true') {
                            foreach ($_POST['cg'] as $cgID=>$value) {
                                if (!in_array('c_' . $cgID . '_group', $values)) {
                                    $values[] = 'c_' . $cgID . '_group';
                                }
                            }
                            $group_ids = implode(',', $values);
                            xtc_db_query('UPDATE ' . TABLE_CONTENT_MANAGER . ' SET group_ids=\'' . $group_ids . '\' WHERE content_id=' . $result['content_id']);
                        } else {
                            foreach ($_POST['cg'] as $cgID=>$value) {
                                if (in_array('c_' . $cgID . '_group', $values)) {
                                    unset($values[array_search('c_' . $cgID . '_group', $values)]);
                                }
                            }
                            $group_ids = implode(',', $values);
                            xtc_db_query('UPDATE ' . TABLE_CONTENT_MANAGER . ' SET group_ids=\'' . $group_ids . '\' WHERE content_id=' . $result['content_id']);
                        }
                    }
                    $messageStack->add(constant('TEXT_CONTENT_SUCCESSFULLY_' . ($_POST['permission'] == 'true'?'SET':'UNSET')), 'success');
                }
            } else {
                $messageStack->add(ERROR_PLEASE_SELECT_SHOP_AREA);
            }
        } else {
            $messageStack->add(ERROR_PLEASE_SELECT_CUSTOMER_GROUP);
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
        
<div class='col-xs-12'>
        <p class="h2">
            <?php echo HEADING_TITLE; ?>
        </p>
    </div>
<div class='col-xs-12'><br></div>

            <div class='col-xs-12'>
                <div class='col-xs-12'>
                    <div class="main col-xs-12">
                    <?php echo xtc_draw_form('', 'customers_group.php', 'action=send', 'post', ''); ?>
                    <?php
                    $group_query = xtc_db_query('SELECT customers_status_id,
                                                        customers_status_name
                                                 FROM ' . TABLE_CUSTOMERS_STATUS . '
                                                 WHERE language_id=' . (int)$_SESSION['languages_id'] . '
                                                 ORDER BY customers_status_id ASC');
                    while ($result = xtc_db_fetch_array($group_query)) {
                        echo xtc_draw_checkbox_field('cg[' . $result['customers_status_id'].']', '1') . ' ' . $result['customers_status_name'] . '<br />';
                    }
                    echo '<br /><br />';
                    echo xtc_draw_checkbox_field('categories', '1') . ' ' . TEXT_CATEGORIES . '<br />';
                    echo xtc_draw_checkbox_field('products', '1') . ' ' . TEXT_PRODUCTS . '<br />';
                    echo xtc_draw_checkbox_field('content', '1') . ' ' . TEXT_CONTENT . '<br />';
                    echo '<br /><br />';
                    echo '<strong>' . TEXT_PERMISSION . ':</strong> ' . TEXT_SET . ' ' . xtc_draw_radio_field('permission', 'true', true) . ' ' . TEXT_UNSET . ' ' . xtc_draw_radio_field('permission', 'false', false) . '<br />';
                    echo '<br /><br />' . xtc_draw_input_field('senden', TEXT_SEND, '', false, 'submit');
                    ?>
                    </form>
                    </div>
                </div>
            </div>
</div>

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br />
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
