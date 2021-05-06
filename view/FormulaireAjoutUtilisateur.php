<section class="FormulaireAjoutUtilisateur" data-component="FormulaireAjoutUtilisateur" data-js-component="Form">

	<!-- plusieurs criteres -->
	<form>
		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="username">Pseudonyme :</label>
				<input type="text" id="username" required data-js-param="username">
			</div>
			
			
			<small class="error-message" data-js-error-msg></small>
		</div> 

		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="nom">Nom :</label>
				<input type="text" id="nom" required data-js-param="nomFamille">
			</div>
			<small class="error-message" data-js-error-msg></small>
		</div> 

		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="prenom">Prenom :</label>
				<input type="text" id="prenom" required data-js-param="prenom">
			</div>
			<small class="error-message" data-js-error-msg></small>
		</div> 

		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="datenaissance">Date de naissance :</label>
				<input type="date" id="datenaissance" required data-js-param="dateNaissance">
			</div>
			<small class="error-message" data-js-error-msg></small>
		</div> 

		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="courriel">Courriel :</label>
				<input type="email" id="email" name="courriel" value="test@test.ca" data-js-param="courriel" required>
			</div>
			<small class="error-message" data-js-error-msg></small>		

		</div>

		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="password">Mot de passe :</label>
				<input type="password" id="password" required data-js-param="motPasse"  minlength="8">
			</div>
			<small class="error-message" data-js-error-msg></small>
		</div> 
		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="telephone">Telephone:</label>
				<input type="tel" id="telephone" name="telephone" value="" data-js-param="telephone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="514-***-****" required>
			</div>
			<small class="error-message" data-js-error-msg></small>			
		</div>   


		<?php
		if(isset($_SESSION["typeUtilisateur"]) && $_SESSION["typeUtilisateur"]=="Administrateur"){
		?>
		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="typeutilisateur">Type utilisateur :</label>

				<select name="typeutilisateur" data-js-typeutilisateur size=1>
					<option value=""></option>
					<?php
					
					if($data["typeUtilisateur"]){
					foreach ($data["typeUtilisateur"] as $typeUtilisateur) {
					?>
						<option data-js-typeutilisateur="<?= $typeUtilisateur["idTypeUtilisateur"] ?>"  value="<?= $typeUtilisateur["idTypeUtilisateur"] ?>"><?= $typeUtilisateur["typeUtilisateur"] ?></option>
					<?php
						}
					}
					?>
				</select>
			</div>			
			<small class="error-message" data-js-error-msg></small>			
		</div>

		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="telephoneportable">Telephone portable:</label>
				<input type="tel" id="telephoneportable" name="telephonePortable" value="" data-js-param="telephonePortable" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="514-***-****" required>
			</div>
			<small class="error-message" data-js-error-msg></small>			
		</div>
		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="nocivique">Numero civique :</label>
				<input type="number" id="nocivique" required data-js-param="noCivique">
			</div>
			<small class="error-message" data-js-error-msg></small>
		</div> 

		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="rue">Rue :</label>
				<input type="text" id="rue" name="rue" value="" data-js-param="rue" required>
			</div>
			<small class="error-message" data-js-error-msg></small>			
		</div>

		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
				<label for="codepostal">Code Postal :</label>
				<input type="text" id="codepostal" name="codepostal" value="" data-js-param="codePostal" required>
			</div>
			<small class="error-message" data-js-error-msg></small>			
		</div>

		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
			<label for="ville">Ville :</label>
			<select name="ville" data-js-ville size=1 required>
				<option value=""></option>
				<?php
				
				if($data["ville"]){
				foreach ($data["ville"] as $ville) {
				?>
					<option data-js-ville="<?= $ville["idVille"] ?>"  value="<?= $ville["idVille"] ?>"><?= $ville["ville"] ?></option>
				<?php
					}
				}
				?>
			</select>
			</div>
			<small class="error-message" data-js-error-msg></small>			
		</div>

		<div class="input-wrapper" data-js-input-wrapper>
			<div class="ligne distribue">
			<label for="province">Province :</label>
			<select name="province" data-js-province size=1 required>
				<option value=""></option>
				<?php
				
				if($data["province"]){
				foreach ($data["province"] as $province) {
					
				?>
					<option data-js-province="<?= $province["idProvince"] ?>"  value="<?= $province["idProvince"] ?>"><?= $province["province"] ?></option>
				<?php
					}
				}
				?>
			</select>
			</div>
			<small class="error-message" data-js-error-msg></small>			
		</div>

		<?php
		}
		?>
		<button data-js-btn>Soumettre</button>
	</form>
</section>


