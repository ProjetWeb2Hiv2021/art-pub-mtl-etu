<main class="UtilisateurSystemes">

 <h2>Accès systèmes</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>SWT</th>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Administrateur"||isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Employe") echo
            "<th>CRM</th>";
            ?>
            
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><a href="index.php">Liste Voitures</a></td>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Administrateur"||isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Employe") echo
            '<td><a href="index.php?Modele&action=connexion">Gérer Modèle</a></td>';
            ?>
            
            
            
        </tr>
        <tr>
            <td><a href="index.php?Magasin&action=afficheVoiture&id=19">Detail Voiture</a></td>
              <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Administrateur"||isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Employe") echo
            '<td><a href="index.php?Voiture&action=connexion">Gérer Voiture</a></td>';
            ?>
            
            
        </tr>
        <tr>
            <td>Connexion</td>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Administrateur"||isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Employe") echo
            '<td>Connexion</td>';
            ?>
            
            
        </tr>
        <tr>
            <td></td>
            <?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Administrateur"||isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Employe") echo
            '<td>Journal connexions</td>';
            ?>
            
            
        </tr>
        
        <tbody>
    </table>
</div>
</main>