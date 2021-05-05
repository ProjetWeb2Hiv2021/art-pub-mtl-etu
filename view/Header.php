<header class="header ligne distribue" data-component="Header">
	<a href="index.php"><img id="logo" src="./assets/images/logo.png" alt="Logo Cars are us"
              /></a>
<h1>Cars Are Us</h1>
<!--<img src="./assets/images/logo.svg"/>-->
	<div class="connexion ligne centreV">

		<?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Administrateur") echo "<span>adm&nbsp;</span>"; ?>
		<?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Client") echo "<span>client&nbsp;</span>"; ?>
		<?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Employe") echo "<span>emp&nbsp;</span>";  ?>
		
      	
      	<span data-js-icone-profil>
		  
		  	<a href="index.php?Utilisateur&action=connexion" class="ligne">
				<?php 
				if(!isset($_SESSION["nomUtilisateur"])){
					echo "<span>Connexion</span>"; 
				}else{
					echo $_SESSION["nomUtilisateur"]; 
				}
				
				?>		  
				<img src="./assets/images/login_f.svg" alt="Connexion" />
			</a>
			
		</span>
		
    </div>
	
		<div class="menu_profil" data-js-menu-profil>
		<?php if(isset($_SESSION["nomUtilisateur"])){
			?>
				<a href="index.php?Utilisateur&action=profil&nomUtilisateur=<?= $_SESSION["nomUtilisateur"] ?>">Profil</a>
				<a href="index.php?Utilisateur&action=deconnexion">Déconnexion</a>
				<a href="">Commandes</a>
				<?php
		}
		?>
		</div>	
	
	
</header>
