<?php
/* --------------------------------------------------------------
	payone.php 2013-08-02 mabr
	Gambio GmbH
	http://www.gambio.de
	Copyright (c) 2013 Gambio GmbH
	Released under the GNU General Public License (Version 2)
	[http://www.gnu.org/licenses/gpl-2.0.html]
	--------------------------------------------------------------


	based on:
	(c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
	(c) 2002-2003 osCommerce(ot_cod_fee.php,v 1.02 2003/02/24); www.oscommerce.com
	(C) 2001 - 2003 TheMedia, Dipl.-Ing Thomas Pl�nkers ; http://www.themedia.at & http://www.oscommerce.at
	(c) 2003 XT-Commerce - community made shopping http://www.xt-commerce.com ($Id: ot_cod_fee.php 1003 2005-07-10 18:58:52Z mz $)

	Released under the GNU General Public License
	---------------------------------------------------------------------------------------*/

define('MODULE_PAYMENT_PAYONE_TEXT_TITLE', 'PayOne');
define('MODULE_PAYMENT_PAYONE_TEXT_DESCRIPTION', 'PayOne');
define('MODULE_PAYMENT_PAYONE_TEXT_INFO', 'PayOne');
define('MODULE_PAYMENT_PAYONE_STATUS_TITLE', 'Activer le module');
define('MODULE_PAYMENT_PAYONE_STATUS_DESC', 'Acceptez-vous les paiements via ce module ?');
define('MODULE_PAYMENT_PAYONE_ALLOWED_TITLE', 'Zones autoris�es');
define('MODULE_PAYMENT_PAYONE_ALLOWED_DESC', 'Sp�cifiez <b>individuel</b>les zones qui devraient �tre autoris�es pour ce module. (p. ex. AT,DE (si vide, toutes les zones sont autoris�es)). ');
define('MODULE_PAYMENT_PAYONE_ZONE_TITLE', 'zone de paiement');
define('MODULE_PAYMENT_PAYONE_ZONE_DESC', 'Si une zone est s�lectionn�e, le mode de paiement ne s&apos;applique qu&apos;� cette zone.');
define('MODULE_PAYMENT_PAYONE_TMPORDER_STATUS_ID_TITLE', 'D�finir un statut de commande temporaire');
define('MODULE_PAYMENT_PAYONE_TMPORDER_STATUS_ID_DESC', 'D�finir les commandes pass�es avec ce module � ce statut (pendant le processus de paiement en cours).');
define('MODULE_PAYMENT_PAYONE_ORDER_STATUS_ID_TITLE', 'D�finir le statut de l&apos;ordre');
define('MODULE_PAYMENT_PAYONE_ORDER_STATUS_ID_DESC', 'D�finir les commandes pass�es avec ce module � ce statut.');
define('MODULE_PAYMENT_PAYONE_SORT_ORDER_TITLE', 's�quence de pr�sentation');
define('MODULE_PAYMENT_PAYONE_SORT_ORDER_DESC', 'S�quence d&apos;affichage. Le plus petit chiffre est affich� en premier.');
define('MODULE_PAYMENT_PAYONE_LP', '<br /><br /><a target="_blank" href="http://www.payone.de/plattform-integration/extensions/modified-shop/"><strong>Cr�ez un compte PAYONE ici maintenant.</strong></a>');
