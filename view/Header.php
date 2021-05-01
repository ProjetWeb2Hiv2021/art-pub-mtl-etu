<header class="header ligne distribue" data-component="Header">
	<h1>Cars are Us</h1>

<!--<img src="./assets/images/logo.svg"/>-->
	
		<!--<p></p>
		<div class="menu">
        <hr>  
        <h5>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Qui nous sommes</a></li>
            <li><a href="#">Contactez-nous</a></li>
            <li class="item-right"><a href="#">En</a></li>
        </ul>
        </h5> 
     </div>-->
		
	
		
	<div class="connexion row centreV">

		
		<?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Administrateur") echo "<span>adm&nbsp;</span>"; ?>
		<?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Client") echo "<span>client&nbsp;</span>"; ?>
		<?php if(isset($_SESSION["typeUtilisateur"])&& $_SESSION["typeUtilisateur"]=="Employe") echo "<span>emp&nbsp;</span>"; ?>
		<?php if(!isset($_SESSION["nomUtilisateur"])) echo "<span>Connexion</span>"; ?>
      	
      	<span>
		  
		  	<a href="index.php?Utilisateur&action=connexion">
				<img src="./assets/images/login_f.svg" alt="Connexion" />
			</a>
			
		</span>
		
    </div>
	
</header>
