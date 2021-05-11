<section data-component="VoitureDetail">

    <div class="ligne aLaFin">
    <?php  
        if(isset($_COOKIE['lang'])){
            $lang = $_COOKIE['lang'];
        }else{
            $lang ="fr";
    
        } 
        $leSysteme = $data["systeme"];
    ?>    

    <?php 
    
        if(!isset($_SESSION["nomUtilisateur"])) 
        
            echo '<a href="index.php?Utilisateur&action=connexion">'.TXT__DETAIL_AJOUT.'</a>';
        else 
        {
        // Vérifier si la voiture est en stock
            if(isset($data["voiture"])&&$data["voiture"]["idStatut"] == 3){
                echo '<button  data-js-btn >'.TXT__DETAIL_AJOUT.'</button>';

            }
            else {
                echo '<button  data-js-btn disabled>'.TXT__DETAIL_AJOUT.'</button>';                
            }
        }   
    
        ?>	

    </div>
    <div data-js-component="Form" class="ligne">
        
        <section class="imagesVoiture ligne">
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
        
        <section class="infoVoiture" data-js-idvoiture="<?=$data["voiture"]["idVoiture"]?>">
            
            <div class="ligne distribue">
                <label for="vin"><?=TXT__DETAIL_VIN?> :</label>
                <input type="text" id="vin" name="vin" required data-js-param="vin" value='<?php echo $data["voiture"]["vin"];?>' disabled class='sansPointeur'>
            </div>                
            
            <div class="ligne distribue">
                <label for="prixVente"><?=TXT__DETAIL_PRIX?> :</label>
                <input type="text" id="prixVente" name="prixVente" required data-js-param="prixVente" value='<?php echo $data["voiture"]["prixVente"];?>' disabled class='sansPointeur'>
            </div>
                
            <div class="ligne distribue">
                <label for="annee"><?=TXT__DETAIL_ANN?> :</label>
                <input type="text" id="annee" name="annee" required data-js-param="annee" value='<?php echo $data["voiture"]["annee"];?>' disabled class='sansPointeur'>
            </div>
                
            <div class="ligne distribue">
                <label for="km"><?=TXT__DETAIL_KM?> :</label>

                <input type="text" id="km" name="km" required data-js-param="km" value='<?php echo $data["voiture"]["km"];?>' disabled class='sansPointeur'>
            </div>
            <div class="ligne distribue">
                <label for="couleurfr"><?=TXT__DETAIL_COULFR?> :</label>
                <input type="text" id="couleurfr" name="couleurfr" required data-js-param="couleurfr" value="<?php                     
                        if($data["voiture"]["couleur$lang"]){
                            echo $data["voiture"]["couleur$lang"];
                        }else{
                            echo $data["voiture"]["couleurfr"];
                        }   
                        echo "\" disabled class='sansPointeur'";                 
                    ?>">
            </div>
            <div class="ligne distribue"><label for="typeCarburant"><?=TXT__DETAIL_TYPE_CAR?> :</label> 
                <select name="typeCarburant" id="typeCarburant" data-js-typeCarburant disabled class='sansPointeur'>
                    <?php

                        
                        $typeCarburant = $data["typeCarburant"];
                        //afficher dynamiquement une option pour chaque typeCarburant dans la base de données
                        
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
                
            
            <div class="ligne distribue"><label for="modele"><?=TXT__DETAIL_MOD?> :</label> 
                <select name="modele" id="modele" data-js-modele disabled class='sansPointeur'>
                    <?php
                        $modele = $data["modele"];
                        //afficher dynamiquement une option pour chaque modele dans la base de données
            
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
                
            
            <div class="ligne distribue"><label for="chassis"><?=TXT__DETAIL_CHASS?> :</label> 
                <select name="chassis" id="chassis" data-js-chassis disabled class='sansPointeur'>
                    <?php
                        $chassis = $data["chassis"];
                        //afficher dynamiquement une option pour chaque chassis dans la base de données
                        
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
                
            
            <div class="ligne distribue"><label for="transmission"><?=TXT__DETAIL_TRANS?> :</label> 
                <select name="transmission" id="transmission" data-js-transmission disabled class='sansPointeur'>
                    <?php
                        $transmission = $data["transmission"];
                        //afficher dynamiquement une option pour chaque transmission dans la base de données
                        
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
                
            
            <div class="ligne distribue"><label for="groupeMotopropulseur"><?=TXT__DETAIL_GROUP?> :</label> 
                <select name="groupeMotopropulseur" id="groupeMotopropulseur" data-js-gmp disabled class='sansPointeur'>
                    <?php
                        $groupeMotopropulseur = $data["groupeMotopropulseur"];
                        
                        //afficher dynamiquement une option pour chaque groupeMotopropulseur dans la base de données                            
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
            
            <div class="ligne distribue"><label for="statut"><?=TXT__DETAIL_STAT?> :</label> 
                <select name="statut" id="statut" data-js-param="statut" disabled class='sansPointeur'>


            <?php
            
                $statut = $data["statut"];
                
                //afficher dynamiquement une option pour chaque statut dans la base de données
                
                foreach ($statut as list($idStatut, $statutfr, $statuten)) {
                    echo "<option value='{$idStatut}'";
                    if($idStatut==$data["voiture"]["idStatut"]){
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
            

        </section>        
    </div>

    <div>
        <a href="index.php"><?=TXT__DETAIL_RETOUR?></a>
    </div>
</section>


    
