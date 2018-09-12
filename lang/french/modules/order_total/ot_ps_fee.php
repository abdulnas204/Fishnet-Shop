<?php
/* -----------------------------------------------------------------------------------------
   $Id: ot_ps_fee.php 2301 2011-10-30 12:12:31Z web28 $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(ot_cod_fee.php,v 1.02 2003/02/24); www.oscommerce.com
   (C) 2001 - 2003 TheMedia, Dipl.-Ing Thomas Pl�nkers ; http://www.themedia.at & http://www.oscommerce.at
   (c) 2006 XT-Commerce (ot_ps_fee.php 899 2005-04-29 02)

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/


  define('MODULE_ORDER_TOTAL_PS_FEE_TITLE', 'Exp�dition personnelle');
  define('MODULE_ORDER_TOTAL_PS_FEE_DESCRIPTION', 'Calcul des frais d&apos;exp�dition personnelle');

  define('MODULE_ORDER_TOTAL_PS_FEE_STATUS_TITLE','Exp�dition personnelle');
  define('MODULE_ORDER_TOTAL_PS_FEE_STATUS_DESC','Calcul des frais d&apos;exp�dition personnelle');

  define('MODULE_ORDER_TOTAL_PS_SORT_ORDER_TITLE','ordre de tri');
  define('MODULE_ORDER_TOTAL_PS_SORT_ORDER_DESC','s�quence de pr�sentation');

  define('MODULE_ORDER_TOTAL_PS_FEE_FLAT_TITLE','Frais d&apos;exp�dition fixes');
  define('MODULE_ORDER_TOTAL_PS_FEE_FLAT_DESC','&lt;ISO2-Code&gt;:&lt;Prix&gt;, ....<br />
 00 comme ISO2-Code permet l&apos;exp�dition PS dans tous les pays. Si
  00 est utilis�, vous devez l&apos;entrer comme dernier argument. Si
  non 00:9.99 est entr�, l&apos;exp�dition PS dans les pays �trangers ne sera pas calcul�e.
  (impossible).');

  define('MODULE_ORDER_TOTAL_PS_FEE_ITEM_TITLE','Frais d&apos;exp�dition par pi�ce');
  define('MODULE_ORDER_TOTAL_PS_FEE_ITEM_DESC','&lt;ISO2-Code&gt;:&lt;Price&gt;, ....<br />
00 comme ISO2-Code permet l&apos;exp�dition PS dans tous les pays. Si
  00 est utilis�, vous devez l&apos;entrer comme dernier argument. Si
  non 00:9.99 est entr�, l&apos;exp�dition PS dans les pays �trangers ne sera pas calcul�e.
  (impossible).');

  define('MODULE_ORDER_TOTAL_PS_FEE_TABLE_TITLE','Frais d&apos;exp�dition tabulaires');
  define('MODULE_ORDER_TOTAL_PS_FEE_TABLE_DESC','&lt;ISO2-Code&gt;:&lt;Price&gt;, ....<br />
  00 comme ISO2-Code permet l&apos;exp�dition PS dans tous les pays. Si
  00 est utilis�, vous devez l&apos;entrer comme dernier argument. Si
  non 00:9.99 est entr�, l&apos;exp�dition PS dans les pays �trangers ne sera pas calcul�e.
  (impossible).');

  define('MODULE_ORDER_TOTAL_PS_FEE_ZONES_TITLE','Frais d&apos;exp�dition pour les zones');
  define('MODULE_ORDER_TOTAL_PS_FEE_ZONES_DESC','&lt;ISO2-Code&gt;:&lt;Price&gt;, ....<br />
  00 comme ISO2-Code permet l&apos;exp�dition PS dans tous les pays. Si
  00 est utilis�, vous devez l&apos;entrer comme dernier argument. Si
  non 00:9.99 est entr�, l&apos;exp�dition PS dans les pays �trangers ne sera pas calcul�e.
  (impossible).');

  define('MODULE_ORDER_TOTAL_PS_FEE_AP_TITLE','Post autrichien');
  define('MODULE_ORDER_TOTAL_PS_FEE_AP_DESC','&lt;ISO2-Code&gt;:&lt;Price&gt;, ....<br />
  00 comme ISO2-Code permet l&apos;exp�dition PS dans tous les pays. Si
  00 est utilis�, vous devez l&apos;entrer comme dernier argument. Si
  non 00:9.99 est entr�, l&apos;exp�dition PS dans les pays �trangers ne sera pas calcul�e.
  (impossible).');

  define('MODULE_ORDER_TOTAL_PS_FEE_DP_TITLE','Poste Allemande');
  define('MODULE_ORDER_TOTAL_PS_FEE_DP_DESC','&lt;ISO2-Code&gt;:&lt;Price&gt;, ....<br />
  00 comme ISO2-Code permet l&apos;exp�dition PS dans tous les pays. Si
  00 est utilis�, vous devez l&apos;entrer comme dernier argument. Si
  non 00:9.99 est entr�, l&apos;exp�dition PS dans les pays �trangers ne sera pas calcul�e.
  (impossible).');

  define('MODULE_ORDER_TOTAL_PS_TAX_CLASS_TITLE','Taxclass');
  define('MODULE_ORDER_TOTAL_PS_TAX_CLASS_DESC','Choose a taxclass.');
?>