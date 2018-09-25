<?php
/* -----------------------------------------------------------------------------------------
   $Id: dp.php 899 2005-04-29 02:40:57Z hhgag $   

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2003 XT-Commerce
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(dp.php,v 1.4 2003/02/18 04:28:00); www.oscommerce.com 
   (c) 2003	 nextcommerce (dp.php,v 1.5 2003/08/13); www.nextcommerce.org

   Released under the GNU General Public License 
   -----------------------------------------------------------------------------------------
   Third Party contributions:
   German Post (Deutsche Post WorldNet)         	Autor:	Copyright (C) 2002 - 2003 TheMedia, Dipl.-Ing Thomas Pl�nkers | http://www.themedia.at & http://www.oscommerce.at

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/


define('MODULE_SHIPPING_DP_TEXT_TITLE', 'German Post');
define('MODULE_SHIPPING_DP_TEXT_DESCRIPTION', 'Poste allemande - Module d&apos;exp�dition mondiale');
define('MODULE_SHIPPING_DP_TEXT_WAY', 'Exp�dier �');
define('MODULE_SHIPPING_DP_TEXT_UNITS', 'kg');
define('MODULE_SHIPPING_DP_INVALID_ZONE', 'Malheureusement, il n&apos;est pas possible d&apos;exp�dier dans ce pays.');
define('MODULE_SHIPPING_DP_UNDEFINED_RATE', 'Les frais d&apos;exp�dition ne peuvent pas �tre calcul�s pour le moment.');

define('MODULE_SHIPPING_DP_STATUS_TITLE' , 'German Post WorldNet');
define('MODULE_SHIPPING_DP_STATUS_DESC' , 'voulez-vous l&apos;envoi par la poste allemande ?');
define('MODULE_SHIPPING_DP_HANDLING_TITLE' , 'frais de manutention.');
define('MODULE_SHIPPING_DP_HANDLING_DESC' , 'Frais de traitement pour ce mode d&apos;exp�dition en Euro');
define('MODULE_SHIPPING_DP_TAX_CLASS_TITLE' , 'Cadence');
define('MODULE_SHIPPING_DP_TAX_CLASS_DESC' , 'S�lectionnez le taux de TVA pour cette m�thode d&apos;exp�dition.');
define('MODULE_SHIPPING_DP_ZONE_TITLE' , 'Zone d&apos;exp�dition');
define('MODULE_SHIPPING_DP_ZONE_DESC' , 'Si vous s�lectionnez une zone, cette m�thode d&apos;exp�dition n&apos;est offerte que dans cette zone.');
define('MODULE_SHIPPING_DP_SORT_ORDER_TITLE' , 'S�quence d&apos;affichage');
define('MODULE_SHIPPING_DP_SORT_ORDER_DESC' , 'Le plus bas est affich� en premier.');
define('MODULE_SHIPPING_DP_ALLOWED_TITLE' , 'Zones d&apos;exp�dition');
define('MODULE_SHIPPING_DP_ALLOWED_DESC' , 'Veuillez entrer les zones <b>s�par�ment</b> qui devrait �tre autoris� � utiliser ce module (par ex. AT,DE (laisser vide si vous voulez autoriser toutes les zones)).');
define('MODULE_SHIPPING_DP_COUNTRIES_1_TITLE' , 'Pays de la zone 1 de la Poste Allemande');
define('MODULE_SHIPPING_DP_COUNTRIES_1_DESC' , 'Liste s�par�e par des virgules des codes de pays ISO � deux caract�res faisant partie de la zone 1');
define('MODULE_SHIPPING_DP_COST_1_TITLE' , 'Pays de la zone 1 Tableau d&aposexp�dition') ;
define('MODULE_SHIPPING_DP_COST_1_DESC' , 'Tarifs d&apos;exp�dition vers les destinations de la zone 1 bas�s sur une gamme de poids de commande. Exemple : 0-3:8.50,3-7:10.50,...... Les poids sup�rieurs � 0 et inf�rieurs ou �gaux � 3 co�teraient 14.57 pour les destinations de la zone 1..');
define('MODULE_SHIPPING_DP_COUNTRIES_2_TITLE' , 'Pays de la zone 2 de la Poste Allemande');
define('MODULE_SHIPPING_DP_COUNTRIES_2_DESC' , 'Liste s�par�e par des virgules des codes de pays ISO � deux caract�res faisant partie de la zone 2');
define('MODULE_SHIPPING_DP_COST_2_TITLE' , 'Pays de la zone 2 Tableau d&aposexp�dition') ;
define('MODULE_SHIPPING_DP_COST_2_DESC' , 'Tarifs d&apos;exp�dition vers les destinations de la zone 2 destinations bas�s sur une gamme de poids de commande. Example: 0-3:8.50,3-7:10.50,... Les poids sup�rieurs � 0 et inf�rieurs ou �gaux � 3 co�teraient 23.78 pour la zone 2 .');
define('MODULE_SHIPPING_DP_COUNTRIES_3_TITLE' , 'Pays de la zone 3 de la Poste Allemande');
define('MODULE_SHIPPING_DP_COUNTRIES_3_DESC' , 'Liste s�par�e par des virgules des codes de pays ISO � deux caract�res faisant partie de la zone 3');
define('MODULE_SHIPPING_DP_COST_3_TITLE' , 'Pays de la zone 3 Tableau d&aposexp�dition') ;
define('MODULE_SHIPPING_DP_COST_3_DESC' , 'Tarifs d&apos;exp�dition vers les destinations de la zone 3 destinations bas�s sur une gamme de poids de commande. Example: 0-3:8.50,3-7:10.50,... Les poids sup�rieurs � 0 et inf�rieurs ou �gaux � 3 co�teraient 26.84 pour la zone 3 .');
define('MODULE_SHIPPING_DP_COUNTRIES_4_TITLE' , 'Pays de la zone 4 de la Poste Allemande');
define('MODULE_SHIPPING_DP_COUNTRIES_4_DESC' , 'Liste s�par�e par des virgules des codes de pays ISO � deux caract�res faisant partie de la zone 4');
define('MODULE_SHIPPING_DP_COST_4_TITLE' , 'Pays de la zone 4 Tableau d&aposexp�dition') ;
define('MODULE_SHIPPING_DP_COST_4_DESC' , 'Tarifs d&apos;exp�dition vers les destinations de la zone 4 destinations bas�s sur une gamme de poids de commande. Example: 0-3:8.50,3-7:10.50,... Les poids sup�rieurs � 0 et inf�rieurs ou �gaux � 3 co�teraient 32.98 pour la zone 4 .');
define('MODULE_SHIPPING_DP_COUNTRIES_5_TITLE' , 'Pays de la zone 5 de la Poste Allemande');
define('MODULE_SHIPPING_DP_COUNTRIES_5_DESC' , 'Liste s�par�e par des virgules des codes de pays ISO � deux caract�res faisant partie de la zone 5');
define('MODULE_SHIPPING_DP_COST_5_TITLE' , 'Pays de la zone 5 Tableau d&aposexp�dition') ;
define('MODULE_SHIPPING_DP_COST_5_DESC' , 'Tarifs d&apos;exp�dition vers les destinations de la zone 5 destinations bas�s sur une gamme de poids de commande. Example: 0-3:8.50,3-7:10.50,... Les poids sup�rieurs � 0 et inf�rieurs ou �gaux � 3 co�teraient 32.98 pour la zone 5 .');
define('MODULE_SHIPPING_DP_COUNTRIES_6_TITLE' , 'Pays de la zone 6 de la Poste Allemande');
define('MODULE_SHIPPING_DP_COUNTRIES_6_DESC' , 'Liste s�par�e par des virgules des codes de pays ISO � deux caract�res faisant partie de la zone 6');
define('MODULE_SHIPPING_DP_COST_6_TITLE' , 'Pays de la zone 6 Tableau d&aposexp�dition') ;
define('MODULE_SHIPPING_DP_COST_6_DESC' , 'Tarifs d&apos;exp�dition vers les destinations de la zone 6 destinations bas�s sur une gamme de poids de commande. Example: 0-3:8.50,3-7:10.50,... Les poids sup�rieurs � 0 et inf�rieurs ou �gaux � 3 co�teraient 5.62 pour la zone 6 .');
?>
