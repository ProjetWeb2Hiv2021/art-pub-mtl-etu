<section data-component="TypeCarburant">
    <h2><?=TXT__GESTIONU_GESMODTC?></h2>
    <div data-js-component="Form" class="ligne">

        <section class="infoModele" >

            <div class="ligne distribue"><label for="typeCarburant"><?=TXT__GESTIONU_GESMODTC?> :</label>
                <select data-js-typeCarburant name="typeCarburant" id="typeCarburant">
                    <?php
                        $typeCarburant = $data["typeCarburant"];
                        echo "<option value='0'>Choisir TypeCarburant</option>";
                        //afficher dynamiquement une option pour chaque modele dans la base de données
                        foreach ($typeCarburant as list($idtypeCarburant, $typeCarburant)) {
                            echo "<option value='{$idtypeCarburant}'>";
                            echo "{$typeCarburant}";
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



