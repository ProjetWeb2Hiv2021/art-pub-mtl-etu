<div class="menu-section">
  <div class="menu-toggle">
    <div class="one"></div>
    <div class="two"></div>
    <div class="three"></div>
  </div>
  <nav>
		<ul role="navigation" class="hidden">
			<li><a href="index.php">Accueil</a></li>
			<li><a href="index.php?Magasin&action=afficherQui">Qui nous sommes</a></li>
			<li><a href="index.php?Magasin&action=afficherPolitique">Termes</a></li>
			<li><a href="index.php?Magasin&action=afficherContact">Contactez-nous</a></li>
			<li>
			<div class="connexion ligne centreV centreV-k">

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
						<div class="box-shop">
							<img src="./assets/images/panier.svg" alt="Connexion" /> 
						</div> 
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
			</li>
		</ul>
	</nav>
</div>


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
	<h1>Cars Are Us</h1>
	<div>
		<label id="conteurVoiture"> </label>
		<a href="index.php?Magasin&action=Confirmation">
					<img src="./assets/images/carShop.svg"  class="image__car">
		</a>
	</div>	
	<!--<img src="./assets/images/logo.svg"/>-->
	<div class="connexion ligne centreV">
	
      	<span data-js-icone-profil>
		  
		  	<a href="index.php?Utilisateur&action=connexion" class="ligne">
				<?php 
				if(!isset($_SESSION["nomUtilisateur"])){
					echo "<span>Connexion</span>"; 
				}else{
					echo $_SESSION["nomUtilisateur"]; 
				}
				
				?>
				
				<div class="box-shop">
					<img src="./assets/images/login_f.svg" alt="Connexion" /> 
				</div> 
			</a>	
		</span>
		<?php 
				if(isset($_SESSION["nomUtilisateur"])){
				?>
					<div data-js-utilisateur-connecte style="cursor: pointer;">
					<?php 
					 
						if(isset($_SESSION["typeUtilisateur"])){
							if ($_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Administrateur") {
								echo "<span>adm&nbsp;</span>";
							}else if ($_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Client") {
								echo "<span>client&nbsp;</span>";
							}else if ($_SESSION["typeUtilisateur"][0]["typeUtilisateurfr"]=="Employe") {
									echo "<span>emp&nbsp;</span>";
							}
						}
						
					?>
						<span><?=$_SESSION["nomUtilisateur"]?></span>
						<svg viewBox="0 0 500 500" width="20" y="20" style="fill: #ed712b"><path d="M434.252,114.203l-21.409-21.416c-7.419-7.04-16.084-10.561-25.975-10.561c-10.095,0-18.657,3.521-25.7,10.561
							L222.41,231.549L83.653,92.791c-7.042-7.04-15.606-10.561-25.697-10.561c-9.896,0-18.559,3.521-25.979,10.561l-21.128,21.416
							C3.615,121.436,0,130.099,0,140.188c0,10.277,3.619,18.842,10.848,25.693l185.864,185.865c6.855,7.23,15.416,10.848,25.697,10.848
							c10.088,0,18.75-3.617,25.977-10.848l185.865-185.865c7.043-7.044,10.567-15.608,10.567-25.693
							C444.819,130.287,441.295,121.629,434.252,114.203z"/></svg>
					</div>
				<?php
				}
		?>
		
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
			

	
	
</header>
