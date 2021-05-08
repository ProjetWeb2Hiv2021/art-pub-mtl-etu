<main data-component="Connexion-SWT">
<section data-component="Connexion" >
    <?php 
    if(isset($_COOKIE['lang'])){
        $lang = $_COOKIE['lang'];
    }else{
        $lang ="fr";

    } 

    ?>
    <h1><?=TXT__SWT_TRANSACTIONNEL?></h1>
    <div data-js-component="Form" >            
        <form method="post" class="ligne centre" action="index.php?Utilisateur&action=authentifier">
            <div class="ligne distribue">
              <div class="colonne">  
            
                <div class="ligne distribue">

                    <label for="nomUtilisateur"><?=TXT__SWT_UTILISATEUR?>:</label>
                    <input type="text" id="nomUtilisateur" name="nomUtilisateur" required data-js-param="nomUtilisateur" value="">
                </div>
                <div class="ligne distribue">
                    <label for="motPasse"><?=TXT__CRM_MP?> :</label>
                    <input type="password" id="motPasse" name="motPasse" required data-js-param="motPasse" value="">
                    <input type="hidden" name="lang" value="<?=$lang?>"> 
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
</main>


    
