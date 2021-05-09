
<?php
    if(isset($_GET['lang']) && $_GET['lang'] == "en"){
        $lang = "fr";
    }else{
        $lang ="en";
    } 

?>

<div class="table-wrapper" data-component="GestionModeles">
<h2><?=TXT__GESTIONU_GESMOD?></h2>
    
    <table class="fl-table">
        <thead>
        <tr>
            <th><?=TXT_MODELE?></th>
            <th><?=TXT__MODELE_MARQUE?></th>
            <th><?=TXT__MODELE_FABRICANT?></th>
            <th><?=TXT__DETAIL_STAT?></th>
            <th><?=TXT__GESTIONU_ACT?></th>
        </tr>
        </thead>
        <tbody>
            
            <tr>
            <div class="input-wrapper" data-js-input-wrapper>
                <select name="modele" data-js-modele size=1>
            <?php 
                if($data["modele"]){
                    foreach ($data["modele"] as $modele) {
                    ?>
                
                    <option data-js-idModele="<?= $modele["idModele"]?>" data-js-idMarque="<?= $modele["idMarque"] ?>" data-js-idstatus="<?= $modele["status"] ?>"   value="<?= $modele["modele"] ?>"><?= $modele["modele"] ?></option>
                    <?php
                    }
                }
                ?>
                    </select>
                    <small class="error-message" data-js-error-msg></small>
                </div>

                </td>  
            </tr>
    
            <tr data-js-id="" data-js>
                
                <td>
                <div class="input-wrapper" data-js-input-wrapper>
                        <input data-js-modelemodif type="text" required>
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
                        <select name="fabricant" data-js-fabricant size=1>
                    <?php
                    
                    if($data["fabricant"]){
                    foreach ($data["fabricant"] as $fabricant) { 
                    ?>
                        <option data-js-idFabricant="<?= $fabricant["idFabricant"] ?>" value="<?= $fabricant["idFabricant"] ?>"><?= $fabricant["fabricant"] ?></option>
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
                    <select name="modele" data-js-status size=1>             
                        <option  value="1">Actif</option>
                        <option  value="2">Désactiver</option>
                   
                    </select>
                    <small class="error-message" data-js-error-msg></small>
                </div>

                </td> 
                 
                <td>
                    <button data-js-mod><?=TXT__PROFIL_MODIFIER?></button>
                </td>  

            </tr>
            
        
        <tbody>
    </table>
    <h2><?=TXT__GESTIONU_AJMOD?></h2>
    <div data-js-ajoutmodel>
        <table class="fl-table">
            <thead>
            <tr>
                <th><?=TXT_MODELE?></th>
                <th><?=TXT__MODELE_MARQUE?></th>
                <th><?=TXT__MODELE_FABRICANT?></th>
                <th><?=TXT__DETAIL_STAT?></th>
                <th><?=TXT__GESTIONU_ACT?></th>
            </tr>
            </thead>
            <tbody>
                        
        
                <tr data-js-id="" data-js-utilisateur>
                    
                    <td>
                    <div class="input-wrapper" data-js-input-wrapper>
                        <input data-js-modele type="text" required>
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
                            <select name="fabricant" data-js-fabricant size=1>
                        <?php
                        
                        if($data["fabricant"]){
                        foreach ($data["fabricant"] as $fabricant) { 
                        ?>
                            <option data-js-idFabricant="<?= $fabricant["idFabricant"] ?>" value="<?= $fabricant["idFabricant"] ?>"><?= $fabricant["fabricant"] ?></option>
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
                        <select name="modele" data-js-status size=1>             
                            <option  value="1">Actif</option>
                            <option  value="2">Désactiver</option>
                    
                        </select>
                        <small class="error-message" data-js-error-msg></small>
                    </div>

                    </td> 
                    
                    <td>
                        <button data-js-ajoutmod><?=TXT__GESTIONU_AJMOD?></button>
                    </td>  

                </tr>
                
            
            <tbody>
        </table>

    </div>
</div>
