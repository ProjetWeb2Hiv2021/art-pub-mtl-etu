<main class="UtilisateurSystemes">
<?php
    if($_COOKIE['lang']){
        $lang = $_COOKIE['lang'];
    }else{
        $lang ="fr";

    } 
    ?>
 <h2><?=TXT__UTILISATEUR_ACC?></h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>SWT</th>
            <?php 
            var_dump($_SESSION);
            if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"||
             $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employe") echo
            "<th>SGC</th>";
            ?>
            
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><a href="index.php"><?=TXT__UTILISATEUR_MOD?></a></td>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"||
            isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employe") echo
            '<td><a href="index.php?Modele&action=connexion">'.TXT__UTILISATEUR_MOD.'</a></td>';
            ?>
            
            
            
        </tr>
        <tr>
            <td><a href="index.php?Magasin&action=afficheVoiture&id=19"><?=TXT__UTILISATEUR_DV?></a></td>
              <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"||isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employe") echo

            '<td><a href="index.php?Voiture&action=connexion">'.TXT__UTILISATEUR_GV.'</a></td>';

            ?>
            
            
        </tr>
        <tr>
            <td>Connexion</td>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"||isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employe") echo
            '<td>'.TXT__UTILISATEUR_CON.'</td>';
            ?>
            
            
        </tr>
        <tr>
            <td></td>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"||isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employe") echo
            '<td>'.TXT__UTILISATEUR_JOUR.'</td>';
            ?>
            
            
        </tr>
        
        <tbody>
    </table>
</div>
</main>