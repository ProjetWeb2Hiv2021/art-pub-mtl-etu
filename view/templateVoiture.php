<div class="ligne aLaFin">
        <?php  
            if($_COOKIE['lang']){
                $lang = $_COOKIE['lang'];
            }else{
                $lang ="fr";

            }     
        ?>    
        <button  data-js-btn><?=TXT__DETAIL_ENREG?></button>
    </div>
    
    <div class="ligne">
        <section class="imagesVoiture ligne">
            <form action="index.php?Voiture&action=ajouterImage&id=19" method="post" enctype="multipart/form-data" data-component-form-image>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="colonne centreV">
                        <div class="ligne distribue">
                        <label for="fichierATeleverser">Image à téléverser :</label>
                        <input type="file" id="fichierATeleverser" name="fichierATeleverser" data-js-param="fichierATeleverser">
                        <small class="error-message" data-js-error-msg></small>
                        
                        </div>
                        <button data-js-btn-aj-img><?=TXT__AJIMG_AJOUT_IMG?></button>
                        </div>
                    </div>
            </form>
            <?php
                if(isset($data["listeImage"])){    
                    $listeImage = $data["listeImage"];

                    foreach ($listeImage as list($idImage, $cheminFichier, $idVoiture, $ordre)) {
                        echo "<div>";
                        echo "<p>Image : {$ordre}</p>";
                            echo "<img src='{$cheminFichier}' alt='Image-{$ordre}'>";
                        echo "</div>";
                    }
                }
            
            ?>
        </section>
        <div data-js-component="Form" class="ligne">    
            <section>
                <?php
                    if(isset($_REQUEST["id"])){
                    ?>
                    <div class="input-wrapper" data-js-input-wrapper>
                        <div class="ligne distribue">
                            <label for="id">Id :</label>
                            <input type="text" id="id" name="id" required data-js-param="id" value='<?php if(isset($_REQUEST["id"])) echo ($_REQUEST["id"]);?>' disabled>
                        </div>
                        <small class="error-message" data-js-error-msg></small>
                    </div>         
                    <?php
                    }
                ?>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <label for="vin"><?=TXT__DETAIL_VIN?> :</label>
                        <input type="text" id="vin" name="vin" required data-js-param="vin" value='<?php if(isset($data["voiture"])) echo $data["voiture"]["vin"];?>'>
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div> 
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <label for="prixVente"><?=TXT__DETAIL_PRIX?> :</label>

                        <input type="text" id="prixVente" name="prixVente" required data-js-param="prixVente" value='<?php if(isset($data["voiture"])) echo $data["voiture"]["prixVente"];?>'>
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div> 
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">

                        <label for="annee"><?=TXT__DETAIL_ANN?> :</label>
                        <input type="text" id="annee" name="annee" required data-js-param="annee" value='<?php if(isset($data["voiture"])) echo $data["voiture"]["annee"];?>'>
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div> 
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <label for="dateArrivee">Date arrivée :</label>
                        <input type="text" id="dateArrivee" name="dateArrivee" required data-js-param="dateArrivee" value="<?php if(isset($data["voiture"])) echo $data["voiture"]["dateArrivee"];?>">
                    </div>
                    <div class="ligne distribue">
                        <label for="prixPaye">Prix payé :</label>
                        <input type="text" id="prixPaye" name="prixPaye" required data-js-param="prixPaye" value="<?php if(isset($data["voiture"])) echo $data["voiture"]["prixPaye"];?>">
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div> 
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <label for="km"><?=TXT__DETAIL_KM?> :</label>

                        <input type="text" id="km" name="km" required data-js-param="km" value='<?php if(isset($data["voiture"])) echo $data["voiture"]["km"];?>'>
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <label for="couleurfr"><?=TXT__DETAIL_COULFR?> :</label>
                        <input type="text" id="couleurfr" name="couleurfr" required data-js-param="couleurfr" value="<?php if(isset($data["voiture"])) echo $data["voiture"]["couleurfr"];?>">
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div>
                
                
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <label for="couleuren"><?=TXT__DETAIL_COULEN?> :</label>
                        <input type="text" id="couleuren" name="couleuren" required data-js-param="couleuren" value="<?php if(isset($data["voiture"])) echo $data["voiture"]["couleuren"];?>">
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue">
                        <label for="vedette"><?=TXT__DETAIL_VEDETTE?> :</label>
                        <input type="checkbox" id="vedette" name="vedette" data-js-param="vedette" value="<?php if(isset($data["voiture"])) echo $data["voiture"]["vedette"];?>">
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div>
                
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue"><label for="typeCarburant"><?=TXT__DETAIL_TYPE_CAR?> :</label> 
                        <select name="typeCarburant" id="typeCarburant" data-js-typeCarburant>
                            <?php
                                $typeCarburant = $data["typeCarburant"];
                                //afficher dynamiquement une option pour chaque typeCarburant dans la base de données
                                echo "<option value>".TXT__DETAIL_TYPE_CAR."</option>";
                                foreach ($typeCarburant as list($idTypeCarburant, $typeCarburantfr, $typeCarburanten)) {                                
                                    echo "<option value='{$idTypeCarburant}'";
                                    if(isset($data["voiture"])&&$idTypeCarburant==$data["voiture"]["idTypeCarburant"]){
                                        echo " selected";
                                    }
                                    echo ">";
                                    if($lang == "en" && $typeCarburanten){
                                        echo "{$typeCarburanten}";
                                    }else{
                                        echo "{$typeCarburantfr}";
                                    }
                                    echo "</option>";
                                }  
                            ?>    
                        </select>
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue"><label for="modele"><?=TXT__DETAIL_MOD?> :</label> 
                        <select name="modele" id="modele" data-js-modele>
                            <?php
                                $modele = $data["modele"];
                                //afficher dynamiquement une option pour chaque modele dans la base de données                            
                                echo "<option value>".TXT__DETAIL_MOD."</option>";                            
                                foreach ($modele as list($idModele, $modele, $marque)) {
                                    echo "<option value='{$idModele}'";
                                    if(isset($data["voiture"])&&$idModele==$data["voiture"]["idModele"]){
                                        echo " selected";
                                    }
                                    echo ">";
                                    echo "{$marque} {$modele}";
                                    echo "</option>";
                                }
                            ?>    
                        </select>
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue"><label for="chassis"><?=TXT__DETAIL_CHASS?> :</label> 
                        <select name="chassis" id="chassis" data-js-chassis>
                            <?php
                                $chassis = $data["chassis"];
                                //afficher dynamiquement une option pour chaque chassis dans la base de données                            
                                echo "<option value>".TXT__DETAIL_CHASS."</option>";                            
                                foreach ($chassis as list($idChassis, $chassisfr, $chassisen)) {
                                    echo "<option value='{$idChassis}'";
                                    if(isset($data["voiture"])&&$idChassis==$data["voiture"]["idChassis"]){
                                        echo " selected";
                                    }
                                    echo ">";
                                    if($lang == "en" && $chassisen){
                                        echo "{$chassisen}";
                                    }else{
                                        echo "{$chassisfr}";
                                    }
                                    
                                    echo "</option>";
                                }
                            ?>    
                        </select>
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue"><label for="transmission"><?=TXT__DETAIL_TRANS?> :</label> 
                        <select name="transmission" id="transmission" data-js-transmission>
                            <?php
                                $transmission = $data["transmission"];
                                //afficher dynamiquement une option pour chaque transmission dans la base de données                            
                                echo "<option value>".TXT__DETAIL_TRANS."</option>";                            
                                foreach ($transmission as list($idTransmission, $transmissionfr, $transmissionen)) {
                                    echo "<option value='{$idTransmission}'";
                                    if(isset($data["voiture"])&&$idTransmission==$data["voiture"]["idTransmission"]){
                                        echo " selected";
                                    }
                                    echo ">";
                                    if($lang == "en" && $transmissionen){
                                        echo "{$transmissionen}";
                                    }else{
                                        echo "{$transmissionfr}";
                                    }
                                    echo "</option>";
                                }
                            ?>    
                        </select>
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue"><label for="groupeMotopropulseur"><?=TXT__DETAIL_GROUP?> :</label> 
                        <select name="groupeMotopropulseur" id="groupeMotopropulseur" data-js-gmp>
                            <?php
                                $groupeMotopropulseur = $data["groupeMotopropulseur"];                            
                                //afficher dynamiquement une option pour chaque groupeMotopropulseur dans la base de données                            
                                echo "<option value>".TXT__DETAIL_GROUP."</option>";                            
                                foreach ($groupeMotopropulseur as list($idGroupeMotopropulseur, $groupeMotopropulseur)) {
                                    echo "<option value='{$idGroupeMotopropulseur}'";
                                    if(isset($data["voiture"])&&$idGroupeMotopropulseur==$data["voiture"]["idGroupeMotopropulseur"]){
                                        echo " selected";
                                    }
                                    echo ">";
                                    echo "{$groupeMotopropulseur}";
                                    echo "</option>";
                                }
                            ?>    
                        </select>
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div>
                <div class="input-wrapper" data-js-input-wrapper>
                    <div class="ligne distribue"><label for="statut"><?=TXT__DETAIL_STAT?> :</label> 
                        <select name="statut" id="statut" data-js-statut>
                            <?php
                        
                            $statut = $data["statut"];
                            
                            //afficher dynamiquement une option pour chaque statut dans la base de données
                            echo "<option value>".TXT__DETAIL_STAT."</option>";
                            foreach ($statut as list($idStatut, $statutfr, $statuten)) {
                                echo "<option value='{$idStatut}'";
                                if(isset($data["voiture"])&&$idStatut==$data["voiture"]["idStatut"]){
                                    echo " selected";
                                }
                                echo ">";
                                
                                if($lang == "en" && $statuten){
                                    echo "{$statuten}";
                                }else{
                                    echo "{$statutfr}";
                                }
                                echo "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <small class="error-message" data-js-error-msg></small>
                </div>

            </section>        
        </div>
    </div>                    
    <div>
        <a href="index.php?Utilisateur&action=connexion"><?=TXT__DETAIL_SYSTEME?></a>
    </div>
    <div data-js-resultat>
    </div>