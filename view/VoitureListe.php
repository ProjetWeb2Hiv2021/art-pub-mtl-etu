<section data-component="VoitureListe">
 <!-- juste un prototype -->   
    <?php
    if($data){
        foreach ($data as $voiture) {
            
    ?>
            <article class="voiture_liste__voiture" 
                data-js-voiture
                data-js-voiture-id="<?= $voiture["id"] ?>" 
                data-js-voiture-kilometrage="<?= $voiture["kilometrage"] ?>" 
                data-js-voiture-annee="<?= $voiture["annee"] ?>" 
                data-js-voiture-modele="<?= $voiture["modele"] ?>" 
                data-js-voiture-fabricant="<?= $voiture["fabricant"] ?>" 
                data-js-voiture-marque="<?= $voiture["marque"] ?>"
                data-js-voiture-lienimage="<?= $voiture["lienimage"] ?>"
                data-js-voiture-prix="<?= $voiture["prix"] ?>"  
                data-component="Voiture"
            >
    
                <div class="voiture_liste__image-wrapper">
                    <img src="<?= $voiture["lienimage"]  ?>" alt="<?= $voiture["modele"] ?>" class="voiture_liste__image">
                </div>
    
                <h2><?= $voiture["modele"] ?></h2>
                <h3><?= $voiture["prix"] ?>&nbsp;$</h3>
                <span><?= $voiture["marque"] ?></span>
                <span><?= $voiture["kilometrage"] ?></span>
                <span><?= $voiture["annee"] ?></span>    
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