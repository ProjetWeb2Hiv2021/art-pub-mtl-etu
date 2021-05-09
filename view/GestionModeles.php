
<?php
    if(isset($_GET['lang']) && $_GET['lang'] == "en"){
        $lang = "fr";
    }else{
        $lang ="en";
    } 
?>

<div class="table-wrapper" data-component="GestionModeles">
<h2><?=TXT__UTILISATEUR_ACC?></h2>
    <button><a href="index.php?Utilisateur&action=creerClient"><?=TXT__CRM_CREE_COMPTE?></a></button>
    <table class="fl-table">
        <thead>
        <tr>
            <th><?=TXT_MODELE?></th>
            <th><?=TXT__MODELE_MARQUE?></th>
            <th><?=TXT__MODELE_FABRICANT?></th>
            <th><?=TXT__GESTIONU_GER?></th>
        </tr>
        </thead>
        <tbody>
            
            
    
            <tr data-js-id="" data-js-utilisateur>
                
                <td>
                <div class="input-wrapper" data-js-input-wrapper>
                <select name="modele" data-js-modele size=1>
		
                <?php 
                if($data["modele"]){
                    foreach ($data["modele"] as $modele) {
                    ?>
                
                    <option data-js-idModele="<?= $modele["idModele"]?>" data-js-idMarque="<?= $modele["idMarque"] ?>"   value="<?= $modele["modele"] ?>"><?= $modele["modele"] ?></option>
                    <?php
                    }
                }
                ?>
                    </select>
                    <small class="error-message" data-js-error-msg></small>
                </div>

                </td>  
                <td> 
                    <div class="input-wrapper" data-js-input-wrapper>
                        <select name="marque" data-js-marque size=1>
                    <?php
                    
                    if($data["marque"]){
                    foreach ($data["marque"] as $marque) {
                    ?>
                        <option data-js-idMarque="<?= $marque["marque"] ?>" data-js-idFabricant="<?= $marque["idFabricant"] ?>" value="<?= $marque["idMarque"] ?>"><?= $marque["marque"] ?></option>
                    <?php
                        }
                    }
                    ?>
                        </select>
                        <small class="error-message" data-js-error-msg></small>
                    </div>
                </td>  
                <td> 
                    <div class="input-wrapper" data-js-input-wrapper>
                        <select name="fabricant" data-js-marque size=1>
                    <?php
                    
                    if($data["fabricant"]){
                    foreach ($data["fabricant"] as $fabricant) {
                    ?>
                        <option data-js-idFabricant="<?= $fabricant["idFabricant"] ?>" value="<?= $fabricant["fabricant"] ?>"><?= $fabricant["fabricant"] ?></option>
                    <?php
                        }
                    }
                    ?>
                        </select>
                        <small class="error-message" data-js-error-msg></small>
                    </div>
                </td>  
                <td>
                    <button data-js-mod><?=TXT__PROFIL_MODIFIER?></button>
                    <button data-js-sup><?=TXT__PROFIL_SUPP?></button>
                </td>  

            </tr>
            
        
        <tbody>
    </table>
</div>
