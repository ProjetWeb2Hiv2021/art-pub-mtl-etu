
<?php
    if(isset($_GET['lang']) && $_GET['lang'] == "en"){
        $lang = "fr";
    }else{
        $lang ="en";
    } 
?>

<div class="table-wrapper" data-component="GestionUtilisateurs" data-js-component="Form">
<h2><?=TXT__UTILISATEUR_ACC?></h2>
    <button><a href="index.php?Utilisateur&action=creerClient"><?=TXT__CRM_CREE_COMPTE?></a></button>

    <div class="input-wrapper" data-js-input-wrapper>
                <select name="utilisateurs" data-js-utilisateurs size=1>
                    
            <?php 
                if($data["utilisateurs"]){
                    foreach ($data["utilisateurs"] as $utilisateur) {
                    ?>
                
                    <option data-js-param="username" value="<?= $utilisateur["nomUtilisateur"]?>"  data-js-idutilisateur="<?= $utilisateur["idUtilisateur"]?>" data-js-idprovince="<?= $utilisateur["idProvince"]?>"
                    data-js-idville="<?= $utilisateur["idVille"]?>" data-js-idtypeutilisateur="<?= $utilisateur["idTypeUtilisateur"]?>"
                    data-js-username="<?= $utilisateur["nomUtilisateur"]?>" 
                    data-js-motpasse="<?= $utilisateur["motPasse"]?>" 
                    data-js-prenom="<?= $utilisateur["prenom"]?>"  
                    data-js-nomfamille="<?= $utilisateur["nomFamille"]?>"  
                    data-js-courriel="<?= $utilisateur["courriel"]?>"  
                    data-js-datenaissance="<?= $utilisateur["dateNaissance"]?>" 
                    data-js-telephone="<?= $utilisateur["telephone"]?>" 
                    data-js-nocivique="<?= $utilisateur["noCivique"]?>" 
                    data-js-rue="<?= $utilisateur["ruedateNaissance"]?>" 
                    data-js-codepostal="<?= $utilisateur["codePostal"]?>" 
                    data-js-telephoneportable>="<?= $utilisateur["telephonePortable"]?>"><?= $utilisateur["nomUtilisateur"] ?></option>
                    <?php
                    }
                }
                ?>
                    </select>
                    <small class="error-message" data-js-error-msg></small>
    </div>
    

    <form data-js-id="<?= $utilisateur["idUtilisateur"]?>" data-js-utilisateur>
			
			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="username"><?=TXT__FAU_PSEUDO?></label>
					<input type="text" id="username" required data-js-param="username" value="">
				</div>
				
				
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="nom"><?=TXT__FAU_NOM?></label>
					<input type="text" id="nom" required data-js-param="nomFamille" value="">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="prenom"><?=TXT__FAU_PRENOM?></label>
					<input type="text" id="prenom" required data-js-param="prenom" value="">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="datenaissance"><?=TXT__FAU_DATEN?></label>
					<input type="date" id="datenaissance" required data-js-param="dateNaissance" value="">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="courriel"><?=TXT__FAU_COURRIEL?></label>
					<input type="email" id="email" name="courriel" data-js-param="courriel" value="">
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
					<input type="tel" id="telephone" name="telephone" data-js-param="telephone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="514-***-****" required value="">
				</div>
				<small class="error-message" data-js-error-msg></small>			
			</div>   


			<?php

			
			?>
			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="typeutilisateur"><?=TXT__FAU_TY_UTI?></label>

					<select name="typeutilisateur" data-js-typeutilisateur size=1>
						<option value=""></option>
						<?php
						
						
						foreach ($data["typeUtilisateur"] as $typeUtilisateur) {
						?>
							<option data-js-typeutilisateur="<?= $typeUtilisateur["idTypeUtilisateur"] ?>"  value="<?= $typeUtilisateur["idTypeUtilisateur"] ?>"
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
						
						?>
					</select>
				</div>			
				<small class="error-message" data-js-error-msg></small>			
			</div>
			
			<?php
			
			?>

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="telephoneportable"><?=TXT__FAU_TEL_POR?></label>
					<input type="tel" id="telephoneportable" name="telephonePortable" data-js-param="telephonePortable" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="514-***-****" required value="">
				</div>
				<small class="error-message" data-js-error-msg></small>			
			</div>
			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="nocivique"><?=TXT__FAU_NC?></label>
					<input type="number" id="nocivique" required data-js-param="noCivique" value="">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="rue"><?=TXT__FAU_RUE?></label>
					<input type="text" id="rue" name="rue" data-js-param="rue" required value="">
				</div>
				<small class="error-message" data-js-error-msg></small>			
			</div>

			<div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<label for="codepostal"><?=TXT__FAU_CP?></label>
					<input type="text" id="codepostal" name="codepostal" data-js-param="codePostal" required value="">
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
			<button class="btnmodifprofil" data-js-btn><?=TXT__PROFIL_MODIFIER?></button>

			<button class="btnsupprofil" data-js-btn-supp><?=TXT__PROFIL_SUPP?></button>
			</div>

		</form>
</div>

