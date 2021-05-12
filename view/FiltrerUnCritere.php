<div class="main-k">
	<div class="filtres">
	<section class="FiltrerUnCritere" data-component="FiltrerUnCritere">
		<!--<h1>Page par defaut</h1>-->

		<!-- un seul critere -->
		<form>
		<label><?= TXT_TRIER_VOITURE ?> :</label>
		<select name="recherche_un_critere" data-component="recherche_un_critere">
				<option value="0"><?= TXT_BY ?></option>
				<option value="annee"><?= TXT_ANNEE ?></option>
				<option value="marque"><?= TXT_MARQUE?></option>
				<option value="modele"><?= TXT_MODELE?></option>
			</select>
			<button class="btn-trier disabled" data-js-btn>Trier</button> 
			<!-- <button class="disabled" data-js-btn><?= TXT_TRIER?></button> -->
		</form>

	</section>