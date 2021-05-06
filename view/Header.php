<header class="header ligne distribue" data-component="Header">
	<a href="index.php"><img id="logo" src="./assets/images/logo.png" alt="Logo Cars are us"/></a>

	<!-- langue -->
	<?php
		if(isset($_GET['l'])) {
 
			$lang = $_GET['l'];
		  
			//même système que tout à l'heure :
			//On définit la durée du cookie (avant son expiration)
			$expire = 365*24*3600;
		  
			//Puis on créé le cookie
			setcookie("lang", $lang, time() + $expire);
			//Puis on redirige vers l'accueil  
		}else{
			$lang = "fr";
		  
			//même système que tout à l'heure :
			//On définit la durée du cookie (avant son expiration)
			$expire = 365*24*3600;
		  
			//Puis on créé le cookie
			setcookie("lang", $lang, time() + $expire);

		}

		//On définit la durée du cookie (avant son expiration)
		$expire = 365*24*3600;
		//Puis on créé le cookie
		setcookie("lang", $lang, time() + $expire);
		switch($lang) {
			//Si lang=fr on inclut le fichier de langue française
			case 'fr':
				include('langue/fr-lang.php');
			break;
			//Si lang=en on inclut le fichier de langue anglaise
			case 'en':
				include('langue/en-lang.php');
			break;
		}

	?>
 

	<form id="formLangue" method="get" >
		<select name="l" data-js-langue>
			<option value="fr" selected="selected">Français</option>
			<option value="en">English</option>
		</select>                    
		<button data-js-btn>Soumettre</button>
	</form>


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
	<div>
		<label id="conteurVoiture"> </label>
		<a href="index.php?Magasin&action=Confirmation">
					<img src="./assets/images/carShop.svg"  class="image__car">
		</a>
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
