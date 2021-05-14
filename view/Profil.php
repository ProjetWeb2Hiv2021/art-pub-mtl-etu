<section class="Profil" data-component="Profil" data-js-component="Form">
	
	<!-- plusieurs criteres -->
	<?php
	 $lang =$_COOKIE['lang']; 
		if($data["utilisateur"]){
			foreach ($data["utilisateur"] as $utilisateur) {
	?>
		<form data-js-id="<?= $utilisateur["idUtilisateur"]?>">
			
			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="username"><?=TXT__FAU_PSEUDO?></label>
					<input type="text" id="username" required data-js-param="username" value="<?= $utilisateur["nomUtilisateur"]?>">
				</div>
				
				
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="nom"><?=TXT__FAU_NOM?></label>
					<input type="text" id="nom" required data-js-param="nomFamille" value="<?= $utilisateur["nomFamille"]?>">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="prenom"><?=TXT__FAU_PRENOM?></label>
					<input type="text" id="prenom" required data-js-param="prenom" value="<?= $utilisateur["prenom"]?>">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="datenaissance"><?=TXT__FAU_DATEN?></label>
					<input type="date" id="datenaissance" required data-js-param="dateNaissance" value="<?= $utilisateur["dateNaissance"]?>">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="courriel"><?=TXT__FAU_COURRIEL?></label>
					<input type="email" id="email" name="courriel" data-js-param="courriel" value="<?= $utilisateur["courriel"]?>">
				</div>
				<small class="error-message" data-js-error-msg></small>		

			</div>

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="password"><?=TXT__FAU_MP?></label>
					<input type="password" id="password" required data-js-param="motPasse"  minlength="8" value="*******">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 
			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="telephone"><?=TXT__FAU_TEL?></label>
					<input type="tel" id="telephone" name="telephone" data-js-param="telephone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="514-***-****" required value="<?= $utilisateur["telephone"]?>">
				</div>
				<small class="error-message" data-js-error-msg></small>			
			</div>   


			<?php

			if(isset($_SESSION["typeUtilisateur"]) && $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"){
			?>
			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="typeutilisateur"><?=TXT__FAU_TY_UTI?></label>

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
							><?php if($lang == "en" && $typeUtilisateur["typeUtilisateuren"]){
								echo $typeUtilisateur["typeUtilisateuren"];
							}else{
								echo $typeUtilisateur["typeUtilisateurfr"];
							} ?></option>
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
					<label for="telephoneportable"><?=TXT__FAU_TEL_POR?></label>
					<input type="tel" id="telephoneportable" name="telephonePortable" data-js-param="telephonePortable" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="514-***-****" required value="<?= $utilisateur["telephonePortable"] ?>">
				</div>
				<small class="error-message" data-js-error-msg></small>			
			</div>
			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="nocivique"><?=TXT__FAU_NC?></label>
					<input type="number" id="nocivique" required data-js-param="noCivique" value="<?= $utilisateur["noCivique"] ?>">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="rue"><?=TXT__FAU_RUE?></label>
					<input type="text" id="rue" name="rue" data-js-param="rue" required value="<?= $utilisateur["rue"] ?>">
				</div>
				<small class="error-message" data-js-error-msg></small>			
			</div>

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="codepostal"><?=TXT__FAU_CP?></label>
					<input type="text" id="codepostal" name="codepostal" data-js-param="codePostal" required value="<?= $utilisateur["codePostal"] ?>">
				</div>
				<small class="error-message" data-js-error-msg></small>			
			</div>

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
				<label for="ville"><?=TXT__FAU_VILLE?></label>
				<select name="ville" data-js-ville size=1 required>
					<option value=""></option>
					<?php
					
					if($data["ville"]){
					foreach ($data["ville"] as $ville) {
					?>
						<option data-js-ville="<?= $ville["idVille"] ?>"  value="<?= $ville["idVille"] ?>"
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
				<label for="province"><?=TXT__FAU_PROVINCE?></label>
				<select name="province" data-js-province size=1 required>
					<option value=""></option>
					<?php
					
					if($data["province"]){
					foreach ($data["province"] as $province) {
						
					?>
						<option data-js-province="<?= $province["idProvince"] ?>"  value="<?= $province["idProvince"] ?>"
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
			<div class="box-btnProfil">
			<button class="btnmodifprofil" data-js-btn 
						<?php
				if(isset($data["commande"])){
					echo "data-js-commande=1";
				}
			?>

			><?=TXT__PROFIL_MODIFIER?></button>

			<button class="btnsupprofil" data-js-btn-supp><?=TXT__PROFIL_SUPP?></button>
			</div>

		</form>
	<?php
		}
	}
	?>
	
</section>


