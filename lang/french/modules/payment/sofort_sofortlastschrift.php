<?php
/**
 * @version SOFORT Gateway 5.2.0 - $Date: 2012-09-06 14:27:56 +0200 (Thu, 06 Sep 2012) $
 * @author SOFORT AG (integration@sofort.com)
 * @link http://www.sofort.com/
 *
 * Copyright (c) 2012 SOFORT AG
 *
 * $Id: sofort_sofortlastschrift.php 3751 2012-10-10 08:36:20Z gtb-modified $
 */

//include language-constants used in all Multipay Projects
require_once 'sofort_general.php';

define('MODULE_PAYMENT_SOFORT_SL_TEXT_TITLE', 'SOFORT Lastschrift <br /><img src="https://images.sofort.com/en/sl/logo_90x30.png" alt="logo SOFORT Lastschrift"/>');
define('MODULE_PAYMENT_SOFORT_SOFORTLASTSCHRIFT_TEXT_TITLE', 'SOFORT Lastschrift (d�bit direct + pr�-v�rification bancaire en ligne)');
define('MODULE_PAYMENT_SOFORT_SL_TEXT_ERROR_MESSAGE', 'Le paiement n&apos;est malheureusement pas possible ou a �t� annul� par le client. Veuillez choisir un autre mode de paiement.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_SL', 'Le paiement n&apos;est malheureusement pas possible ou a �t� annul� par le client. Veuillez choisir un autre mode de paiement.');
define('MODULE_PAYMENT_SOFORT_SL_CHECKOUT_TEXT', '<ul><li>Syst�me de paiement avec politique de confidentialit� certifi�e par le T�V</li><li>Aucune inscription requise</li><li>Les produits / services peuvent �tre livr�s IMM�DIATEMENT.</li><li>Veuillez avoir votre NIP pour les services bancaires en ligne � port�e de main.</li></ul>');
define('MODULE_PAYMENT_SOFORT_SL_STATUS_TITLE', 'Activer sofort.de module');
define('MODULE_PAYMENT_SOFORT_SL_STATUS_DESC', 'Active/d�sactive le module complet.');
define('MODULE_PAYMENT_SOFORT_SL_SORT_ORDER_TITLE', 's�quence de tri');
define('MODULE_PAYMENT_SOFORT_SL_SORT_ORDER_DESC', 'Ordre d&apos;affichage. Le plus petit nombre appara�tra en premier.');
define('MODULE_PAYMENT_SOFORT_SL_TEXT_DESCRIPTION', 'SOFORT Lastschrift est un syst�me de paiement avanc� bas� sur l&apos;une des m�thodes de paiement allemandes les plus populaires, d�bit direct.');
define('MODULE_PAYMENT_SOFORT_SL_TEXT_ERROR_HEADING', 'Error while processing the order.');

define('MODULE_PAYMENT_SOFORT_SL_TEXT_DESCRIPTION_CHECKOUT_PAYMENT_IMAGE', '<table border="0" cellspacing="0" cellpadding="0"><tr><td valign="bottom">
<a onclick="javascript:window.open(\'https://images.sofort.com/en/sl/landing.php\',\'customer information\',\'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1020, height=900\');" style="float:left; width:auto;">
{{image}}
</a></td><td rowspan="2" width="30px">&nbsp;</td><td rowspan="2">
</td>      </tr>      <tr> <td class="main">{{text}}</td>      </tr>      </table>');
define('MODULE_PAYMENT_SOFORT_SL_TEXT_DESCRIPTION_CHECKOUT_PAYMENT_IMAGEALT', 'SOFORT Lastschrift');
define('MODULE_PAYMENT_SOFORT_SOFORTLASTSCHRIFT_ALLOWED_TITLE', 'Zones autoris�es');
define('MODULE_PAYMENT_SOFORT_SOFORTLASTSCHRIFT_ALLOWED_DESC', 'Veuillez entrer les zones <b>s�par�ment </b> qui devrait �tre autoris� � utiliser ce module (par ex. AT,DE (laisser vide si vous voulez autoriser toutes les zones)).');
define('MODULE_PAYMENT_SOFORT_SL_ZONE_TITLE', MODULE_PAYMENT_SOFORT_MULTIPAY_ZONE_TITLE);
define('MODULE_PAYMENT_SOFORT_SL_ZONE_DESC', MODULE_PAYMENT_SOFORT_MULTIPAY_ZONE_DESC);

define('MODULE_PAYMENT_SOFORT_SL_ORDER_STATUS_ID_TITLE', 'Statut d&apos;une commande confirm�e.');
define('MODULE_PAYMENT_SOFORT_SL_ORDER_STATUS_ID_DESC', 'Statut d&apos;une commande confirm�e.<br />Statut de la commande apr�s avoir compl�t� avec succ�s une transaction.');

define('MODULE_PAYMENT_SOFORT_SL_RECOMMENDED_PAYMENT_TITLE', 'recommander le mode de paiement');
define('MODULE_PAYMENT_SOFORT_SL_RECOMMENDED_PAYMENT_DESC', '"Cochez cette m�thode de paiement comme "m�thode de paiement recommand�e". Sur la page de s�lection de paiement, une note sera affich�e juste derri�re le mode de paiement."');
define('MODULE_PAYMENT_SOFORT_SL_RECOMMENDED_PAYMENT_TEXT', '(recommander le mode de paiement)');

?>