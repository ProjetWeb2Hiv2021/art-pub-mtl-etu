<section class="" data-component="FormulaireCommande" data-js-component="Form">

	<!-- plusieurs criteres -->
	<form style="background-color: rgba(0, 0, 0, 0.5);">
	<div class="input-wrapper" data-js-input-wrapper data-js-radio="required" data-js-param="info" data-js-input="Expedition">
		<label for="radio-livraison">Expedition</label><br>
		<input type="radio" id="radio-livraison" name="radio-livraison" value="1" data-js-param="optin"><label for="radio-livraison">Livraison locale</label>
		<input type="radio" id="radio-livraison" name="radio-livraison" value="0" data-js-param="optin"><label for="radio-livraison">Ramassage</label><br><small class="error-message" data-js-error-msg></small>
	</div>
	<div class="input-wrapper" data-js-input-wrapper data-js-radio="required" data-js-param="info" data-js-input="Methode de maiement" data-js-paiment>
		<label for="radio-paiement">Methode de maiement</label><br>
		<input type="radio" id="radio-paiement" name="radio-paiement" value="1" data-js-param="optin"><label for="radio-paiement">Especes</label>
		<input type="radio" id="radio-paiement" name="radio-paiement" value="2" data-js-param="optin"><label for="radio-paiement">Carte de debit</label>
		<input type="radio" id="radio-paiement" name="radio-paiement" value="3" data-js-param="optin" data-js-carte><label for="radio-paiement">Carte de credit</label>
		<input type="radio" id="radio-paiement" name="radio-paiement" value="4" data-js-param="optin"><label for="radio-paiement">Virement bancaire</label>
		<input type="radio" id="radio-livraison" name="radio-paiement" value="5" data-js-param="optin" data-js-paypal><label for="radio-paiement">PayPal</label><br><small class="error-message" data-js-error-msg></small>
	</div>
	
	<button  data-js-submit>Commander</button>
	</form>
</section>


