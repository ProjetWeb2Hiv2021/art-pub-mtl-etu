<main data-component="Connexion-SWT">
<section data-component="Connexion" >
    <h1>Site Web Transactionnel</h1>
    <div data-js-component="Form" >            
        <form method="post" class="ligne centre">
            <div class="ligne distribue">
              <div class="colonne">  
            
                <div class="ligne distribue">
                    <label class="field field_v2" for="nomUtilisateur">
                        <input class="field__input" type="text" id="nomUtilisateur" name="nomUtilisateur" required data-js-param="nomUtilisateur" value="" placeholder="Nom utilisateur">
                        <span class="field__label-wrap">
                            <span class="field__label">Nom utilisateur :</span>
                        </span>
                    </label> 
                    
                </div>
                <div class="ligne distribue">
                    <label class="field field_v2" for="motPasse">
                        <input class="field__input" type="password" id="motPasse" name="motPasse" required data-js-param="motPasse" value="" placeholder="Mot de passe">
                        <span class="field__label-wrap">
                            <span class="field__label">Mot de passe :</span>
                        </span>
                    </label>                     
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
            <a href="index.php?action=oublie">Mot de passe oublié</a>
        </div>    
        <div>
            <a href="index.php?Utilisateur&action=creerClient">Créer un compte</a>
        </div>    
        <div>
            <a href="index.php?action=invite">Invité</a>
        </div>
        <div>
            <a href="index.php">Retour à la liste</a>
        </div>    
    </div>
</section>
</main>


    
