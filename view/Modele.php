<section data-component="Modele">
    
    <div data-js-component="Form" class="ligne">

        <section class="infoModele" >
            
            <div class="ligne distribue"><label for="fabricant">Fabricant :</label> 
                <select data-js-modele-fabricant name="fabricant" id="fabricant" >
                    <?php
                        
                        $fabricant = $data["fabricant"];
                        var_dump(data["leFabricant"]);

                        //afficher dynamiquement une option pour chaque fabricant dans la base de données
                        echo "<option value='0'>Choisir Fabricant</option>";
                        foreach ($fabricant as list($idFabricant, $fabricant)) {                            
                            echo "<option value='{$idFabricant}'>";
                            echo "{$fabricant}";
                            echo "</option>";
                        }
                    ?>    
                </select>
            </div>
            <div class="ligne distribue"><label for="marque">Marque :</label> 
                <select data-js-modele-marque name="marque" id="marque">
                    <?php
                        $marque = $data["marque"];
                        //var_dump($marque);
                        echo "<option value='0'>Choisir Marque</option>";
                        //afficher dynamiquement une option pour chaque marque dans la base de données
                        foreach ($marque as list($idMarque,$idFabricant, $marque)) {
                            echo "<option value='{$idMarque}'>";
                            
                            echo "{$marque}";
                            echo "</option>";
                        }
                    ?>    
                </select>
            </div>
            <div class="ligne distribue"><label for="modele">Modele :</label> 
                <select data-js-modele name="modele" id="modele">
                    <?php
                        $modele = $data["modele"];
                        echo "<option value='0'>Choisir Modele</option>";
                        //afficher dynamiquement une option pour chaque modele dans la base de données
                        foreach ($modele as list($idModele, $idMarque, $modele)) {
                            echo "<option value='{$idModele}'>";
                            echo "{$modele}";
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


    
