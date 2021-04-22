<section data-component="VoitureListe">
 <!-- juste un prototype -->   
    <?php
    if($data){
        foreach ($data as $voiture) {
            
    ?>
            <article class="voiture_liste__voiture" 
                data-js-voiture
                data-js-voiture-id="<?= $voiture["vin"] ?>" 
                data-js-voiture-km="<?= $voiture["km"] ?>" 
                data-js-voiture-annee="<?= $voiture["annee"] ?>" 
                data-js-voiture-modele="<?= $voiture["idModele"] ?>" 
                data-js-voiture-modele="<?= $voiture["couleur"] ?>" 
                data-js-voiture-prix="<?= $voiture["prixPaye"] ?>" 
                data-js-voiture-groupeMotopropulseur="<?= $voiture["groupeMotopropulseur"] ?>" 
                data-js-voiture-modele="<?= $voiture["modele"] ?>"
                data-js-voiture-marque="<?= $voiture["marque"] ?>"
                data-js-voiture-fabricant="<?= $voiture["fabricant"] ?>"
                data-component="Voiture"
            >
    
                <div class="voiture_liste__image-wrapper">
                    <img src="" alt="" class="voiture_liste__image">
                </div>
                
                <h2><?= $voiture["marque"] ?></h2>
                <h2><?= $voiture["modele"] ?></h2>
                <h2><?= $voiture["fabricant"] ?></h2>
                
                <h3><?= $voiture["prixPaye"] ?>&nbsp;$</h3>
                <span><?= $voiture["km"] ?></span>
                <span><?= $voiture["annee"] ?></span>
                <span><?= $voiture["couleur"] ?></span> 
                <span><?= $voiture["groupeMotopropulseur"] ?></span> 
                <span><?= $voiture["chassis"] ?></span> 
            </article>
    <?php
            
        }
        
    }else{
    ?>  
        <p>pas de voitures pour le moment</p>

    <?php
    }
    ?>
    <!-- Fin prototype -->

</section>