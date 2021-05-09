<section data-component="TypeCarburant">
    <h2>Gérer type de carburant</h2>
    <div data-js-component="Form" class="ligne">

        <section class="infoModele" >

            <div class="ligne distribue"><label for="typeCarburant">TypeCarburant :</label>
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
                <button data-js-btnAjouter>Ajouter</button>
                <button data-js-btnMisAJour>Mettre à jour</button>
                <button data-js-btnSupprimer>Supprimer</button>
            </div>
        </section>        
    </div>

    <div>
        <a href="index.php">Retour à la liste</a>
    </div>
</section>



