<section data-component="VoitureDetail">
    <div class="ligne aLaFin">
        


        <?php if(!isset($_SESSION["nomUtilisateur"])) echo '<a href="index.php?Utilisateur&action=connexion">Ajouter panier</a>';
           else 
           {
            // Vérifier si la voiture est en stock
            if($data["voiture"]["idStatut"] == 3){
                echo '<button  data-js-btn >'.TXT__DETAIL_AJOUT.'</button>';
            }
            else
                 echo '<button  data-js-btn disabled>'.TXT__DETAIL_AJOUT.'</button>';

           }
            ?>	

    </div>
    <div data-js-component="Form" class="ligne">
        <section class="imagesVoiture ligne">
            <?php
            $listeImage = $data["listeImage"];

            foreach ($listeImage as list($idImage, $cheminFichier, $idVoiture, $ordre)) {
                echo "<div>";
                echo "<p>Image : {$ordre}</p>";
                    echo "<img src='{$cheminFichier}' alt='Image-{$ordre}'>";
                echo "</div>";
            }
            ?>
        </section>
        <section class="infoVoiture" >
            <div class="ligne distribue">
                <label for="nom"><?=TXT__DETAIL_MOD?></label>

                <input type="text" id="modele" name="modele" required data-js-param="modele" value='<?php echo $data["voiture"]["modele"];?>'

                <?php
                if($data["systeme"]==="SWT"){
                    echo "disabled";
                };
                ?>>
            </div>
            <div class="ligne distribue">
                <label for="vin"><?=TXT__DETAIL_VIN?></label>

                <input type="text" id="vin" name="vin" required data-js-param="vin" value='<?php echo $data["voiture"]["vin"];?>'

                <?php
                if($data["systeme"]==="SWT"){
                    echo "disabled";
                }; ?>>
            </div>
            <div class="ligne distribue">
                <label for="prixVente"><?=TXT__DETAIL_PRIX?></label>

                <input type="text" id="prixVente" name="prixVente" required data-js-param="prixVente" value='<?php echo $data["voiture"]["prixVente"];?>'

                <?php
                if($data["systeme"]==="SWT"){
                    echo "disabled";
                }; ?>>
            </div>
            <div class="ligne distribue">
                <label for="annee"><?=TXT__DETAIL_ANN?></label>
                <input type="text" id="annee" name="annee" required data-js-param="annee" value='<?php echo $data["voiture"]["annee"];?>'

                <?php
                if($data["systeme"]==="SWT"){
                    echo "disabled";
                }; ?>>
            </div>
            <?php if($data["systeme"]==="CRM") {
                echo '<div class="ligne distribue">
                        <label for="dateArrivee">Date arrivée :</label>
                        <input type="text" id="dateArrivee" name="dateArrivee" required data-js-param="dateArrivee" value="<?php echo $data["voiture"]["dateArrivee"]; ?>">
                        </div>
                        <div class="ligne distribue">
                        <label for="prixPaye">Prix payé :</label>
                        <input type="text" id="prixPaye" name="prixPaye" required data-js-param="prixPaye" value="<?php echo $data["voiture"]["prixPaye"]; ?>">
                        </div>';
            }
            
            ?>
            <div class="ligne distribue">
                <label for="km"><?=TXT__DETAIL_KM?></label>

                <input type="text" id="km" name="km" required data-js-param="km" value='<?php echo $data["voiture"]["km"];?>'

                <?php
                if($data["systeme"]==="SWT"){
                    echo "disabled";
                }; ?>>
            </div>
            <div class="ligne distribue">
                <label for="couleur"><?=TXT__DETAIL_COUL?></label>

                <input type="text" id="couleur" name="couleur" required data-js-param="couleur" value="<?php echo $data["voiture"]["couleur"]?>";

                <?php
                if($data["systeme"]==="SWT"){
                    echo "disabled";
                }; ?>>
            </div>
            <div class="ligne distribue"><label for="typeCarburant"><?=TXT__DETAIL_TYPE_CAR?></label> 
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
            <div class="ligne distribue"><label for="modele"><?=TXT__DETAIL_MOD?></label> 
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
            <div class="ligne distribue"><label for="chassis"><?=TXT__DETAIL_CHASS?></label> 
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
            <div class="ligne distribue"><label for="transmission"><?=TXT__DETAIL_TRANS?></label> 
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
            <div class="ligne distribue"><label for="groupeMotopropulseur"><?=TXT__DETAIL_GROUP?></label> 
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

            <div class="ligne distribue"><label for="statut"><?=TXT__DETAIL_STAT?> :</label> 
                <select name="statut" id="statut" data-js-param="statut"
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
        <a href="index.php"><?=TXT__DETAIL_RETOUR?></a>
    </div>
</section>


    
