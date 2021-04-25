<section class="FiltrerPlusieursCriteres" data-component="FiltrerPlusieursCriteres">

	<!-- plusieurs criteres -->
	<form>	
		<div>
			<label>Modele :</label><br>
			<select name="modele" data-js-modele size=1>
			<option value=""></option>
		<?php
		
		if($data["modele"]){
        foreach ($data["modele"] as $modele) {
		?>
			<option data-js-idModele="<?= $modele["idModele"] ?>"  value="<?= $modele["modele"] ?>"><?= $modele["modele"] ?></option>
		<?php
			}
		}
		?>
			</select>
		</div>
		<div>
			<label>Fabricant :</label><br>
			<select name="fabricant" data-js-fabricant size=1>
			<option value=""></option>
		<?php
		
		if($data["fabricant"]){
        foreach ($data["fabricant"] as $modele) {
		?>
			<option data-js-idFabricant="<?= $modele["idFabricant"] ?>" value="<?= $modele["fabricant"] ?>"><?= $modele["fabricant"] ?></option>
		<?php
			}
		}
		?>
			</select>
		</div>
		<div>
			<label>Annee :</label><br>
			<input name="annee_min" data-component="anneeMin" placeholder="1900" maxlength="4" min="1900" max=<?=date('Y')?>>
			<input name="annee_max" data-component="anneeMax" placeholder="<?=date('Y')?>" maxlength="4" min="1900" max=<?=date('Y')?>><br>
		</div>
		<div>
			<label>Prix :</label><br>
			<input type="number" data-component="prixMin" name="prix_min" placeholder="De" maxlength="5" mainlength="0">
			<input type="number" data-component="prixMax" name="prix_max" placeholder="À" maxlength="6" mainlength="0">
		</div>
		<button class="disabled" data-js-btn>Recherche</button>
	</form>
</section>


