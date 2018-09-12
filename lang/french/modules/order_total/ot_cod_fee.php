<?php
/* -----------------------------------------------------------------------------------------
   $Id: ot_cod_fee.php 914 2005-04-30 02:54:02Z matthias $

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2003 XT-Commerce
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(ot_cod_fee.php,v 1.02 2003/02/24); www.oscommerce.com
   (C) 2001 - 2003 TheMedia, Dipl.-Ing Thomas Pl�nkers ; http://www.themedia.at & http://www.oscommerce.at

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/


  define('MODULE_ORDER_TOTAL_COD_FEE_TITLE', 'Frais de DCO');
  define('MODULE_ORDER_TOTAL_COD_FEE_DESCRIPTION', 'Calcul de la redevance DCO');

  define('MODULE_ORDER_TOTAL_COD_FEE_STATUS_TITLE','Frais de DCO');
  define('MODULE_ORDER_TOTAL_COD_FEE_STATUS_DESC','Calcul de la redevance DCO');

  define('MODULE_ORDER_TOTAL_COD_FEE_SORT_ORDER_TITLE','ordre de tri');
  define('MODULE_ORDER_TOTAL_COD_FEE_SORT_ORDER_DESC','s�quence de pr�sentation');

  define('MODULE_ORDER_TOTAL_COD_FEE_FLAT_TITLE','Frais d&apos;exp�dition fixes');
  define('MODULE_ORDER_TOTAL_COD_FEE_FLAT_DESC','&lt;ISO2-Code&gt;:&lt;Prix&gt;, ....<br />
00 comme ISO2-Code permet l&apos;exp�dition COD dans tous les pays. Si');

  define('MODULE_ORDER_TOTAL_COD_FEE_ITEM_TITLE','Frais d&apos;exp�dition par pi�ce');
  define('MODULE_ORDER_TOTAL_COD_FEE_ITEM_DESC','&lt;ISO2-Code&gt;:&lt;Prix&gt;, ....<br />
00 comme ISO2-Code permet l&apos;exp�dition COD dans tous les pays. Si');

  define('MODULE_ORDER_TOTAL_COD_FEE_TABLE_TITLE','Frais d&apos;exp�dition sous forme de tableau');
  define('MODULE_ORDER_TOTAL_COD_FEE_TABLE_DESC','&lt;ISO2-Code&gt;:&lt;Prix&gt;, ....<br />
00 comme ISO2-Code permet l&apos;exp�dition COD dans tous les pays. Si');

  define('MODULE_ORDER_TOTAL_COD_FEE_ZONES_TITLE','Frais d&apos;exp�dition par zone');
  define('MODULE_ORDER_TOTAL_COD_FEE_ZONES_DESC','&lt;ISO2-Code&gt;:&lt;Prix&gt;, ....<br />
00 comme ISO2-Code permet l&apos;exp�dition COD dans tous les pays. Si');

  define('MODULE_ORDER_TOTAL_COD_FEE_AP_TITLE','Austrian Post AG');
  define('MODULE_ORDER_TOTAL_COD_FEE_AP_DESC','&lt;ISO2-Code&gt;:&lt;Prix&gt;, ....<br />
00 comme ISO2-Code permet l&apos;exp�dition COD dans tous les pays. Si');

  define('MODULE_ORDER_TOTAL_COD_FEE_CHP_TITLE','La Poste Suisse');
  define('MODULE_ORDER_TOTAL_COD_FEE_CHP_DESC','&lt;ISO2-Code&gt;:&lt;Prix&gt;, ....<br />
00 comme ISO2-Code permet l&apos;exp�dition COD dans tous les pays. Si');

  define('MODULE_ORDER_TOTAL_COD_FEE_CHRONOPOST_TITLE','Chronopost');
  define('MODULE_ORDER_TOTAL_COD_FEE_CHRONOPOST_DESC','&lt;ISO2-Code&gt;:&lt;Prix&gt;, ....<br />
00 comme ISO2-Code permet l&apos;exp�dition COD dans tous les pays. Si');

  define('MODULE_ORDER_TOTAL_COD_FEE_DHL_TITLE','DHL Autriche');
  define('MODULE_ORDER_TOTAL_COD_FEE_DHL_DESC','&lt;ISO2-Code&gt;:&lt;Prix&gt;, ....<br />
00 comme ISO2-Code permet l&apos;exp�dition COD dans tous les pays. Si');

  define('MODULE_ORDER_TOTAL_COD_FEE_DP_TITLE','Poste allemande (Deutsche Post AG');
  define('MODULE_ORDER_TOTAL_COD_FEE_DP_DESC','&lt;ISO2-Code&gt;:&lt;Prix&gt;, ....<br />
00 comme ISO2-Code permet l&apos;exp�dition COD dans tous les pays. Si');
  
  // BOF - vr - 2009-12-04 - missing language definitions for OT-COD-FEE-UPS
  define('MODULE_ORDER_TOTAL_COD_FEE_UPS_TITLE','UPS');
  define('MODULE_ORDER_TOTAL_COD_FEE_UPS_DESC','&lt;ISO2-Code&gt;:&lt;Prix&gt;, ....<br />
00 comme ISO2-Code permet l&apos;exp�dition COD dans tous les pays. Si');
  
  define('MODULE_ORDER_TOTAL_COD_FEE_UPSE_TITLE','UPS Express');
  define('MODULE_ORDER_TOTAL_COD_FEE_UPSE_DESC','&lt;ISO2-Code&gt;:&lt;Prix&gt;, ....<br />
00 comme ISO2-Code permet l&apos;exp�dition COD dans tous les pays. Si');
  // EOF - vr - 2009-12-04 - missing language definitions for OT-COD-FEE-UPS

  define('MODULE_ORDER_TOTAL_COD_FEE_FREE_TITLE','Livraison gratuite (module frais d&apos;exp�dition en r�sum�)');
  define('MODULE_ORDER_TOTAL_COD_FEE_FREE_DESC','&lt;ISO2-Code&gt;:&lt;Prix&gt;, ....<br />
00 comme ISO2-Code permet l&apos;exp�dition COD dans tous les pays. Si');
  
  define('MODULE_ORDER_TOTAL_FREEAMOUNT_FREE_TITLE','Livraison gratuite (Module Livraison gratuite)');
  define('MODULE_ORDER_TOTAL_FREEAMOUNT_FREE_DESC','&lt;ISO2-Code&gt;:&lt;Prix&gt;, ....<br />
00 comme ISO2-Code permet l&apos;exp�dition COD dans tous les pays. Si');  

  define('MODULE_ORDER_TOTAL_COD_FEE_TAX_CLASS_TITLE','cat�gorie fiscale');
  define('MODULE_ORDER_TOTAL_COD_FEE_TAX_CLASS_DESC','S�lectionnez une cat�gorie fiscale');
?>