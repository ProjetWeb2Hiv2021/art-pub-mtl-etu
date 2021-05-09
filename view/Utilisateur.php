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
            
            if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Employé") echo
            "<th>CRM</th>";
            ?>
            
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><a href="index.php"><?=TXT__UTILISATEUR_LISTV?></a></td>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Employé") echo
            '<td><a href="index.php?Modele&action=connexion">'.TXT__UTILISATEUR_MOD.'</a></td>';
            ?>
            
            
            
        </tr>
        <tr>
            <td><a href="index.php?Magasin&action=afficheVoiture&id=19"><?=TXT__UTILISATEUR_DV?></a></td>
              <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Employé") echo

            '<td><a href="index.php?Voiture&action=connexion">'.TXT__UTILISATEUR_GV.'</a></td>';

            ?>
            
            
        </tr>
        <tr>
            <td>Connexion</td>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Employé") echo
            '<td>'.TXT__UTILISATEUR_CON.'</td>';
            ?>
            
            
        </tr>
        <tr>
            <td></td>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Employé") echo
            '<td>'.TXT__UTILISATEUR_JOUR.'</td>';
            ?>
            
            
        </tr>
        
        <tr>
            <td></td>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Employé") echo
            '<td><a href="index.php?GroupeMotopropulseur&action=connexion">Gérer GroupeMotopropulseur</a></td>';
            ?>           
        </tr>

        <tr>
            <td></td>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Employé") echo
            '<td><a href="index.php?Chassis&action=connexion">Gérer Chassis</a></td>';
            ?>           
        </tr>

        <tr>
            <td></td>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Employé") echo
            '<td><a href="index.php?TypeCarburant&action=connexion">Gérer TypeCarburant</a></td>';
            ?>           
        </tr>			
        <tbody>
    </table>
</div>
</main>