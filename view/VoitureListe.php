<section data-component="VoitureListe" class="gallery gallery--3">
  
 <!-- juste un prototype -->  

    <?php

    if(isset($_COOKIE['lang'])){
        $lang = $_COOKIE['lang'];
    }else{
        $lang ="fr";

    } 
    

    
    if($data["voiture"]){
        foreach ($data["voiture"] as $voiture) {
            
    ?>
            <article class="voiture_liste__voiture" 
                data-js-voiture
                data-js-voiture-nbr
                data-js-voiture-id="<?= $voiture["idVoiture"] ?>" 
                data-js-voiture-vin="<?= $voiture["vin"] ?>"
                data-js-voiture-prixVente="<?= $voiture["prixVente"] ?>"
                data-js-voiture-km="<?= $voiture["km"] ?>" 
                data-js-voiture-annee="<?= $voiture["annee"] ?>" 
                data-js-voiture-modele="<?= $voiture["idModele"] ?>" 
                data-js-voiture-couleur="<?php if(!$voiture["couleur$lang"]) echo $voiture["couleurfr"]?>" 
                data-js-voiture-prix="<?= $voiture["prixPaye"] ?>" 
                data-js-voiture-groupeMotopropulseur="<?=$voiture["groupeMotopropulseur"]?>" 
                data-js-voiture-modele="<?= $voiture["modele"] ?>"
                data-js-voiture-marque="<?= $voiture["marque"] ?>"
                data-js-voiture-fabricant="<?= $voiture["fabricant"] ?>"
                data-js-voiture-statut="<?php if(!$voiture["statut$lang"]) echo $voiture["statutfr"]?>"
                data-component="Voiture"
            >
    
                <div class="voiture_liste__image-wrapper">
                    <img src="<?= $voiture["cheminFichier"] ?>" alt="" class="voiture_liste__image">
                </div> 
                <div class = "info_voiture">
                    
                    <h2><?= $voiture["marque"]." ".$voiture["modele"]; ?></h2>
                    <h3><?= number_format($voiture["prixVente"], 0, ',', ' '); ?>&nbsp;$</h3>                    
                    <span><?= $voiture["annee"]; ?></span>                                        
                    <span><?= number_format($voiture["km"], 0, ',', ' '); ?> Km</span>
                    <span><?= $voiture["groupeMotopropulseur"] ?></span>
                </div>      
                      
            </article>
    <?php
            
        }
        
    }else{
    ?>  
        <p><?=TXT__VOITURE_LISTE_ERR?></p>
       

    <?php
    }
    ?>

    <!-- Fin prototype -->  

</section>

