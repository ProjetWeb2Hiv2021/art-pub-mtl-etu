
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
    <table class="">
        <thead>
        <tr>
            <th><?=TXT__FAU_PSEUDO?></th>
            <th><?=TXT__FAU_NOM?></th>
            <th><?=TXT__FAU_PRENOM?></th>
            <th><?=TXT__FAU_DATEN?></th>
            <th><?=TXT__FAU_COURRIEL?></th>
            <th><?=TXT__FAU_MP?></th>
            <th><?=TXT__FAU_TEL?></th>
            <th><?=TXT__FAU_TY_UTI?></th>
            <th><?=TXT__FAU_TEL_POR?></th>
            <th><?=TXT__FAU_NC?></th>
            <th><?=TXT__FAU_RUE?></th>
            <th><?=TXT__FAU_CP?></th>
            <th><?=TXT__FAU_VILLE?></th>
            <th><?=TXT__FAU_PROVINCE?></th>
            <th><?=TXT__GESTIONU_GER?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($data["utilisateurs"]){
        foreach ($data["utilisateurs"] as $utilisateur) {
        ?>
            <tr data-js-id="<?=$utilisateur["idUtilisateur"]?>" data-js-utilisateur>
            <td>
            <div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<input type="text" required data-js-param="username" value="<?= $utilisateur["nomUtilisateur"]?>">
				</div>
				
				
				<small class="error-message" data-js-error-msg></small>
			</div> 
            </td>            
            <td>
            <div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<input type="text"  required data-js-param="nomFamille" value="<?= $utilisateur["nomFamille"]?>">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div> 
            </td>
            <td>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <input type="text"  required data-js-param="prenom" value="<?= $utilisateur["prenom"]?>">
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div>
            </td>
            <td>
            <div class="input-wrapper" data-js-input-wrapper>
				<div class="ligne distribue">
					<input type="date" required data-js-param="dateNaissance" value="<?= $utilisateur["dateNaissance"]?>">
				</div>
				<small class="error-message" data-js-error-msg></small>
			</div>
            </td>
            <td>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <input type="email"  name="courriel" data-js-param="courriel" value="<?= $utilisateur["courriel"]?>">
                    </div>
                    <small class="error-message" data-js-error-msg></small>		

                </div>
            </td>
            <td>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <input type="password"  required data-js-param="motPasse"  minlength="8" value="*******">
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div> 
            </td>
            <td>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <input type="tel"  name="telephone" data-js-param="telephone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="514-***-****" required value="<?= $utilisateur["telephone"]?>">
                    </div>
                    <small class="error-message" data-js-error-msg></small>			
                </div> 
            </td><br>
            <td>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">

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
            </td>
            <td>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <input type="tel"  name="telephonePortable" data-js-param="telephonePortable" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="514-***-****" required value="<?= $utilisateur["telephonePortable"] ?>">
                    </div>
                    <small class="error-message" data-js-error-msg></small>			
                </div>
            </td>
            <td>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <input type="number"  required data-js-param="noCivique" value="<?= $utilisateur["noCivique"] ?>">
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div> 
            </td>
            <td>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <input type="text"  name="rue" data-js-param="rue" required value="<?= $utilisateur["rue"] ?>">
                    </div>
                    <small class="error-message" data-js-error-msg></small>			
                </div>
            </td>
            <td>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <input type="text"  name="codepostal" data-js-param="codePostal" required value="<?= $utilisateur["codePostal"] ?>">
                    </div>
                    <small class="error-message" data-js-error-msg></small>			
                </div>
            </td>
            <td>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
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
            </td>
            <td>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
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
            </td> 
            <td>
                <button data-js-mod><?=TXT__PROFIL_MODIFIER?></button>
                <button data-js-sup><?=TXT__PROFIL_SUPP?></button>
            </td>         
        </tr>
        <?php
        }
        }
        ?>
        
        <tbody>
    </table>
</div>
