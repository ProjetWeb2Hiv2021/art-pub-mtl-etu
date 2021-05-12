<section class="formulaireCommande" data-component="FormulaireCommande" data-js-component="Form" data-js-nomutilisateur="<?= $data["nomUtilisateur"]?>">

	
	<form data-js-livraisonform>

	<?php
   
	if(isset($_COOKIE['lang'])){
		$lang = $_COOKIE['lang'];
	}else{
		$lang ="fr";
	} 	 
	
	if($data["expedition"]){
		?>
		
		
		<div class="input-wrapper" data-js-input-wrapper data-js-radio="required" data-js-param="info" data-js-input="Expedition">
		<label for="radio-livraison"><?=TXT__FORMCOM_EXP?></label><br>
		<?php
		foreach ($data["expedition"] as $expedition) {
			
		?>
			<input type="radio" id="radio-livraison" name="radio-livraison" value="<?=$expedition["idExpedition"]?>" data-js-param="expedition"><label for="radio-livraison"><?=$expedition["expedition$lang"]?>
			<?php
			if($expedition["idExpedition"] == "1"){
				echo " 75 $/Voiture";
			}
			
			?>
			
		</label>
		<?php
		}
		?>
		<br><small class="error-message" data-js-error-msg></small>
		</div>

		
		
	<?php
	}
	

	
	?>
		<button  data-js-submit>Commander 1/3</button>
	</form>
	<form data-js-paimentform>
		<?php
		if($data["modepaiement"]){
			?>
			<div class="input-wrapper" data-js-input-wrapper data-js-radio="required" data-js-param="info" data-js-input="<?=TXT__FORMCOM_MPAI?>" data-js-paiment>
				<label for="radio-paiement"><?=TXT__FORMCOM_MPAI?></label><br>
			<?php
			
			foreach ($data["modepaiement"] as $modepaiement) {
				
			?>
				<input type="radio" id="radio-paiement" name="radio-paiement" value="<?=$modepaiement["idModePaiement"]?>" data-js-param="cartechoix"
				<?php
				if($modepaiement["idModePaiement"] == "2"){
					echo "data-js-carte";
				}else if($modepaiement["idModePaiement"] == "5"){
					echo "data-js-paypal";
				}
				?>
				><label for="radio-paiement"><?=$modepaiement["modePaiement$lang"]?></label>
			<?php
			}
			?>
			<br><small class="error-message" data-js-error-msg></small>
			
			</div>
	
			<?php
		}
	?>
	<button  data-js-btncommander3>Commander 3/3</button>
	</form>

</section>


