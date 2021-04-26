<section data-component="VoitureDetail">
    <div class="row aLaFin">
        
        <a href="index.php?Utilisateur&action=connexion">Réserver</a>
        <a href="index.php?Utilisateur&action=connexion">Acheter</a>
    
    </div>
    <div data-js-component="Form" class="row">
        <section class="imagesVoiture row">
            <?php
            $listeImage = $data["listeImage"];
            //afficher les images
            //var_dump($listeImage);
            foreach ($listeImage as list($idImage, $cheminFichier, $idVoiture, $ordre)) {
                echo "<div>";
                echo "<p>Image : {$ordre}</p>";
                    echo "<img src='{$cheminFichier}' alt='Image-{$ordre}'>";
                echo "</div>";
            }
            ?>
        </section>
        <section class="infoVoiture" >
            <div class="row distribue">
                <label for="nom">Modele :</label>
                <input type="text" id="modele" name="modele" required data-js-param="modele" value="<?php echo $data["voiture"]["modele"]."\" ";
                if($data["systeme"]==="SWT"){
                    echo "disabled";
                };
                ?>>
            </div>
            <div class="row distribue">
                <label for="vin">VIN :</label>
                <input type="text" id="vin" name="vin" required data-js-param="vin" value="<?php echo $data["voiture"]["vin"]."\" ";
                if($data["systeme"]==="SWT"){
                    echo "disabled";
                }; ?>>
            </div>
            <div class="row distribue">
                <label for="prixVente">Prix :</label>
                <input type="text" id="prixVente" name="prixVente" required data-js-param="prixVente" value="<?php echo $data["voiture"]["prixVente"]."\" ";
                if($data["systeme"]==="SWT"){
                    echo "disabled";
                }; ?>>
            </div>
            <div class="row distribue">
                <label for="annee">Année :</label>
                <input type="text" id="annee" name="annee" required data-js-param="annee" value="<?php echo $data["voiture"]["annee"]."\" ";
                if($data["systeme"]==="SWT"){
                    echo "disabled";
                }; ?>>
            </div>
            <?php if($data["systeme"]==="CRM") {
                echo '<div class="row distribue">
                        <label for="dateArrivee">Date arrivée :</label>
                        <input type="text" id="dateArrivee" name="dateArrivee" required data-js-param="dateArrivee" value="<?php echo $data["voiture"]["dateArrivee"]; ?>">
                        </div>
                        <div class="row distribue">
                        <label for="prixPaye">Prix payé :</label>
                        <input type="text" id="prixPaye" name="prixPaye" required data-js-param="prixPaye" value="<?php echo $data["voiture"]["prixPaye"]; ?>">
                        </div>';
            }
            
            ?>
            <div class="row distribue">
                <label for="km">Km :</label>
                <input type="text" id="km" name="km" required data-js-param="km" value="<?php echo $data["voiture"]["km"]."\" ";
                if($data["systeme"]==="SWT"){
                    echo "disabled";
                }; ?>>
            </div>
            <div class="row distribue">
                <label for="couleur">Couleur :</label>
                <input type="text" id="couleur" name="couleur" required data-js-param="couleur" value="<?php echo $data["voiture"]["couleur"]."\" ";
                if($data["systeme"]==="SWT"){
                    echo "disabled";
                }; ?>>
            </div>
            <div class="row distribue"><label for="typeCarburant">Type Carburant :</label> 
                <select name="typeCarburant" id="typeCarburant" 
                    <?php 
                    if($data["systeme"]==="SWT"){
                        echo "disabled";
                    };
                    ?>
                    >
                    <?php
                        
                        $typeCarburant = $data["typeCarburant"];
                        //afficher dynamiquement une option pour chaque typeCarburant dans la base de données
                        foreach ($typeCarburant as list($idTypeCarburant, $typeCarburant)) {
                            echo "<option value='{$idTypeCarburant}'";
                            if($idTypeCarburant==$data["voiture"]["idTypeCarburant"]){
                                echo " selected";
                            }
                            echo ">";
                            echo "{$typeCarburant}";
                            echo "</option>";
                        }
                    ?>    
                </select>
            </div>
            <div class="row distribue"><label for="modele">Modele :</label> 
                <select name="modele" id="modele"
                    <?php 
                    if($data["systeme"]==="SWT"){
                        echo "disabled";
                    };
                    ?>
                    >
                    <?php
                        $modele = $data["modele"];
                        //afficher dynamiquement une option pour chaque modele dans la base de données
                        foreach ($modele as list($idModele, $modele, $marque)) {
                            echo "<option value='{$idModele}'";
                            if($idModele==$data["voiture"]["idModele"]){
                                echo " selected";
                            }
                            echo ">";
                            echo "{$marque} {$modele}";
                            echo "</option>";
                        }
                    ?>    
                </select>
            </div>
            <div class="row distribue"><label for="chassis">Chassis :</label> 
                <select name="chassis" id="chassis"
                    <?php 
                    if($data["systeme"]==="SWT"){
                        echo "disabled";
                    };
                    ?>
                    >
                    <?php
                        $chassis = $data["chassis"];
                        //afficher dynamiquement une option pour chaque chassis dans la base de données
                        foreach ($chassis as list($idChassis, $chassis)) {
                            echo "<option value='{$idChassis}'";
                            if($idChassis==$data["voiture"]["idChassis"]){
                                echo " selected";
                            }
                            echo ">";
                            echo "{$chassis}";
                            echo "</option>";
                        }
                    ?>    
                </select>
            </div>
            <div class="row distribue"><label for="transmission">Transmission :</label> 
                <select name="transmission" id="transmission"
                    <?php 
                    if($data["systeme"]==="SWT"){
                        echo "disabled";
                    };
                    ?>
                    >
                    <?php
                        $transmission = $data["transmission"];
                        //afficher dynamiquement une option pour chaque transmission dans la base de données
                        foreach ($transmission as list($idTransmission, $transmission)) {
                            echo "<option value='{$idChassis}'";
                            if($idTransmission==$data["voiture"]["idTransmission"]){
                                echo " selected";
                            }
                            echo ">";
                            echo "{$transmission}";
                            echo "</option>";
                        }
                    ?>    
                </select>
            </div>
            <div class="row distribue"><label for="groupeMotopropulseur">Groupe Motopropulseur :</label> 
                <select name="groupeMotopropulseur" id="groupeMotopropulseur"
                    <?php 
                    if($data["systeme"]==="SWT"){
                        echo "disabled";
                    };
                    ?>
                    >
                    <?php
                        $groupeMotopropulseur = $data["groupeMotopropulseur"];
                        
                        //afficher dynamiquement une option pour chaque groupeMotopropulseur dans la base de données
                        foreach ($groupeMotopropulseur as list($idGroupeMotopropulseur, $groupeMotopropulseur)) {
                            echo "<option value='{$idGroupeMotopropulseur}'";
                            if($idGroupeMotopropulseur==$data["voiture"]["idGroupeMotopropulseur"]){
                                echo " selected";
                            }
                            echo ">";
                            echo "{$groupeMotopropulseur}";
                            echo "</option>";
                        }
                    ?>    
                </select>
            </div>
            <div class="row distribue"><label for="statut">Statut :</label> 
                <select name="statut" id="statut"
                    <?php 
                    if($data["systeme"]==="SWT"){
                        echo "disabled";
                    };
                    ?>
                    >
                    <?php
                        $statut = $data["statut"];
                        
                        //afficher dynamiquement une option pour chaque statut dans la base de données
                        foreach ($statut as list($idStatut, $statut)) {
                            echo "<option value='{$idStatut}'";
                            if($idStatut==$data["voiture"]["idStatut"]){
                                echo " selected";
                            }
                            echo ">";
                            echo "{$statut}";
                            echo "</option>";
                        }
                    ?>    
                </select>
            </div>
        </section>        
    </div>

    <div>
        <a href="index.php">Retour à la liste</a>
    </div>
</section>


    
