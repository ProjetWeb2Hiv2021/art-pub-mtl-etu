<section data-component="Chassis">
    <h2><?=TXT__GESTIONU_GESMODCHAS?></h2>      
    <div data-js-component="Form" class="ligne">

        <section class="infoModele" >

            <div class="ligne distribue"><label for="chassis"><?=TXT__GESTIONU_GESMODCHAS?> :</label>
                <select data-js-chassis name="chassis" id="chassis">
                    <?php
                        $chassis = $data["chassis"];
                        echo "<option value='0'>Choisir Chassis</option>";
                        //afficher dynamiquement une option pour chaque chassis dans la base de données
                        foreach ($chassis as list($idChassis, $chassis)) {
                            echo "<option value='{$idChassis}'>";
                            echo "{$chassis}";
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



