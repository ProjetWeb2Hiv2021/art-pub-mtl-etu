<main>
	<h2>Confirmation de la commande</h2>

	<div data-component="ConfirmationList" 
	<?php
		if(isset($_SESSION["nomUtilisateur"])){
			echo "data-js-nomUtilisateur=".$_SESSION["nomUtilisateur"];
		}
		?>
	>

		<div data-js-results></div>
		<div></div>
		<div class="total" data-js-total></div>
		<div></div>
		<button data-js-btn data-component="Acheter"  
		<?php
		if(isset($_SESSION["nomUtilisateur"])){
			echo "data-js-nomUtilisateur=".$_SESSION["nomUtilisateur"];
		}
		?>
		 >Acheter</button>
		<button data-js-btnReserver>Réserver</button>
	</div>
</main>
