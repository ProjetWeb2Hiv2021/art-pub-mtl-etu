<div class="main-k">
    <div class="header" data-component="MenuPrincipal">

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

