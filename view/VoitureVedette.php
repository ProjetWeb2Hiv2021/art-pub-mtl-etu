<section data-component="VoitureVedette" class="swiper-container">
 <!-- juste un prototype --> 
 <div class="swiper-wrapper">
    <div class='carousel-example'>
        <?php    
            if($data["voitureVedette"]){
                foreach ($data["voitureVedette"] as $voiture) {
        ?>
                    <div class="swiper-slide" 
                        data-js-voiture
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
                        data-component="Voiture">

                        <div class="box">
                            <img src="<?= $voiture["cheminFichier"] ?>" alt="" class="voiture_liste__image">
                        </div>        
                    </div>
        <?php            
            }
        
            }else{
        ?>  
               <p>pas de voitures en vedette</p>

        <?php
        }
    ?>
    <!-- Fin prototype -->
    </div>
</div>

</section>
