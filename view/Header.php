
<header class="header ligne distribue" data-component="Header">
	<a href="index.php"><img id="logo" src="./assets/images/logo.png" alt="Logo Cars are us"/></a>

	<!-- langue -->
	<?php
		if(isset($_COOKIE['lang'])) {
		
			//Si oui, on créer une variable $lang avec pour valeur celle du cookie.
			$lang = $_COOKIE['lang'];

		}

		if(isset($_GET['lang'])) {
 
			$lang = $_GET['lang'];
		  
			//même système que tout à l'heure :
			//On définit la durée du cookie (avant son expiration)
			$expire = 365*24*3600;
		  
			//Puis on créé le cookie
			setcookie("lang", $lang, time() + $expire);
			//Puis on redirige vers l'accueil  
		}else if(!isset($_GET['lang']) && !isset($_COOKIE['lang'])){
			$lang = "fr";
		  
			//même système que tout à l'heure :
			//On définit la durée du cookie (avant son expiration)
			$expire = 365*24*3600;
		  
			//Puis on créé le cookie
			setcookie("lang", $lang, time() + $expire);

		}
		

		//On définit la durée du cookie (avant son expiration)
		if(!isset($_COOKIE['lang'])){
			$expire = 365*24*3600;
			//Puis on créé le cookie
			setcookie("lang", $lang, time() + $expire);
		}
		
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
	<h1>Cars Are Us</h1>
	<div class="ligne centreV">
	
	<!--<img src="./assets/images/logo.svg"/>-->
	<div class="connexion ligne centreV">
	<?php
			if(isset($_SESSION["nomUtilisateur"])){
			?>
				<div data-js-utilisateur-connecte style="cursor: pointer;">
					<?php 
					 	
						if(isset($_SESSION["typeUtilisateur"])){
							if ($_SESSION["typeUtilisateur"]=="Administrateur") {
								echo "<span>adm&nbsp;</span>";
							}else if ($_SESSION["typeUtilisateur"]=="Client") {
								echo "<span>client&nbsp;</span>";
							}else if ($_SESSION["typeUtilisateur"]=="Employé") {
									echo "<span>emp&nbsp;</span>";
							}
						}
						
					?>
						<span><?php if(isset($_SESSION["nomUtilisateur"])){echo $_SESSION["nomUtilisateur"];}?></span>
						
				</div> 
			<?php	
			}
			?>
	
      	<span data-js-icone-profil>
		  
		  	<a href="index.php?Utilisateur&action=connexion" class="ligne">
				<?php 
				if(!isset($_SESSION["nomUtilisateur"])){
					echo "<span>Connexion</span>"; 
				}				
				?>
				<div class="box-shop">
					<img src="./assets/images/login_f.svg" alt="Connexion" /> 
				</div>
				
			</a>
			
		</span>
		
		
    </div>

	<div class="box-panier">
		<label id="conteurVoiture"> </label>
		<a href="index.php?Magasin&action=Confirmation">
			<img src="./assets/images/panier.svg"  class="image__car">
		</a>
	</div>

	<div class="menu_profil" data-js-menu-profil>
		<?php if(isset($_SESSION["nomUtilisateur"])){

			?>
			<a href="index.php?Utilisateur&action=profil&nomUtilisateur=<?= $_SESSION["nomUtilisateur"] ?>"><?=TXT__HEADER_PROFIL?></a>
					<a href="index.php?Utilisateur&action=deconnexion"><?=TXT__HEADER_DECO?></a>
					<a href=""><?=TXT__HEADER_COM?></a>
					<?php
			}
			?>
		</div>	
	</div>

	
	
</header>
