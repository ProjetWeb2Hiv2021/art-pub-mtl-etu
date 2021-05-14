<section data-component="FormulaireConfPaye" data-js-component="Form" data-js-confPayment>
<?php
/* david */
if(isset($data)){
	echo " <p>Votre numero de facture est : ".$data."</p>";
}
?>
<!-- Include the PayPal JavaScript SDK -->
<div  class="payementDesc"  data-js-payement>   
	<div>
			<h1>Confirmation du paiement de voiture</h1>
			<p> Le paiement a été fait avec succès!
				<h4 data-js-quantite> </h4>
					<!-- Set up a container element for the button -->
			</p>
			<p> Nous allons communiquer avec vous par courriel ou téléphone pour la livraison du voiture
				<strong>(Plus d'information: carareus@yahoo.com)
							
				</strong>
			</p>
</div>

<button  data-js-submit>Ok</button>
</section>
