<header class="header ligne distribue" data-component="Header">
	<a href="index.php"><img src="./assets/images/logo.png" alt="Logo Cars are us"
              /></a>
<h1>Cars Are Us</h1>
<!--<img src="./assets/images/logo.svg"/>-->
	<div class="connexion ligne centreV">


		
		<?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Administrateur") echo "<span>adm&nbsp;</span>"; ?>
		<?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Client") echo "<span>client&nbsp;</span>"; ?>
		<?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Employe") echo "<span>emp&nbsp;</span>";  ?>
		
      	
      	<span>
		  
		  	<a href="index.php?Utilisateur&action=connexion" class="ligne">
				<?php if(!isset($_SESSION["nomUtilisateur"])) echo "<span>Connexion</span>"; ?>		  
				<img src="./assets/images/login_f.svg" alt="Connexion" />
			</a>
			
		</span>
		
    </div>
	
</header>
