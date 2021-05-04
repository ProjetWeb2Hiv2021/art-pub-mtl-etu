<section class="Profil" data-component="Profil" data-js-component="Form">

	<!-- plusieurs criteres -->
	<?php
		if($data["utilisateur"]){
			foreach ($data["utilisateur"] as $utilisateur) {
	?>
		<form>
			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="username">Pseudonyme :</label>
					<input type="text" id="username" required data-js-param="username" value="<?= $utilisateur["nomUtilisateur"]?>">
				</div>
				
				
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="nom">Nom :</label>
					<input type="text" id="nom" required data-js-param="nomFamille" value="<?= $utilisateur["nomFamille"]?>">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="prenom">Prenom :</label>
					<input type="text" id="prenom" required data-js-param="prenom" value="<?= $utilisateur["prenom"]?>">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="datenaissance">Date de naissance :</label>
					<input type="date" id="datenaissance" required data-js-param="dateNaissance" value="<?= $utilisateur["dateNaissance"]?>">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="courriel">Courriel :</label>
					<input type="email" id="email" name="courriel" data-js-param="courriel" value="<?= $utilisateur["courriel"]?>">
				</div>
				<small class="error-message" data-js-error-msg></small>		

			</div>

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="password">Mot de passe :</label>
					<input type="password" id="password" required data-js-param="motPasse"  minlength="8" value="<?= $utilisateur["motPasse"]?>">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 
			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="telephone">Telephone:</label>
					<input type="tel" id="telephone" name="telephone" data-js-param="telephone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="514-***-****" required value="<?= $utilisateur["telephone"]?>">
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
							<option data-js-typeutilisateur="<?= $typeUtilisateur["idTypeUtilisateur"] ?>"  value="<?= $utilisateur["idTypeUtilisateur"] ?>"
							<?php
							if($typeUtilisateur["idTypeUtilisateur"] == $utilisateur["idTypeUtilisateur"]){
								echo "selected";
							}
							?>	
							><?= $typeUtilisateur["typeUtilisateur"] ?></option>
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

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="telephoneportable">Telephone portable:</label>
					<input type="tel" id="telephoneportable" name="telephonePortable" data-js-param="telephonePortable" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="514-***-****" required value="<?= $utilisateur["telephonePortable"] ?>">
				</div>
				<small class="error-message" data-js-error-msg></small>			
			</div>
			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="nocivique">Numero civique :</label>
					<input type="number" id="nocivique" required data-js-param="noCivique" value="<?= $utilisateur["noCivique"] ?>">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="rue">Rue :</label>
					<input type="text" id="rue" name="rue" data-js-param="rue" required value="<?= $utilisateur["rue"] ?>">
				</div>
				<small class="error-message" data-js-error-msg></small>			
			</div>

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="codepostal">Code Postal :</label>
					<input type="text" id="codepostal" name="codepostal" data-js-param="codePostal" required value="<?= $utilisateur["codePostal"] ?>">
				</div>
				<small class="error-message" data-js-error-msg></small>			
			</div>

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
				<label for="ville">Ville :</label>
				<select name="ville" data-js-ville size=1>
					<option value=""></option>
					<?php
					
					if($data["ville"]){
					foreach ($data["ville"] as $ville) {
					?>
						<option data-js-ville="<?= $ville["idVille"] ?>"  value="<?= $ville["ville"] ?>"
						<?php
						if($ville["idVille"] == $utilisateur["idVille"]){
							echo "selected";
						}
						?>
						><?= $ville["ville"] ?></option>
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
				<select name="province" data-js-province size=1>
					<option value=""></option>
					<?php
					
					if($data["province"]){
					foreach ($data["province"] as $province) {
						
					?>
						<option data-js-province="<?= $province["idProvince"] ?>"  value="<?= $utilisateur["idProvince"] ?>"
						<?php
						if($province["idProvince"] == $utilisateur["idProvince"]){
							echo "selected";
						}
						?>
						><?= $province["province"] ?></option>
					<?php
						}
					}
					?>
				</select>
				</div>
				<small class="error-message" data-js-error-msg></small>			
			</div>

			<button data-js-btn>Soumettre</button>
		</form>
	<?php
		}
	}
	?>
</section>


