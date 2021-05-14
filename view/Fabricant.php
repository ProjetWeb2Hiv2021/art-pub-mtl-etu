<section data-component="Fabricant">
    <h2><?=TXT__GESTIONU_GESMODFAB?></h2>      
    <div data-js-component="Form" class="ligne">

        <section class="infoModele" >

            <div class="ligne distribue"><label for="fabricant"><?=TXT__GESTIONU_GESMODFAB?> :</label>
                <select data-js-fabricant name="fabricant" id="fabricant">
                    <?php
                        $fabricant = $data["fabricant"];
                        echo "<option value='0'>Choisir Fabricant</option>";
                        //afficher dynamiquement une option pour chaque fabricant dans la base de données
                        foreach ($fabricant as list($idFabricant, $fabricant)) {
                            echo "<option value='{$idFabricant}'>";
                            echo "{$fabricant}";
                            echo "</option>";
                        }
                    ?>    
                </select>
            </div>
            <div>
            </div>
            <div>
            <button data-js-btnAjouter><?=TXT__GESTICRUD_ADD?></button>
            <button data-js-btnMisAJour><?=TXT__GESTICRUD_MAJ?></button>
            <button data-js-btnSupprimer><?=TXT__GESTICRUD_SUPP?></button>
            </div>
        </section>        
    </div>

    <div>
        <a href="index.php">Retour à la liste</a>
    </div>
</section>



