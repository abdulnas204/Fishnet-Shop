<?php
/* -----------------------------------------------------------------------------------------
   $Id: ap.php 899 2005-04-29 02:40:57Z hhgag $   

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2003 XT-Commerce
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(ap.php,v 1.02 2003/02/18); www.oscommerce.com 
   (c) 2003	 nextcommerce (ap.php,v 1.4 2003/08/13); www.nextcommerce.org

   Released under the GNU General Public License 
   -----------------------------------------------------------------------------------------
   Third Party contributions:
   austrian_post_1.05       	Autor:	Copyright (C) 2002 - 2003 TheMedia, Dipl.-Ing Thomas Pl�nkers | http://www.themedia.at & http://www.oscommerce.at

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/
   

define('MODULE_SHIPPING_AP_TEXT_TITLE', 'Austrian Post AG');
define('MODULE_SHIPPING_AP_TEXT_DESCRIPTION', 'Austrian Post AG - Exp�dition dans le monde entier');
define('MODULE_SHIPPING_AP_TEXT_WAY', 'Exp�dier �');
define('MODULE_SHIPPING_AP_TEXT_UNITS', 'kg');
define('MODULE_SHIPPING_AP_INVALID_ZONE', 'Malheureusement, il n&apos;est pas possible d&apos;exp�dier dans ce pays.');
define('MODULE_SHIPPING_AP_UNDEFINED_RATE', 'Les frais d&apos;exp�dition ne peuvent pas �tre calcul�s pour le moment.');

define('MODULE_SHIPPING_AP_STATUS_TITLE' , 'Austrian Post AG');
define('MODULE_SHIPPING_AP_STATUS_DESC' , 'Vous souhaitez exp�dier via la poste autriche?');
define('MODULE_SHIPPING_AP_HANDLING_TITLE' , 'frais de manutention.');
define('MODULE_SHIPPING_AP_HANDLING_DESC' , 'Frais de traitement pour ce mode d&apos;exp�dition en Euro');
define('MODULE_SHIPPING_AP_TAX_CLASS_TITLE' , 'Cadence');
define('MODULE_SHIPPING_AP_TAX_CLASS_DESC' , 'S�lectionnez le taux de TVA pour cette m�thode d&apos;exp�dition.');
define('MODULE_SHIPPING_AP_ZONE_TITLE' , 'Zone d&apos;exp�dition');
define('MODULE_SHIPPING_AP_ZONE_DESC' , 'Si vous s�lectionnez une zone, cette m�thode d&apos;exp�dition n&apos;est offerte que dans cette zone.');
define('MODULE_SHIPPING_AP_SORT_ORDER_TITLE' , 'S�quence d&apos;affichage');
define('MODULE_SHIPPING_AP_SORT_ORDER_DESC' , 'Le plus bas est affich� en premier.');
define('MODULE_SHIPPING_AP_ALLOWED_TITLE' , 'Zones d&apos;exp�dition');
define('MODULE_SHIPPING_AP_ALLOWED_DESC' , 'Pr�ciser <b>individuel</b> les zones vers lesquelles l&apos;exp�dition devrait �tre possible. ex.');
define('MODULE_SHIPPING_AP_COUNTRIES_1_TITLE' , 'Zone 1a pays');
define('MODULE_SHIPPING_AP_COUNTRIES_1_DESC' , 'Liste de pays s�par�s par des virgules sous forme de code ISO � deux caract�res Codes de pays faisant partie de la zone 1a');
define('MODULE_SHIPPING_AP_COST_1_TITLE' , 'Zone 1a Table tarifaire jusqu&apos;� 20 kg');
define('MODULE_SHIPPING_AP_COST_1_DESC' , 'Tableau tarifaire pour la zone 1a,  bas� sur <b>\'Emballage rapide\'</b> jusqu&apos;� 20 kg de poids d&apos;exp�dition.');
define('MODULE_SHIPPING_AP_COUNTRIES_2_TITLE' , 'Zone 1b pays');
define('MODULE_SHIPPING_AP_COUNTRIES_2_DESC' , 'Liste de pays s�par�s par des virgules sous forme de code ISO � deux caract�res Codes de pays faisant partie de la zone 1b');
define('MODULE_SHIPPING_AP_COST_2_TITLE' , 'Zone 1b Table tarifaire jusqu&apos;� 20 kg');
define('MODULE_SHIPPING_AP_COST_2_DESC' , 'Tableau tarifaire pour la zone 1b,  bas� sur <b>\'Emballage rapide\'</b> jusqu&apos;� 20 kg de poids d&apos;exp�dition.');
define('MODULE_SHIPPING_AP_COUNTRIES_3_TITLE' , 'Zone 2 pays');
define('MODULE_SHIPPING_AP_COUNTRIES_3_DESC' , 'Liste de pays s�par�s par des virgules sous forme de code ISO � deux caract�res Codes de pays faisant partie de la zone 2.');
define('MODULE_SHIPPING_AP_COST_3_TITLE' , 'Zone 2 Table tarifaire jusqu&apos;� 20 kg');
define('MODULE_SHIPPING_AP_COST_3_DESC' , 'Tableau tarifaire pour la zone 2, bas� sur <b>\'Emballage rapide\'</b> jusqu&apos;� 20 kg de poids d&apos;exp�dition.');
define('MODULE_SHIPPING_AP_COUNTRIES_4_TITLE' , 'Pays de la zone 3');
define('MODULE_SHIPPING_AP_COUNTRIES_4_DESC' , 'Liste des pays s�par�s par des virgules sous forme de code ISO � deux caract�res Codes de pays faisant partie de la zone 3.');
define('MODULE_SHIPPING_AP_COST_4_TITLE' , 'Zone 3 Table tarifaire jusqu&apos;� 20 kg');
define('MODULE_SHIPPING_AP_COST_4_DESC' , 'Tableau tarifaire pour la zone 3, bas� sur <b>\'Emballage rapide\'</b> jusqu&apos;� 20 kg de poids d&apos;exp�dition.');
define('MODULE_SHIPPING_AP_COUNTRIES_5_TITLE' , 'Zone 4 pays');
define('MODULE_SHIPPING_AP_COUNTRIES_5_DESC' , 'Liste de pays s�par�s par des virgules sous forme de code ISO � deux caract�res Codes de pays faisant partie de la zone 4');
define('MODULE_SHIPPING_AP_COST_5_TITLE' , 'Zone 4 Table tarifaire jusqu&apos;� 20 kg');
define('MODULE_SHIPPING_AP_COST_5_DESC' , 'Tableau tarifaire pour la zone 4, bas� sur <b>\'Emballage rapide\'</b> jusqu&apos;� 20 kg de poids d&apos;exp�dition.');
define('MODULE_SHIPPING_AP_COUNTRIES_6_TITLE' , 'Zone 4 pays');
define('MODULE_SHIPPING_AP_COUNTRIES_6_DESC' , 'Liste de pays s�par�s par des virgules sous forme de code ISO � deux caract�res Codes de pays faisant partie de la zone 4');
define('MODULE_SHIPPING_AP_COST_6_TITLE' , 'Zone 4 Table tarifaire jusqu&apos;� 20 kg');
define('MODULE_SHIPPING_AP_COST_6_DESC' , 'Tableau tarifaire pour la zone 4, bas� sur <b>\'Emballage rapide\'</b> jusqu&apos;� 20 kg de poids d&apos;exp�dition.');
define('MODULE_SHIPPING_AP_COUNTRIES_7_TITLE' , 'Zone 5 pays');
define('MODULE_SHIPPING_AP_COUNTRIES_7_DESC' , 'Liste de pays s�par�s par des virgules sous forme de code ISO � deux caract�res Codes de pays faisant partie de la zone 5');
define('MODULE_SHIPPING_AP_COST_7_TITLE' , 'Zone 5 Table tarifaire jusqu&apos;� 20 kg');
define('MODULE_SHIPPING_AP_COST_7_DESC' , 'Tableau tarifaire pour la zone 5,  bas� sur <b>\'Emballage rapide\'</b> jusqu&apos;� 20 kg de poids d&apos;exp�dition.');
define('MODULE_SHIPPING_AP_COUNTRIES_8_TITLE' , 'Zone Inland');
define('MODULE_SHIPPING_AP_COUNTRIES_8_DESC' , 'Inlandszone');
define('MODULE_SHIPPING_AP_COST_8_TITLE' , 'Zone Table tarifaire jusqu&apos;� 31.5 kg');
define('MODULE_SHIPPING_AP_COST_8_DESC' , 'Tableau tarifaire pour la zone domestique, jusqu&apos;� 31,5 kg de poids d&apos;exp�dition.');
?>