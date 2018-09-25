<?php
/**
 * @version SOFORT Gateway 5.2.0 - $Date: 2012-09-13 16:24:37 +0200 (Thu, 13 Sep 2012) $
 * @author SOFORT AG (integration@sofort.com)
 * @link http://www.sofort.com/
 *
 * Copyright (c) 2012 SOFORT AG
 *
 * $Id: sofort_sofortrechnung.php 3751 2012-10-10 08:36:20Z gtb-modified $
 */


//include language-constants used in all Multipay Projects
require_once 'sofort_general.php';

define('MODULE_PAYMENT_SOFORT_SR_TEXT_DESCRIPTION_CHECKOUT_PAYMENT_IMAGE', '');
define('MODULE_PAYMENT_SOFORT_SR_CHECKOUT_CONDITIONS', '
	<script type="text/javascript">
		function showSrConditions() {
			srOverlay = new sofortOverlay(jQuery(".srOverlay"), "callback/sofort/ressources/scripts/getContent.php", "https://documents.sofort.com/de/sr/privacy_de");
			srOverlay.trigger();
		}
		document.write(\'<a id="srNotice" href="javascript:void(0)" onclick="showSrConditions();">J&apos;ai lu la politique de confidentialit�.</a>\');
	</script>
	
	<div style="display:none; z-index: 1001;filter: alpha(opacity=92);filter: progid :DXImageTransform.Microsoft.Alpha(opacity=92);-moz-opacity: .92;-khtml-opacity: 0.92;opacity: 0.92;background-color: black;position: fixed;top: 0px;left: 0px;width: 100%;height: 100%;text-align: center;vertical-align: middle;" class="srOverlay">
		<div class="loader" style="z-index: 1002;position: relative;background-color: #fff;top: 40px;overflow: scroll;padding: 4px;border-radius: 7px;-moz-border-radius: 7px;-webkit-border-radius: 7px;margin: auto;width: 620px;height: 400px;overflow: scroll; overflow-x: hidden;">
			<div class="closeButton" style="position: fixed; top: 54px; background: url(callback/sofort/ressources/images/close.png) right top no-repeat;cursor:pointer;height: 30px;width: 30px;"></div>
			<div class="content"></div>
		</div>
	</div>
	<noscript>
		<a href="https://documents.sofort.com/de/sr/privacy_de" target="_blank">J&apos;ai lu la politique de confidentialit�.</a>
	</noscript>
');

define('MODULE_PAYMENT_SOFORT_SR_TEXT_DESCRIPTION_CHECKOUT_PAYMENT_IMAGEALT', 'checkout.sr.description');

define('MODULE_PAYMENT_SOFORT_SR_TEXT_TITLE', 'Facture par SOFORT <br /><img src="https://images.sofort.com/en/sr/logo_90x30.png"  alt="Logo Facture par SOFORT"/>');
define('MODULE_PAYMENT_SOFORT_SOFORTRECHNUNG_TEXT_TITLE', 'Achat sur compte');
define('MODULE_PAYMENT_SOFORT_SR_TEXT_ERROR_MESSAGE', 'Le paiement n&apos;est malheureusement pas possible ou a �t� annul� par le client. Veuillez choisir un autre mode de paiement.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_SR', 'Le paiement n&apos;est malheureusement pas possible ou a �t� annul� par le client. Veuillez choisir un autre mode de paiement.');

define('MODULE_PAYMENT_SOFORT_MULTIPAY_SR_CHECKOUT_TEXT', '');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_CONFIRM_SR', 'Accusez r�ception de cette facture :');
define('MODULE_PAYMENT_SOFORT_SR_STATUS_TITLE', 'Activer sofort.de module');
define('MODULE_PAYMENT_SOFORT_SR_STATUS_DESC', 'Active/d�sactive le module complet.');
define('MODULE_PAYMENT_SOFORT_SR_SORT_ORDER_TITLE', 's�quence de tri');
define('MODULE_PAYMENT_SOFORT_SR_SORT_ORDER_DESC', 'Ordre d&apos;affichage. Le plus petit nombre appara�tra en premier.');
define('MODULE_PAYMENT_SOFORT_SR_TEXT_DESCRIPTION', 'Acheter sur compte avec protection du consommateur');
define('MODULE_PAYMENT_SOFORT_SOFORTRECHNUNG_ALLOWED_TITLE', 'Zones autoris�es');
define('MODULE_PAYMENT_SOFORT_SOFORTRECHNUNG_ALLOWED_DESC', 'Veuillez entrer les zones <b>s�par�ment </b> qui devrait �tre autoris� � utiliser ce module (par ex. AT,DE (laisser vide si vous voulez autoriser toutes les zones)).');
define('MODULE_PAYMENT_SOFORT_SR_ZONE_TITLE', MODULE_PAYMENT_SOFORT_MULTIPAY_ZONE_TITLE);
define('MODULE_PAYMENT_SOFORT_SR_ZONE_DESC', MODULE_PAYMENT_SOFORT_MULTIPAY_ZONE_DESC);
define('MODULE_PAYMENT_SOFORT_SR_ORDER_STATUS_ID_TITLE', 'Confirmed order status');
define('MODULE_PAYMENT_SOFORT_SR_ORDER_STATUS_ID_DESC', 'Statut de la commande apr�s la transaction r�ussie et confirm�e et l&apos;approbation de la facture par le d�taillant.');
define('MODULE_PAYMENT_SOFORT_SR_UNCONFIRMED_STATUS_ID_TITLE', '�tat de la commande non confirm�');
define('MODULE_PAYMENT_SOFORT_SR_UNCONFIRMED_STATUS_ID_DESC', 'Statut de la commande apr�s paiement r�ussi. Le commer�ant n&apos;a pas encore publi� le projet de loi.');
define('MODULE_PAYMENT_SOFORT_SR_TMP_STATUS_ID_TITLE', 'Statut de commande temporaire');
define('MODULE_PAYMENT_SOFORT_SR_TMP_STATUS_ID_DESC', '�tat de l&apos;ordre pour les transactions non ex�cut�es. L&apos;ordre a �t� cr�� mais la transaction n&apos;a pas encore �t� confirm�e par SOFORT AG.');
define('MODULE_PAYMENT_SOFORT_SR_CANCEL_STATUS_ID_TITLE', 'Statut de la commande au moment de l&apos;annulation compl�te');
define('MODULE_PAYMENT_SOFORT_SR_CANCEL_STATUS_ID_DESC', 'Statut de la commande annul�e<br />Statut apr�s une annulation compl�te de la facture.');

define('MODULE_PAYMENT_SOFORT_SR_PENDINIG_NOT_CONFIRMED_COMMENT', 'Commande avec paiement par facture soumise avec succ�s. Le commer�ant n&apos;a pas encore accus� r�ception de la commande. Votre ID de transaction:');

define('MODULE_PAYMENT_SOFORT_SR_RECOMMENDED_PAYMENT_TITLE', 'recommander le mode de paiement');
define('MODULE_PAYMENT_SOFORT_SR_RECOMMENDED_PAYMENT_DESC', '"Cochez cette m�thode de paiement comme "m�thode de paiement recommand�e". Sur la page de s�lection de paiement, une note sera affich�e juste derri�re le mode de paiement."');
define('MODULE_PAYMENT_SOFORT_SR_RECOMMENDED_PAYMENT_TEXT', '(recommander le mode de paiement)');

define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_TIME', 'heure');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_DATE', 'date');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_AMOUNT', 'Montant');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_COMMENT', 'Commentaire');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_ORDER_HISTORY', 'Historique des commandes');
define('MODULE_PAYMENT_SOFORT_SR_PRICE_CHANGED_CUSTOMERINFO', 'Due to the rounding of the price, a new, slightly differing invoice amount has shown. Please note this on receipt of the invoice! New invoice Montant :');

/////////////////////////////////////////////////
//////// Seller-Backend and callback.php ////////
/////////////////////////////////////////////////

define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_BACK', 'en arri�re');

define('MODULE_PAYMENT_SOFORT_SR_CONFIRM_INVOICE', 'Confirmer la facture');
define('MODULE_PAYMENT_SOFORT_SR_CANCEL_INVOICE', 'annuler la facture');
define('MODULE_PAYMENT_SOFORT_SR_CANCEL_CONFIRMED_INVOICE', 'cr�dit de facture');
define('MODULE_PAYMENT_SOFORT_SR_CANCEL_INVOICE_QUESTION', '�tes-vous vraiment s�r de vouloir annuler la facture ? Ce processus ne peut pas �tre annul�.');
define('MODULE_PAYMENT_SOFORT_SR_CANCEL_CONFIRMED_INVOICE_QUESTION', 'Are you sure you want to credit the invoice? This action can not be undone.');

define('MODULE_PAYMENT_SOFORT_SR_DOWNLOAD_INVOICE', 't�l�charger la facture');
define('MODULE_PAYMENT_SOFORT_SR_DOWNLOAD_INVOICE_HINT', 'Vous pouvez t�l�charger le document appropri� (aper�u de facture, facture, note de cr�dit) ici.');
define('MODULE_PAYMENT_SOFORT_SR_DOWNLOAD_CREDIT_MEMO', 'download credit note');
define('MODULE_PAYMENT_SOFORT_SR_DOWNLOAD_INVOICE_PREVIEW', 't�l�charger la facture pr�visualisation');

define('MODULE_PAYMENT_SOFORT_SR_EDIT_CART', 'Modifier le panier');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_CART', 'enregistrer le panier');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_CART_QUESTION', 'Voulez-vous vraiment mettre � jour le panier ?');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_CART_ERROR', 'Une erreur s&apos;est produite lors de la mise � jour du panier.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_CART_HINT', 'Sauvegardez vos changements de panier ici. Lors de la mise � jour d&apos;une facture confirm�e, la r�duction de la quantit� ou la suppression d&apos;un article entra�nera un cr�dit.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_DISCOUNTS_HINT', 'Vous pouvez ajuster les remises et les majorations. Les frais suppl�mentaires ne peuvent pas �tre augment�s et les montants de l&apos;escompte doivent �tre sup�rieurs � z�ro. Le montant total de la facture ne peut �tre augment� par l&apos;ajustement.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_DISCOUNTS_GTZERO_HINT', 'Les remises ne peuvent pas avoir un montant sup�rieur � z�ro.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_QUANTITY', 'ajuster la quantit�');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_QUANTITY_HINT', 'Vous pouvez ajuster le nombre d&apos;�l�ments par position. Les montants peuvent �tre diminu�s, mais ne doivent pas �tre augment�s.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_QUANTITY_TOTAL_GTZERO', 'La quantit� du poste ne peut pas �tre diminu�e, car le montant total de la facture ne doit pas �tre n�gatif.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_QUANTITY_ZERO_HINT', 'La quantit� doit �tre sup�rieure � 0. Pour supprimer un article, veuillez marquer l&apos;article � la fin de la ligne.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_PRICE', 'adjust price');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_PRICE_HINT', 'Vous pouvez ajuster le prix de chaque article par position. Les prix peuvent �tre diminu�s, mais ne doivent pas �tre augment�s.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_PRICE_TOTAL_GTZERO', 'Le prix ne peut pas �tre baiss�, car le montant total de la facture ne doit pas �tre n�gatif.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_PRICE_AND_QUANTITY_HINT', 'Price and quantity mustn\'t be adjusted at the same time.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_PRICE_AND_QUANTITY_NAN', 'Vous avez saisi des caract�res non valides. Ces ajustements ne permettent que des chiffres.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_VALUE_LTZERO_HINT', 'La valeur doit �tre sup�rieure � z�ro.');

define('MODULE_PAYMENT_SOFORT_SR_UPDATE_CONFIRMED_INVOICE', 'Veuillez entrer un commentaire');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_CONFIRMED_INVOICE_HINT', 'Lors de l&apos;ajustement d&apos;une facture confirm�e, une raison appropri�e doit �tre fournie. Cette raison appara�tra plus tard sur la note de cr�dit comme un commentaire � l&apos;article.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_SHIPPING_HINT', 'Vous pouvez ajuster le prix d&apos;exp�dition. Vous pouvez seulement r�duire le montant, pas l&apos;augmenter.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_SHIPPING_COSTS_HINT', 'Pour les retours, les frais d&apos;exp�dition ne sont pas autoris�s en tant qu&apos;article autonome sur une facture.');
define('MODULE_PAYMENT_SOFORT_SR_UPDATE_SHIPPING_TOTAL_GTZERO', 'Les frais d&apos;exp�dition ne peuvent pas �tre r�duits, car le montant total de la facture ne doit pas �tre n�gatif.');

define('MODULE_PAYMENT_SOFORT_SR_RECALCULATION', 'sera recalcul�.');

define('MODULE_PAYMENT_SOFORT_SR_REMOVE_FROM_INVOICE_TOTAL_GTZERO','Ce poste ne peut pas �tre supprim�, car le total de la facture ne doit pas �tre n�gatif.');
define('MODULE_PAYMENT_SOFORT_SR_REMOVE_ARTICLE_FROM_INVOICE', 'Supprimer l&apos;�l�ment');
define('MODULE_PAYMENT_SOFORT_SR_REMOVE_FROM_INVOICE', 'supprimer l&apos;article');
define('MODULE_PAYMENT_SOFORT_SR_REMOVE_FROM_INVOICE_QUESTION', 'Voulez-vous vraiment supprimer les articles suivants : %s ?');
define('MODULE_PAYMENT_SOFORT_SR_REMOVE_FROM_INVOICE_HINT', 'S�lectionnez les �l�ments � supprimer. La suppression d&apos;un article d&apos;une facture confirm�e entra�nera une note de cr�dit.');
define('MODULE_PAYMENT_SOFORT_SR_REMOVE_LAST_ARTICLE_HINT', 'En r�duisant le nombre de tous ou en supprimant le dernier �l�ment, la facture sera compl�tement annul�e.');

define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_CANCELED', 'La facture a �t� annul�e.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_CONFIRMED', 'Les marchandises sont pr�par�es pour l&apos;exp�dition.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_PENDINIG_NOT_CONFIRMED', 'Mode de paiement Achat sur le compte choisi. La transaction n&apos;est pas termin�e.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_CANCELED_REFUNDED', 'La facture a �t� annul�e.Remboursement cr��.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_REANIMATED', 'L&apos;annulation de la facture a �t� annul�e.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_CANCEL_30_DAYS', 'La facture a �t� automatiquement annul�e. Le d�lai de confirmation de 30 jours a expir�.');

define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CURRENT_TOTAL', 'facture en cours Montant :');
define('MODULE_PAYMENT_SOFORT_SR_SUCCESS_ADDRESS_UPDATED', 'Mise � jour r�ussie de l&apos;adresse de livraison et de facturation.');
define('MODULE_PAYMENT_SOFORT_SR_STATUSUPDATE_UNNECESSARY', 'la mise � jour du statut n&apos;est pas n�cessaire');
define('MODULE_PAYMENT_SOFORT_SR_UNKNOWN_STATUS', 'Statut de paiement inconnu/facture trouv�e.');

define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_DOWNLOAD_INVOICE', 't�l�charger la facture');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_DOWNLOAD_INVOICE_CREDITMEMO', 't�l�charger la facture');

define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CLOSE_WINDOW', 'fermer fen�tre');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CONFIRMATION_CANCEL', '�tes-vous vraiment s�r de vouloir annuler la facture ? Ce processus ne peut pas �tre annul�.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_YES', 'Oui');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_NO', 'Non');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_REFRESH_WINDOW', 'recharge la fen�tre');

define('MODULE_PAYMENT_SOFORT_SR_GLOBAL_ERROR', 'Erreur ! Veuillez contacter l&apos;administrateur.');

define('MODULE_PAYMENT_SOFORT_SR_INVOICE_CONFIRMED', 'La facture a �t� confirm�e.');
define('MODULE_PAYMENT_SOFORT_SR_INVOICE_CANCELED', 'La facture a �t� annul�e.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_DETAILS', 'D�tails de la facture');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_TRANSACTION_ID', 'transaction ID');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_ORDER_NUMBER', 'num�ro de commande');
define('MODULE_PAYMENT_SOFORT_SR_ADMIN_TITLE', 'Facture par SOFORT');
define('MODULE_PAYMENT_SOFORT_SR_CONFIRM_CANCEL', '�tes-vous vraiment s�r de vouloir annuler la facture ? Ce processus ne peut pas �tre annul�.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_REMINDER', 'Niveau de relance {{d}}');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_DELCREDERE', 'Transfert de collection');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CREDITED_TO_SELLER', 'Payment to the merchant account has been completed.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CREDITED_TO_SELLER_CUSTOMER_PENDING', 'Payment to merchant account is done. Customer payment outstanding.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CANCELED_REFUNDED', 'La facture a �t� annul�e.Remboursement cr��. {{time}}');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_RECEIVED', 'Received.');
define('MODULE_PAYMENT_SOFORT_SR_PENDINIG_NOT_CONFIRMED_COMMENT_ADMIN', 'Ordre d&apos;achat avec achat sur compte transmis avec succ�s. La confirmation du commer�ant n&apos;a pas encore eu lieu.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CART_EDITED', 'Le panier a �t� modifi�.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_CART_RESET', 'Le panier a �t� remis � z�ro.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_CONFIRMED_SELLER', 'Statut de la transaction : La facture a �t� confirm�e.. Waiting for payment. Statut de la facture: Facture en attente.');
define('MODULE_PAYMENT_SOFORT_SR_TRANSLATE_INVOICE_CANCELED_REFUNDED_SELLER', 'Statut de la transaction : The money will be refunded. Statut de la facture: The invoice will be refunded.');
define('MODULE_PAYMENT_SOFORT_SR_PENDING_NOT_CREDITED_YET_RECEIVED_SELLER', 'Statut de la transaction : La facture a �t� confirm�e.. Waiting for payment. Statut de la facture: le client a pay� le re�u.');
define('MODULE_PAYMENT_SOFORT_SR_RECEIVED_CREDITED_RECEIVED_SELLER', 'Statut de la transaction : La facture a �t� pay�e. Statut de la facture: le client a pay� le re�u.');
define('MODULE_PAYMENT_SOFORT_SR_PENDING_NOT_CREDITED_YET_REMINDER_SELLER', 'Statut de la transaction : La facture a �t� confirm�e.. Waiting for payment. Statut de la facture: Niveau de relance {{d}}');
define('MODULE_PAYMENT_SOFORT_SR_RECEIVED_CREDITED_REMINDER_SELLER', 'Statut de la transaction : La facture a �t� pay�e. Statut de la facture: Niveau de relance {{d}}');
define('MODULE_PAYMENT_SOFORT_SR_PENDING_NOT_CREDITED_YET_DELCREDERE_SELLER', 'Statut de la transaction : La facture a �t� confirm�e.. Waiting for payment. Statut de la facture: Transfert de collection');
define('MODULE_PAYMENT_SOFORT_SR_RECEIVED_CREDITED_DELCREDERE_SELLER', 'Statut de la transaction : La facture a �t� pay�e. Statut de la facture: Transfert de collection');
define('MODULE_PAYMENT_SOFORT_SR_RECEIVED_CREDITED_PENDING_SELLER', 'Statut de la transaction : La facture a �t� pay�e. Statut de la facture: Paiement client en attente.');

define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9000', 'Aucune transaction de facture n&apos;a �t� trouv�e.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9001', 'La facture n&apos;a pas pu �tre confirm�e.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9002', 'Le montant de la facture fournie d�passe la limite de cr�dit.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9003', 'La facture n&apos;a pas pu �tre annul�e.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9004', 'La demande contenait des positions de chariot non valides.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9005', 'Le panier ne pouvait pas �tre modifi�.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9006', 'L&apos;acc�s � l&apos;interface n&apos;est plus possible 30 jours apr�s r�ception du paiement.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9007', 'La facture a d�j� �t� annul�e.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9008', 'Le montant de la taxe pr�vue est trop �lev�.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9009', 'Les montants donn�s aux taux de TVA des articles se rapportent les uns aux autres en conflit.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9010', 'Il n&apos;est pas possible de modifier le panier.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9011', 'Aucun commentaire n&apos;a �t� fourni sur la mise � jour du panier.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9012', 'Vous ne pouvez pas ajouter des positions au panier. De m�me, le montant par poste de facture ne peut pas �tre augment�.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9013', 'Il n&apos;y a que des articles non affacturables dans votre panier.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9014', 'Le num�ro de facture fourni est d�j� utilis�.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9015', 'Le num�ro de cr�dit fourni est d�j� utilis�.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9016', 'Le num�ro de commande fourni est d�j� utilis�.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9017', 'La facture a d�j� �t� confirm�e.');
define('MODULE_PAYMENT_SOFORT_MULTIPAY_XML_FAULT_9018', 'Il n&apos;y avait pas de donn�es mises � jour de la facture.');