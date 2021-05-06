<?php
        if($data["nombrevoitures"]){
        $nombrevoitures = $data["nombrevoitures"];
    ?>
        <div class="voir-plus" data-component="VoirPlus"  data-js-voiture-nombre = <?= $nombrevoitures["nombrevoitures"]?>>
            <button class="proceed" data-js-voir-plus><?= TXT_VOIRE_PLUS ?></button>
        </div>
        <div class="retour hidden" data-js-retour-acceuil>
            <button class="retour" ><?= TXT_RETOUR ?></button>
        </div>
        <?php
            
        }
        ?>
