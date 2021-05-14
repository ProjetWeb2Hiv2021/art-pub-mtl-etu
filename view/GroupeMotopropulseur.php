<section data-component="GroupeMotopropulseur">
    <h2><?=TXT__GESTIONU_GESMODGMP?></h2>   
    <div data-js-component="Form" class="ligne">

        <section class="infoModele" >

            <div class="ligne distribue"><label for="groupeMoto"><?=TXT__GESTIONU_GESMODGMP?> :</label>
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



