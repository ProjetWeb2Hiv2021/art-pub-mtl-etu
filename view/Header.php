<header class="header row distribue" data-component="Header">
	<h1>Cars are Us</h1>
	<div class="connexion row centreV">
		
		<?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Administrateur") echo "<span>adm&nbsp;</span>"; ?>
		<?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Client") echo "<span>client&nbsp;</span>"; ?>
		<?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Employe") echo "<span>emp&nbsp;</span>"; ?>
		<?php if(!isset($_SESSION["nomUtilisateur"])) echo "<span>Connexion</span>"; ?>
      	
      	<span>
		  	<a href="index.php?Utilisateur&action=connexion">
				<img src="./assets/images/login.svg" alt="Connexion" />
			</a>
		</span>
    </div>
</header>