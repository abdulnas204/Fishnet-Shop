<?php
/* -----------------------------------------------------------------------------------------
   $Id: fedexeu.php 899 2005-04-29 02:40:57Z hhgag $   

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2003 XT-Commerce
   -----------------------------------------------------------------------------------------
   sur la base du: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce( fedexeu.php,v 1.01 2003/02/18 03:25:00); www.oscommerce.com 
   (c) 2003	 nextcommerce (fedexeu.php,v 1.5 2003/08/1); www.nextcommerce.org

   Released under the GNU General Public License 
   -----------------------------------------------------------------------------------------
   Third Party contributions:
   fedex_europe_1.02        	Autor:	Copyright (C) 2002 - 2003 TheMedia, Dipl.-Ing Thomas Pl�nkers | http://www.themedia.at & http://www.oscommerce.at

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/



define('MODULE_SHIPPING_FEDEXEU_TEXT_TITLE', 'FedEx Express Europe');
define('MODULE_SHIPPING_FEDEXEU_TEXT_DESCRIPTION', 'FedEx Express Europe');
define('MODULE_SHIPPING_FEDEXEU_TEXT_WAY', 'Exp�dier �');
define('MODULE_SHIPPING_FEDEXEU_TEXT_UNITS', 'kg');
define('MODULE_SHIPPING_FEDEXEU_INVALID_ZONE', 'Malheureusement, il n&apos;est pas possible d&apos;exp�dier dans ce pays.');
define('MODULE_SHIPPING_FEDEXEU_UNDEFINED_RATE', 'Les frais d&apos;exp�dition ne peuvent pas �tre calcul�s pour le moment.');

define('MODULE_SHIPPING_FEDEXEU_STATUS_TITLE' , 'FedEx Express Europe');
define('MODULE_SHIPPING_FEDEXEU_STATUS_DESC' , 'Voulez-vous offrir l&apos;exp�dition FedEx Express Europe ?');
define('MODULE_SHIPPING_FEDEXEU_HANDLING_TITLE' , 'frais de manutention.');
define('MODULE_SHIPPING_FEDEXEU_HANDLING_DESC' , 'Frais de manutention pour ce mode d&apos;exp�dition en Euro.');
define('MODULE_SHIPPING_FEDEXEU_TAX_CLASS_TITLE' , 'Tax Rate');
define('MODULE_SHIPPING_FEDEXEU_TAX_CLASS_DESC' , 'Utilisez la classe de taxe suivante sur les frais d&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_ZONE_TITLE' , 'Zone d&apos;exp�dition');
define('MODULE_SHIPPING_FEDEXEU_ZONE_DESC' , 'Si une zone est s�lectionn�e, n&apos;activez cette m�thode d&apos;exp�dition que pour cette zone.');
define('MODULE_SHIPPING_FEDEXEU_SORT_ORDER_TITLE' , 'Ordre de tri');
define('MODULE_SHIPPING_FEDEXEU_SORT_ORDER_DESC' , 's�quence de pr�sentation');
define('MODULE_SHIPPING_FEDEXEU_ALLOWED_TITLE' , 'Allowed Shipping Zones');
define('MODULE_SHIPPING_FEDEXEU_ALLOWED_DESC' , 'Veuillez entrer les zones <b>s�par�ment</b> qui devrait �tre autoris� � utiliser ce module (par ex. AT,DE (laisser vide si vous voulez autoriser toutes les zones)).');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_1_TITLE' , 'Pays de la zone 1 Europe');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_1_DESC' , 'Liste s�par�e par des virgules des codes de pays ISO � deux caract�res faisant partie de la zone 1');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_1_TITLE' , 'Tableau d&apos;exp�dition pour la zone 1 jusqu&apos;� 2.50 kg PAK');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_1_DESC' , 'Tableau d&apos;exp�dition pour la zone 1, sur la base du <b>\'PAK\'</b> jusqu&apos;� 2.50 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_1_TITLE' , 'Shipping Table for 1 jusqu&apos;� 10 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_1_DESC' , 'Tableau d&apos;exp�dition pour la zone 1, sur la base du <b>\'BOX\'</b> jusqu&apos;� 10 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_1_TITLE' , 'Suppl�ment de prix jusqu&apos;� 20 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_1_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_1_TITLE' , 'Suppl�ment de prix jusqu&apos;� 40 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_1_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_1_TITLE' , 'Suppl�ment de prix jusqu&apos;� 70 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_1_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_2_TITLE' , 'Pays de la zone 2 Europe');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_2_DESC' , 'Liste s�par�e par des virgules des codes de pays ISO � deux caract�res faisant partie de la zone 2.');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_2_TITLE' , 'Tableau d&apos;exp�dition pour la zone 2 jusqu&apos;� 2.50 kg PAK');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_2_DESC' , 'Shipping Table for die Zone 2, sur la base du <b>\'PAK\'</b> jusqu&apos;� 2.50 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_2_TITLE' , 'Tableau d&apos;exp�dition pour la zone 2 jusqu&apos;� 10 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_2_DESC' , 'Tableau d&apos;exp�dition pour la zone 2, sur la base du <b>\'BOX\'</b> jusqu&apos;� 10 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_2_TITLE' , 'Suppl�ment de prix jusqu&apos;� 20 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_2_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_2_TITLE' , 'Suppl�ment de prix jusqu&apos;� 40 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_2_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_2_TITLE' , 'Suppl�ment de prix jusqu&apos;� 70 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_2_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_3_TITLE' , 'Pays de la zone 3 Europe');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_3_DESC' , 'Liste s�par�e par des virgules des codes de pays ISO � deux caract�res faisant partie de la zone 3.');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_3_TITLE' , 'Tableau d&apos;exp�dition pour la zone 3 jusqu&apos;� 2.50 kg PAK');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_3_DESC' , 'Tableau d&apos;exp�dition pour la zone 3, sur la base du <b>\'PAK\'</b> jusqu&apos;� 2.50 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_3_TITLE' , 'Tableau d&apos;exp�dition pour la zone 3 jusqu&apos;� 10 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_3_DESC' , 'Tableau d&apos;exp�dition pour la zone 3, sur la base du <b>\'BOX\'</b> jusqu&apos;� 10 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_3_TITLE' , 'Suppl�ment de prix jusqu&apos;� 20 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_3_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_3_TITLE' , 'Suppl�ment de prix jusqu&apos;� 40 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_3_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_3_TITLE' , 'Suppl�ment de prix jusqu&apos;� 70 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_3_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_4_TITLE' , 'World Zone A Europe');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_4_DESC' , 'Liste s�par�e par des virgules des codes de pays ISO � deux caract�res faisant partie de la zone World A.');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_4_TITLE' , 'Tableau d&apos;exp�dition pour la zone A jusqu&apos;� 2.50 kg PAK');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_4_DESC' , 'Tableau d&apos;exp�dition pour la zone A, sur la base du <b>\'PAK\'</b> jusqu&apos;� 2.50 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_4_TITLE' , 'Tableau d&apos;exp�dition pour la zone A jusqu&apos;� 10 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_4_DESC' , 'Tableau d&apos;exp�dition pour la zone A, sur la base du <b>\'BOX\'</b> jusqu&apos;� 10 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_4_TITLE' , 'Suppl�ment de prix jusqu&apos;� 20 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_4_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_4_TITLE' , 'Suppl�ment de prix jusqu&apos;� 40 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_4_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_4_TITLE' , 'Suppl�ment de prix jusqu&apos;� 70 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_4_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_5_TITLE' , 'World Zone B Europe');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_5_DESC' , 'Liste s�par�e par des virgules des codes de pays ISO � deux caract�res faisant partie de la zone World B.');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_5_TITLE' , 'Tableau d&apos;exp�dition pour la zone B jusqu&apos;� 2.50 kg PAK');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_5_DESC' , 'Tableau d&apos;exp�dition pour la zone B, sur la base du <b>\'PAK\'</b> jusqu&apos;� 2.50 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_5_TITLE' , 'Tableau d&apos;exp�dition pour la zone B jusqu&apos;� 10 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_5_DESC' , 'Tableau d&apos;exp�dition pour la zone B, sur la base du <b>\'BOX\'</b> jusqu&apos;� 10 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_5_TITLE' , 'Suppl�ment de prix jusqu&apos;� 20 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_5_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_5_TITLE' , 'Suppl�ment de prix jusqu&apos;� 40 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_5_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_5_TITLE' , 'Suppl�ment de prix jusqu&apos;� 70 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_5_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_6_TITLE' , 'World Zone C Europe');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_6_DESC' , 'Liste s�par�e par des virgules des codes de pays ISO � deux caract�res faisant partie de la zone World C.');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_6_TITLE' , 'Tableau d&apos;exp�dition pour la zone C jusqu&apos;� 2.50 kg PAK');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_6_DESC' , 'Tableau d&apos;exp�dition pour la zone C, sur la base du <b>\'PAK\'</b> jusqu&apos;� 2.50 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_6_TITLE' , 'Tableau d&apos;exp�dition pour la zone C jusqu&apos;� 10 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_6_DESC' , 'Tableau d&apos;exp�dition pour la zone C, sur la base du <b>\'BOX\'</b> jusqu&apos;� 10 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_6_TITLE' , 'Suppl�ment de prix jusqu&apos;� 20 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_6_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_6_TITLE' , 'Suppl�ment de prix jusqu&apos;� 40 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_6_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_6_TITLE' , 'Suppl�ment de prix jusqu&apos;� 70 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_6_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_7_TITLE' , 'World Zone D Europe');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_7_DESC' , 'Liste s�par�e par des virgules des codes de pays ISO � deux caract�res faisant partie de la zone World D.');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_7_TITLE' , 'Tableau d&apos;exp�dition pour la zone D jusqu&apos;� 2.50 kg PAK');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_7_DESC' , 'Tableau d&apos;exp�dition pour la zone D, sur la base du <b>\'PAK\'</b> jusqu&apos;� 2.50 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_7_TITLE' , 'Tableau d&apos;exp�dition pour la zone D jusqu&apos;� 10 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_7_DESC' , 'Tableau d&apos;exp�dition pour la zone D, sur la base du <b>\'BOX\'</b> jusqu&apos;� 10 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_7_TITLE' , 'Suppl�ment de prix jusqu&apos;� 20 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_7_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_7_TITLE' , 'Suppl�ment de prix jusqu&apos;� 40 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_7_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_7_TITLE' , 'Suppl�ment de prix jusqu&apos;� 70 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_7_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_8_TITLE' , 'World Zone E Europe');
define('MODULE_SHIPPING_FEDEXEU_COUNTRIES_8_DESC' , 'Liste s�par�e par des virgules des codes de pays ISO � deux caract�res faisant partie de la zone World E.');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_8_TITLE' , 'Tableau d&apos;exp�dition pour la zone E jusqu&apos;� 2.50 kg PAK');
define('MODULE_SHIPPING_FEDEXEU_COST_PAK_8_DESC' , 'Tableau d&apos;exp�dition pour la zone E, sur la base du <b>\'PAK\'</b> jusqu&apos;� 2.50 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_8_TITLE' , 'Tableau d&apos;exp�dition pour la zone E jusqu&apos;� 10 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_COST_BOX_8_DESC' , 'Tableau d&apos;exp�dition pour la zone E, sur la base du <b>\'BOX\'</b> jusqu&apos;� 10 kg poids � l&apos;exp�dition.');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_8_TITLE' , 'Suppl�ment de prix jusqu&apos;� 20 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_20_8_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_8_TITLE' , 'Suppl�ment de prix jusqu&apos;� 30 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_40_8_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_8_TITLE' , 'Suppl�ment de prix jusqu&apos;� 50 kg BOX');
define('MODULE_SHIPPING_FEDEXEU_STEP_BOX_70_8_DESC' , 'Suppl�ment pour chaque 0,50 kg suppl�mentaire en EUR');
?>
