<div class="main-k">
    <div class="header" data-component="MenuPrincipal">

        <!--<img src="./assets/images/logo_test.svg"/>-->
        <!--<div class="titre">
            <p><h1>Cars are Us</h1></p>
        </div>-->
        <!--<div class="menu">
            <hr>  
            <h5>
            <input type="checkbox" id="btn-menu">
            <label for="btn-menu"><img src="icon-menu-512_bl.png" alt =""> </label>-->
            <?php
                if(isset($_GET['lang']) && $_GET['lang'] == "en"){
                    $lang = "fr";
                }else{
                    $lang ="en";
                } 
            ?>
            <hr> 
            <div class="menu">  
        <ul>
                <li><a href="#"><?= TXT_ACCUEIL ?></a></li>
                <li><a href="index.php?Magasin&action=afficherQui"><?= TXT_QUI ?></a></li>
                <li><a href="index.php?Magasin&action=afficherPolitique"><?= TXT_TERMES?></a></li>
                <li><a href="index.php?Magasin&action=afficherContact"><?= TXT_CONTACT?></a></li>
            
                <li class="item-right" data-js-langue><a href="index.php?Magasin&action=accueil&lang=<?=$lang?>"><?=$lang?></a></li>
            </ul>
            </h5> 
                <hr>     
        </div>

    </div>
</div>

