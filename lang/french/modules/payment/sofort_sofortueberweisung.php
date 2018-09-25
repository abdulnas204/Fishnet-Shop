<?php
/**
 * @version SOFORT Gateway 5.2.0 - $Date: 2012-09-06 14:27:56 +0200 (Thu, 06 Sep 2012) $
 * @author SOFORT AG (integration@sofort.com)
 * @link http://www.sofort.com/
 *
 * Copyright (c) 2012 SOFORT AG
 *
 * $Id: sofort_sofortueberweisung.php 3751 2012-10-10 08:36:20Z gtb-modified $
 */

//include language-constants used in all Multipay Projects
require_once 'sofort_general.php';

define('MODULE_PAYMENT_SOFORT_SU_TEXT_TITLE', 'SOFORT Banking <br /> <img src="https://images.sofort.com/en/su/logo_90x30.png" alt="SOFORT Banking"/>');
define('MODULE_PAYMENT_SOFORT_SOFORTUEBERWEISUNG_TEXT_TITLE', 'SOFORT Banking');
define('MODULE_PAYMENT_SOFORT_SU_KS_TEXT_TITLE', 'SOFORT Banking avec protection de la client�le');
define('MODULE_PAYMENT_SOFORT_SU_TEXT_DESCRIPTION', 'SOFORT Banking est la m�thode de paiement gratuite et certifi�e T�V par SOFORT AG.');


define('MODULE_PAYMENT_SOFORT_SU_TEXT_DESCRIPTION_CHECKOUT_PAYMENT_IMAGE', '     <table border="0" cellspacing="0" cellpadding="0">      <tr>        <td valign="bottom">
	<a onclick="javascript:window.open(\'https://images.sofort.com/en/su/landing.php\',\'customer information\',\'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1020, height=900\');" style="float:left; width:auto;">
		{{image}}
	</a>
	</td>      </tr>      <tr> <td class="main">{{text}}</td>      </tr>      </table>');

define('MODULE_PAYMENT_SOFORT_SU_TEXT_DESCRIPTION_CHECKOUT_PAYMENT_IMAGEALT', 'SOFORT Banking');

define('MODULE_PAYMENT_SOFORT_MULTIPAY_SU_CHECKOUT_TEXT', '<ul><li>Syst�me de paiement avec protection des donn�es certifi�e par le T�V </li><li>Aucune inscription requise</li><li>Exp�dition imm�diate des marchandises en stock</li><li>Veuillez tenir vos donn�es d&apos;acc�s aux services bancaires en ligne � port�e de main.</li></ul>');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_SU_CHECKOUT_TEXT_KS', '<ul><li>Si vous payez avec SOFORT Banking, vous b�n�ficiez d&apos;une protection de l&apos;acheteur ! [[link_beginn]]Plus d&apos;infos[[link_end]]</li><li>Syst�me de paiement avec politique de confidentialit� certifi�e par le T�V</li><li>Pas besoin de s&apos;inscrire</li><li>Les marchandises/service seront exp�di�s imm�diatement, si disponible.</li><li>Veuillez tenir vos donn�es bancaires en ligne � port�e de main.</li></ul>');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_SU_CHECKOUT_INFOLINK_KS', 'https://www.sofort-bank.com/de/kaeuferbereich/kaeuferschutz');
define('MODULE_PAYMENT_SOFORT_SOFORTUEBERWEISUNG_ALLOWED_TITLE', 'Zones autoris�es');
define('MODULE_PAYMENT_SOFORT_SOFORTUEBERWEISUNG_ALLOWED_DESC', 'Veuillez entrer les zones <b>s�par�ment </b> qui devrait �tre autoris� � utiliser ce module (par ex. AT,DE (laisser vide si vous voulez autoriser toutes les zones)).');
define('MODULE_PAYMENT_SOFORT_SU_ZONE_TITLE', MODULE_PAYMENT_SOFORT_MULTIPAY_ZONE_TITLE);
define('MODULE_PAYMENT_SOFORT_SU_ZONE_DESC', MODULE_PAYMENT_SOFORT_MULTIPAY_ZONE_DESC);
define('MODULE_PAYMENT_SOFORT_SU_STATUS_TITLE', 'Activer sofort.de module');
define('MODULE_PAYMENT_SOFORT_SU_STATUS_DESC', 'Active/d�sactive le module complet.');

define('MODULE_PAYMENT_SOFORT_SU_SORT_ORDER_TITLE', 's�quence de tri');
define('MODULE_PAYMENT_SOFORT_SU_SORT_ORDER_DESC', 'Ordre d&apos;affichage. Le plus petit nombre appara�tra en premier.');
define('MODULE_PAYMENT_SOFORT_SU_KS_STATUS_TITLE', 'Protection du client activ�e');
define('MODULE_PAYMENT_SOFORT_SU_KS_STATUS_DESC', 'Activer la protection des clients pourSOFORT Banking');

define('MODULE_PAYMENT_SOFORT_SU_ORDER_STATUS_ID_TITLE', 'Confirmed order status');
define('MODULE_PAYMENT_SOFORT_SU_ORDER_STATUS_ID_DESC', 'Confirmed order status<br />Order status after successfully completing a transaction.');

define('MODULE_PAYMENT_SOFORT_SU_RECOMMENDED_PAYMENT_TITLE', 'recommander le mode de paiement');
define('MODULE_PAYMENT_SOFORT_SU_RECOMMENDED_PAYMENT_DESC', '"Cochez cette m�thode de paiement comme "m�thode de paiement recommand�e". Sur la page de s�lection de paiement, une note sera affich�e juste derri�re le mode de paiement."');
define('MODULE_PAYMENT_SOFORT_SU_RECOMMENDED_PAYMENT_TEXT', '(recommander le mode de paiement)');

define('MODULE_PAYMENT_SOFORT_SU_TEXT_ERROR_MESSAGE', 'Le paiement n&apos;est malheureusement pas possible ou a �t� annul� par le client. Veuillez choisir un autre mode de paiement.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_SU', 'Le paiement n&apos;est malheureusement pas possible ou a �t� annul� par le client. Veuillez choisir un autre mode de paiement.');
define('MODULE_PAYMENT_SOFORT_STATUS_CONFIRM_INVOICE', 'Order with {{paymentMethodStr}} successfully submitted. Transaction-ID: {{tId}} {{time}}');
define('MODULE_PAYMENT_SOFORT_STATUS_SU_LOSS', 'Up till now it has not been possible to confirm the payment. {{time}}');
define('MODULE_PAYMENT_SOFORT_STATUS_DEBIT_RETURNED', 'Il y a une r�trofacturation li�e � cette transaction. {{time}}');
define('MODULE_PAYMENT_SOFORT_STATUS_REFUNDED', 'Le montant de la facture sera rembours�. {{time}}');
define('MODULE_PAYMENT_SOFORT_STATUS_INVOICE_CANCELED', 'La facture a �t� annul�e par le commer�ant. {{time}}');

?>