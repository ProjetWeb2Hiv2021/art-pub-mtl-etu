<section data-component="Connexion">
    <h1><?=TXT__CRM_H1?></h1>
    <div data-js-component="Form">            
        <form method="post">
            <div class="row distribue">
              <div class="colonne">  
            
                <div class="row distribue">

                    <label class="field field_v2">
                        <input class="field__input" type="email" id="nomUtilisateur" name="nomUtilisateur" required data-js-param="nomUtilisateur" value="" placeholder="Courriel">
                        <span class="field__label-wrap">
                            <span class="field__label">Courriel :</span>
                        </span>
                    </label> 
                    <label for="nomUtilisateur"><?=TXT__CRM_COURRIEL?> :</label>

                    <input type="email" id="nomUtilisateur" name="nomUtilisateur" required data-js-param="nomUtilisateur" value="">
                </div>
                <div class="row distribue">
                    <label for="motPasse"><?=TXT__CRM_MP?> :</label>
                    <input type="password" id="motPasse" name="motPasse" required data-js-param="motPasse" value="">
                    <input type="hidden" name="action" value="authentifier">                    
                </div>                
            </div>
            <div class="aLaFin">
                <input type="submit" value="Connexion">
            </div>
            </div>
        </form>
        <span><?php if(isset($data["message"])) echo $data["message"] ?></span>
        <div>
            <a href="index.php?action=oublie"><?=TXT__CRM_MP_OUBLI?></a>
        </div>    
        <div>
            <a href="index.php?Utilisateur&action=creerClient"><?=TXT__CRM_CREE_COMPTE?></a>
        </div>    
        <div>
            <a href="index.php?action=invite"><?=TXT__CRM_INVITE?></a>
        </div>
        <div>
            <a href="index.php"><?=TXT__CRM_RETOUR_LIST?></a>
        </div>        
    </div>
</section>


    
