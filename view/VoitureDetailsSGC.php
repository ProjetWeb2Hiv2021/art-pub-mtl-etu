<section data-component="VoitureDetailSGC">

    <div class="ligne aLaFin">
        <?php  
            if($_COOKIE['lang']){
                $lang = $_COOKIE['lang'];
            }else{
                $lang ="fr";

            }     
        ?>    
        <button  data-js-btn disabled><?=TXT__DETAIL_ENREG?></button>
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
        
        <section>
            <div class="input-wrapper" data-js-input-wrapper>
                <div class="ligne distribue">
                    <label for="vin"><?=TXT__DETAIL_VIN?> :</label>
                    <input type="text" id="vin" name="vin" required data-js-param="vin" value=''>
                </div>
                <small class="error-message" data-js-error-msg></small>
		    </div> 
            <div class="input-wrapper" data-js-input-wrapper>
                <div class="ligne distribue">
                    <label for="prixVente"><?=TXT__DETAIL_PRIX?> :</label>

                    <input type="text" id="prixVente" name="prixVente" required data-js-param="prixVente" value=''>
                </div>
                <small class="error-message" data-js-error-msg></small>
		    </div> 
            <div class="input-wrapper" data-js-input-wrapper>
                <div class="ligne distribue">

                    <label for="annee"><?=TXT__DETAIL_ANN?> :</label>
                    <input type="text" id="annee" name="annee" required data-js-param="annee" value=''>
                </div>
                <small class="error-message" data-js-error-msg></small>
		    </div> 
            <div class="input-wrapper" data-js-input-wrapper>
                <div class="ligne distribue">
                    <label for="dateArrivee">Date arrivée :</label>
                    <input type="text" id="dateArrivee" name="dateArrivee" required data-js-param="dateArrivee" value="<?= date("Y-m-d")?>">
                </div>
                <div class="ligne distribue">
                    <label for="prixPaye">Prix payé :</label>
                    <input type="text" id="prixPaye" name="prixPaye" required data-js-param="prixPaye" value="">
                </div>
                <small class="error-message" data-js-error-msg></small>
            </div> 
            <div class="input-wrapper" data-js-input-wrapper>
                <div class="ligne distribue">
                    <label for="km"><?=TXT__DETAIL_KM?> :</label>

                    <input type="text" id="km" name="km" required data-js-param="km" value=''>
                </div>
                <small class="error-message" data-js-error-msg></small>
		    </div>
            <div class="input-wrapper" data-js-input-wrapper>
                <div class="ligne distribue">
                    <label for="couleurfr"><?=TXT__DETAIL_COULFR?> :</label>
                    <input type="text" id="couleurfr" name="couleurfr" required data-js-param="couleurfr" value="">
                </div>
                <small class="error-message" data-js-error-msg></small>
		    </div>
            
            
            <div class="input-wrapper" data-js-input-wrapper>
                <div class="ligne distribue">
                    <label for="couleuren"><?=TXT__DETAIL_COULEN?></label>
                    <input type="text" id="couleuren" name="couleuren" required data-js-param="couleuren" value="">
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
                                echo "<option value='{$idTypeCarburant}'>";
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
                                echo "<option value='{$idModele}'>";
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
                                echo "<option value='{$idChassis}'>";
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
                                echo "<option value='{$idChassis}'>";
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
                                echo "<option value='{$idGroupeMotopropulseur}'>";
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
                    <select name="statut" id="statut" data-js-param="statut">
                        <?php
                    
                        $statut = $data["statut"];
                        
                        //afficher dynamiquement une option pour chaque statut dans la base de données
                        echo "<option value>".TXT__DETAIL_STAT."</option>";
                        foreach ($statut as list($idStatut, $statutfr, $statuten)) {
                            echo "<option value='{$idStatut}'>";
                            
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

    <div>
        <a href="index.php?Utilisateur&action=connexion"><?=TXT__DETAIL_SYSTEME?></a>
    </div>
</section>


    
