<?php
        if($data["nombrevoitures"]){
        $nombrevoitures = $data["nombrevoitures"];
    ?>
        <div class="voir-plus" data-component="VoirPlus"  data-js-voiture-nombre = <?= $nombrevoitures["nombrevoitures"]?>>
            <button class="proceed" data-js-voir-plus>Voir plus</button>
        </div>
        <div class="retour hidden" data-js-retour-acceuil>
            <button class="retour" >Retour</button>
        </div>
        <?php
            
        }
        ?>
