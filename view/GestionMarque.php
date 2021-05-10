
<?php
    if(isset($_GET['lang']) && $_GET['lang'] == "en"){
        $lang = "fr";
    }else{
        $lang ="en";
    } 

?>

<div class="table-wrapper" data-component="GestionMarque">
<h2><?=TXT__GESTIONUME_GESMOD?></h2>
    <div data-js-reponse></div>
    <table class="fl-table">
                    <div class="input-wrapper" data-js-input-wrapper>
                            <select name="marque" data-js-marque size=1>
                        <?php
                        
                        if($data["marque"]){
                        foreach ($data["marque"] as $marque) {
                        ?>
                            <option data-js-idMarque="<?= $marque["idMarque"] ?>" data-js-idFabricant="<?= $marque["idFabricant"] ?>" data-js-idstatus="<?= $marque["statut"] ?>" value="<?= $marque["marque"] ?>"><?= $marque["marque"] ?></option>
                        <?php
                            }
                        }
                        ?>
                            </select>
                            <small class="error-message" data-js-error-msg></small>
                        </div>
        <thead>
        <tr>
            <th><?=TXT__MODELE_MARQUE?></th>
            <th><?=TXT__MODELE_FABRICANT?></th>
            <th><?=TXT__DETAIL_STAT?></th>
            <th><?=TXT__GESTIONU_ACT?></th>
        </tr>
        </thead>
        <tbody>
            
        
                <tr data-js-id="" data-js>
                
                <td>
                <div class="input-wrapper" data-js-input-wrapper>
                        <input data-js-marquemodif type="text" required>
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
                    <select name="marque" data-js-status size=1>             
                        <option  value="1">Actif</option>
                        <option  value="2">Désactiver</option>
                   
                    </select>
                    <small class="error-message" data-js-error-msg></small>
                </div>

                </td> 
                 
                <td>
                    <button data-js-mar><?=TXT__GESTIONUME_MODIF?></button>
                </td>  

            </tr>
            
        
        <tbody>
    </table>
    <h2><?=TXT__GESTIONU_AJMOD?></h2>
    <div data-js-ajoutmarque>
        <table class="fl-table">
            <thead>
            <tr>
            <th><?=TXT__MODELE_MARQUE?></th>
            <th><?=TXT__MODELE_FABRICANT?></th>
            <th><?=TXT__DETAIL_STAT?></th>
            <th><?=TXT__GESTIONUME_ACT?></th>
        </tr>
        </thead>
        <tbody>
                <tr data-js-id="" data-js>
                
                <td>
                <div class="input-wrapper" data-js-input-wrapper>
                        <input data-js-marque type="text" required>
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
                    <button data-js-ajoutmar><?=TXT__GESTIONUME_AJMOD?></button>
                </td>  

            </tr>
                
            
            <tbody>
        </table>

    </div>
</div>
