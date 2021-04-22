<section class="FiltrerPlusieursCriteres" data-component="FiltrerPlusieursCriteres">

	<!-- plusieurs criteres -->
	<form>	
		<label>Annee Minimum:</label><br>
		<select name="annee_min" data-component="dateMin">			
			<?php
				for($annee = 1900; $annee <= date('Y'); $annee++){
			?>
				<option value="<?= $annee ?>"><?= $annee ?></option>
			<?php
				}
			?>			
		</select><br>
		<label>Annee Max:</label><br>
		<select name="annee_max" data-component="dateMax">			
			<?php
				for($annee = date('Y'); $annee >= 1990; $annee--){
			?>
				<option value="<?= $annee ?>"><?= $annee ?></option>
			<?php
				}
			?>			
		</select>

		<button class="disabled" data-js-btn>Soumettre</button>
	</form>
</section>