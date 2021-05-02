<section data-component="VoitureListe" class="gallery gallery--4">
  
 <!-- juste un prototype -->   
    <?php
    
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
                data-js-voiture-modele="<?= $voiture["couleur"] ?>" 
                data-js-voiture-prix="<?= $voiture["prixPaye"] ?>" 
                data-js-voiture-groupeMotopropulseur="<?= $voiture["groupeMotopropulseur"] ?>" 
                data-js-voiture-modele="<?= $voiture["modele"] ?>"
                data-js-voiture-marque="<?= $voiture["marque"] ?>"
                data-js-voiture-fabricant="<?= $voiture["fabricant"] ?>"
                data-js-voiture-statut="<?= $voiture["statut"] ?>"
                data-component="Voiture"
            >
    
                <div class="voiture_liste__image-wrapper">
                    <img src="<?= $voiture["cheminFichier"] ?>" alt="" class="voiture_liste__image">
                </div> 
                <div class = "info_voiture">
                    <h2><?= $voiture["modele"] ?></h2>
                    <h2><?= $voiture["marque"] ?></h2>
                    <h3><?= $voiture["prixVente"] ?>&nbsp;$</h3>
                    <span><?= $voiture["annee"] ?></span><br>                             
                    <span><?= $voiture["km"] ?> Km</span><br>
                    <span><?= $voiture["groupeMotopropulseur"] ?></span><br>
                </div>      
                      
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

