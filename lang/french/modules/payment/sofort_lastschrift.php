<?php
/**
 * @version SOFORT Gateway 5.2.0 - $Date: 2012-09-06 14:27:56 +0200 (Thu, 06 Sep 2012) $
 * @author SOFORT AG (integration@sofort.com)
 * @link http://www.sofort.com/
 *
 * Copyright (c) 2012 SOFORT AG
 *
 * $Id: sofort_lastschrift.php 3751 2012-10-10 08:36:20Z gtb-modified $
 */

//include language-constants used in all Multipay Projects
require_once 'sofort_general.php';

define('MODULE_PAYMENT_SOFORT_LS_CHECKOUT_CONDITIONS', '
<script type="text/javascript">
		function showLsConditions() {
			lsOverlay = new sofortOverlay(jQuery(".lsOverlay"), "callback/sofort/ressources/scripts/getContent.php", "https://documents.sofort.com/de/ls/privacy_de");
			lsOverlay.trigger();
		}
		document.write(\'<a id="lsNotice" href="javascript:void(0)" onclick="showLsConditions()">J&apos;ai lu la politique de confidentialit�.</a>\');
	</script>
	<div style="display:none; z-index: 1001;filter: alpha(opacity=92);filter: progid :DXImageTransform.Microsoft.Alpha(opacity=92);-moz-opacity: .92;-khtml-opacity: 0.92;opacity: 0.92;background-color: black;position: fixed;top: 0px;left: 0px;width: 100%;height: 100%;text-align: center;vertical-align: middle;" class="lsOverlay">
		<div class="loader" style="z-index: 1002; position: relative;background-color: #fff;border: 5px solid #C0C0C0;top: 40px;overflow: scroll;padding: 4px;border-radius: 7px;-moz-border-radius: 7px;-webkit-border-radius: 7px;margin: auto;width: 620px;height: 400px;overflow: scroll; overflow-x: hidden;">
			<div class="closeButton" style="position: fixed; top: 54px; background: url(callback/sofort/ressources/images/close.png) right top no-repeat;cursor:pointer;height: 30px;width: 30px;"></div>
			<div class="content"></div>
		</div>
	</div>
	<noscript>
		<a href="https://documents.sofort.com/de/ls/privacy_de" target="_blank">J&apos;ai lu la politique de confidentialit�.</a>
	</noscript>
');
define('MODULE_PAYMENT_SOFORT_LS_TEXT_TITLE', 'Lastschrift by SOFORT <br /><img src="https://images.sofort.com/en/ls/logo_90x30.png" alt="logo direct debit"/>');
define('MODULE_PAYMENT_SOFORT_LASTSCHRIFT_TEXT_TITLE', 'D�bit direct/d�bit bancaire (d�bit direct par pr�l�vement imm�diat)');
define('MODULE_PAYMENT_SOFORT_LS_TEXT_ERROR_MESSAGE', 'Le paiement n&apos;est malheureusement pas possible ou a �t� annul� par le client. Veuillez choisir un autre mode de paiement.');
define('MODULE_PAYMENT_SOFORT_LS_CHECKOUT_TEXT', '');
define('MODULE_PAYMENT_SOFORT_LS_STATUS_TITLE', 'Activer sofort.de module');
define('MODULE_PAYMENT_SOFORT_LS_STATUS_DESC', 'Active/d�sactive le module complet.');
define('MODULE_PAYMENT_SOFORT_LS_SORT_ORDER_TITLE', 's�quence de tri');
define('MODULE_PAYMENT_SOFORT_LS_SORT_ORDER_DESC', 'Ordre d&apos;affichage. Le plus petit nombre appara�tra en premier.');
define('MODULE_PAYMENT_SOFORT_LS_TEXT_DESCRIPTION', 'Module de paiement pour Lastschrift by SOFORT');
define('MODULE_PAYMENT_SOFORT_LS_TEXT_ERROR_HEADING', 'Erreur dans le traitement de la commande.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_LS', 'Le paiement n&apos;est malheureusement pas possible ou a �t� annul� par le client. Veuillez choisir un autre mode de paiement.');

define('MODULE_PAYMENT_SOFORT_LS_TEXT_DESCRIPTION_CHECKOUT_PAYMENT_IMAGE', '');
define('MODULE_PAYMENT_SOFORT_LS_TEXT_HOLDER', 'titulaire du compte : ');
define('MODULE_PAYMENT_SOFORT_LS_TEXT_ACCOUNT_NUMBER', 'num�ro de compte : ');
define('MODULE_PAYMENT_SOFORT_LS_TEXT_BANK_CODE', 'code bancaire : ');
define('MODULE_PAYMENT_SOFORT_LS_TEXT_DESCRIPTION_CHECKOUT_PAYMENT_IMAGEALT', 'Payment with Lastschrift by SOFORT: Confidentialit� des donn�es certifi�e par le T�V. Pas d&apos;inscription suppl�mentaire. Livraison rapide des produits et services.');
define('MODULE_PAYMENT_SOFORT_LASTSCHRIFT_ALLOWED_TITLE', 'Zones autoris�es');
define('MODULE_PAYMENT_SOFORT_LASTSCHRIFT_ALLOWED_DESC', 'Veuillez entrer les zones <b>s�par�ment </b> qui devrait �tre autoris� � utiliser ce module (par ex. AT,DE (laisser vide si vous voulez autoriser toutes les zones)).');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_PROJECT_ID_TITLE', 'project ID');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_PROJECT_ID_DESC', 'Num�ro de projet attribu� par SOFORT AG');
define('MODULE_PAYMENT_SOFORT_LS_ZONE_TITLE', MODULE_PAYMENT_SOFORT_MULTIPAY_ZONE_TITLE);
define('MODULE_PAYMENT_SOFORT_LS_ZONE_DESC', MODULE_PAYMENT_SOFORT_MULTIPAY_ZONE_DESC);

define('MODULE_PAYMENT_SOFORT_LS_ORDER_STATUS_ID_TITLE', 'Statut d&apos;une commande confirm�e.');
define('MODULE_PAYMENT_SOFORT_LS_ORDER_STATUS_ID_DESC', 'Statut d&apos;une commande confirm�e.<br />Statut de la commande apr�s avoir compl�t� avec succ�s une transaction.');

define('MODULE_PAYMENT_SOFORT_LS_LOGO', 'logo_155x50.png');
define('MODULE_PAYMENT_SOFORT_LS_BANNER', 'banner_300x100.png');

define('MODULE_PAYMENT_SOFORT_LS_RECOMMENDED_PAYMENT_TITLE', 'recommander le mode de paiement');
define('MODULE_PAYMENT_SOFORT_LS_RECOMMENDED_PAYMENT_DESC', '"Cochez cette m�thode de paiement comme "m�thode de paiement recommand�e". Sur la page de s�lection de paiement, une note sera affich�e juste derri�re le mode de paiement."');
define('MODULE_PAYMENT_SOFORT_LS_RECOMMENDED_PAYMENT_TEXT', '(recommander le mode de paiement)');

?>