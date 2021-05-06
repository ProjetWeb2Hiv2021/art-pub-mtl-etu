<section class="FiltrerPlusieursCriteres" data-component="FiltrerPlusieursCriteres">

	<!-- plusieurs criteres -->
	<form class="ligne">	
		<h3><?= TXT_FILTRER_VOITURES?> :</h3>

		<div class="input-wrapper" data-js-input-wrapper>
			<label><?= TXT_MARQUE?>  :</label><br>
			<select name="marque" data-js-marque size=1>
			<option value=""></option>
		<?php
		
		if($data["marque"]){
        foreach ($data["marque"] as $marque) {
		?>
			<option data-js-idMarque="<?= $marque["idMarque"] ?>" value="<?= $marque["marque"] ?>"><?= $marque["marque"] ?></option>
		<?php
			}
		}
		?>
			</select>
			<small class="error-message" data-js-error-msg></small>
		</div>

		<div class="input-wrapper" data-js-input-wrapper>
			<label><?= TXT_MODELE?>  :</label><br>
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
			<small class="error-message" data-js-error-msg></small>
		</div>
		
		<div class="input-wrapper" data-js-input-wrapper>
			<label><?= TXT_ANNEE?>  :</label><br>
			<input name="annee_min" data-js-annee data-component="anneeMin" placeholder="1900" maxlength="4" min="1900" max=<?=date('Y')?>>
			<input name="annee_max" data-js-annee data-component="anneeMax" placeholder="<?=date('Y')?>" maxlength="4" min="1900" max=<?=date('Y')?>><br>
			<small class="error-message" data-js-error-msg></small>
		</div>
		<div class="input-wrapper" data-js-input-wrapper>
			<label><?= TXT_PRIX?> :</label><br>
			<input type="number" data-js-prix data-component="prixMin" name="prix_min" placeholder="De" maxlength="5" mainlength="0">
			<input type="number" data-js-prix data-component="prixMax" name="prix_max" placeholder="À" maxlength="6" mainlength="0"><br>
			<small class="error-message" data-js-error-msg></small>
		</div>
		<button class="disabled" data-js-btn><?= TXT_FILTRER?></button><button class="disabled" data-js-rafraichir><?= TXT_RAFRAICHIR?></button>
	</form>
</section>
	</div>


