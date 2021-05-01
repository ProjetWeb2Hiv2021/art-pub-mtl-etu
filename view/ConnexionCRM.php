<section data-component="Connexion">
    <h1>Système Gestion Clients</h1>
    <div data-js-component="Form">            
        <form method="post">
            <div class="row distribue">
              <div class="colonne">  
            
                <div class="row distribue">
                    <label for="nomUtilisateur">Courriel :</label>
                    <input type="email" id="nomUtilisateur" name="nomUtilisateur" required data-js-param="nomUtilisateur" value="">
                </div>
                <div class="row distribue">
                    <label for="motPasse">Mot de passe :</label>
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


    
