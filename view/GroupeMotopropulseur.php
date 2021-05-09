<section data-component="GroupeMotopropulseur">
    <h2>Gérer groupe motopropulseur</h2>   
    <div data-js-component="Form" class="ligne">

        <section class="infoModele" >

            <div class="ligne distribue"><label for="groupeMoto">Groupe motopropulseur :</label>
                <select data-js-groupeMotopropulseur name="groupeMoto" id="groupeMoto">
                    <?php
                        $groupeMotopropulseur = $data["groupeMotopropulseur"];
                        echo "<option value='0'>Choisir Groupe motopropulseur</option>";
                        //afficher dynamiquement une option pour chaque modele dans la base de données
                        foreach ($groupeMotopropulseur as list($idgroupeMotopropulseur, $groupeMotopropulseur)) {
                            echo "<option value='{$idgroupeMotopropulseur}'>";
                            echo "{$groupeMotopropulseur}";
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



