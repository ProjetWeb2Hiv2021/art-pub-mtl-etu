<main class="UtilisateurSystemes">
<?php
    if(isset($_COOKIE['lang'])){
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
            
            if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employé") echo
            "<th>CRM</th>";
            ?>
            
        </tr>
        </thead>
        <tbody>
        <tr>
            <td rowspan="4"><a href="index.php"><?=TXT__UTILISATEUR_LISTV?></a></td>

            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employé") echo
            '<td><a href="index.php?Modele&action=gererModeles">'.TXT__UTILISATEUR_MOD.'</a></td>';
            ?>         

            
        </tr>
        <tr>
            

            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employé") echo
            '<td><a href="index.php?Modele&action=gererMarques">'.TXT__GESTIONUME_GESMOD.'</a></td>';
            ?>         
            
        </tr>
        <tr>
            
              <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employé") echo

            '<td><a href="index.php?Voiture&action=ajout">'.TXT__UTILISATEUR_AV.'</a></td>';

            ?>
            
            
        </tr>
        <tr>
            
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employé") echo

            

            '<td><a href="index.php?Voiture&action=listeAModifier">'.TXT__UTILISATEUR_MV.'</a></td>';

            ?>
            
            
        </tr>
        <tr>
            <td rowspan="4"><a href="index.php?Magasin&action=afficheVoiture&id=19"><?=TXT__UTILISATEUR_DV?></a></td>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur") echo
            '<td><a href="index.php?Utilisateur&action=gererUtilisateurs">'.TXT__UTILISATEUR_GER_UTI.'</a></td>';
            ?>
            
            
        </tr>
        <tr>
            
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employé") echo
            '<td><a href="index.php?GroupeMotopropulseur&action=connexion">'.TXT__GESTIONU_GESMODGMP.'</a></td>';
            ?> 
                    
        </tr>
        
        <tr>
            
             <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employé") echo
            '<td><a href="index.php?Chassis&action=connexion">'.TXT__GESTIONU_GESMODCHAS.'</a></td>';
            ?>          
        </tr>

        <tr>
            
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employé") echo
            '<td><a href="index.php?TypeCarburant&action=connexion">'.TXT__GESTIONU_GESMODTC.'</a></td>';
            ?>           
        </tr>


        <tr>
            <td></td>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Administrateur"|| $_SESSION["typeUtilisateur"]["typeUtilisateurfr"]=="Employé")  echo
            '<td><a href="index.php?Fabricant&action=connexion">'.TXT__GESTIONU_GESMODFAB.'</a></td>';
            ?>           
        </tr>
        	
        <tbody>
    </table>
</div>
</main>