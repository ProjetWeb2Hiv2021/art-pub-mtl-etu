CREATE TABLE chassis (
	idChassis TINYINT UNSIGNED AUTO_INCREMENT, 
	chassis VARCHAR(100) NOT NULL,
	PRIMARY KEY (idChassis)
)ENGINE=InnoDB;
CREATE TABLE typeCarburant (
	idTypeCarburant TINYINT UNSIGNED AUTO_INCREMENT, 
	typeCarburant VARCHAR(100) NOT NULL,
	PRIMARY KEY (idTypeCarburant)
)ENGINE=InnoDB;
CREATE TABLE groupeMotopropulseur (
	idGroupeMotopropulseur TINYINT UNSIGNED AUTO_INCREMENT, 
	groupeMotopropulseur VARCHAR(100) NOT NULL,
	PRIMARY KEY (idGroupeMotopropulseur)
)ENGINE=InnoDB;
CREATE TABLE fabricant (
	idFabricant TINYINT UNSIGNED AUTO_INCREMENT, 
	fabricant VARCHAR(100) NOT NULL,
	PRIMARY KEY (idFabricant)
)ENGINE=InnoDB;
CREATE TABLE marque (
	idMarque TINYINT UNSIGNED AUTO_INCREMENT, 
	idFabricant TINYINT UNSIGNED NOT NULL,
	marque VARCHAR(100) NOT NULL,
	PRIMARY KEY (idMarque),
	FOREIGN KEY (idFabricant) REFERENCES fabricant(idFabricant)
)ENGINE=InnoDB;
CREATE TABLE modele (
	idModele SMALLINT UNSIGNED AUTO_INCREMENT, 
	idMarque TINYINT UNSIGNED NOT NULL, 	
	modele VARCHAR(100) NOT NULL,
	status int(1) NOT NULL DEFAULT 1,
	PRIMARY KEY (idModele),	
	FOREIGN KEY (idMarque) REFERENCES marque(idMarque)
)ENGINE=InnoDB;
CREATE TABLE transmission (
	idTransmission TINYINT UNSIGNED AUTO_INCREMENT, 
	transmission VARCHAR(100) NOT NULL,
	PRIMARY KEY (idTransmission)
)ENGINE=InnoDB;	
CREATE TABLE statut (
	idStatut TINYINT UNSIGNED AUTO_INCREMENT, 
	statut VARCHAR(100) NOT NULL,
	PRIMARY KEY (idStatut)
)ENGINE=InnoDB;
CREATE TABLE voiture (
	idVoiture SMALLINT UNSIGNED AUTO_INCREMENT,
	vin  VARCHAR(50) NOT NULL,
	prixVente MEDIUMINT NOT NULL, 
	annee SMALLINT UNSIGNED NOT NULL,
	dateArrivee DATE NOT NULL,
	prixPaye MEDIUMINT NOT NULL, 
	km MEDIUMINT NOT NULL, 
	couleur VARCHAR(50) NOT NULL,
	idGroupeMotopropulseur TINYINT UNSIGNED NOT NULL,
	idTypeCarburant TINYINT UNSIGNED NOT NULL,
	idChassis TINYINT UNSIGNED NOT NULL,
	idModele SMALLINT UNSIGNED NOT NULL, 
	idTransmission TINYINT UNSIGNED NOT NULL,
	idStatut TINYINT UNSIGNED NOT NULL,
	PRIMARY KEY (idVoiture),
	FOREIGN KEY (idTypeCarburant) REFERENCES typeCarburant(idTypeCarburant),
	FOREIGN KEY (idModele) REFERENCES modele(idModele),
	FOREIGN KEY (idChassis) REFERENCES chassis(idChassis),
	FOREIGN KEY (idTransmission) REFERENCES transmission(idTransmission),
	FOREIGN KEY (idStatut) REFERENCES statut(idStatut),
	FOREIGN KEY (idGroupeMotopropulseur) REFERENCES groupeMotopropulseur(idGroupeMotopropulseur)
)ENGINE=InnoDB;
CREATE TABLE listeImage (
	idImage SMALLINT UNSIGNED AUTO_INCREMENT, 
	cheminFichier VARCHAR(255) NOT NULL,	
	idVoiture SMALLINT UNSIGNED,
	ordre TINYINT UNSIGNED NOT NULL,
	PRIMARY KEY (idImage),
	FOREIGN KEY (idVoiture) REFERENCES voiture(idVoiture)
)ENGINE=InnoDB;	
CREATE TABLE ville (
	idVille SMALLINT UNSIGNED AUTO_INCREMENT, 
	ville VARCHAR(200) NOT NULL,
	PRIMARY KEY (idVille)
)ENGINE=InnoDB;	
CREATE TABLE province (
	idProvince SMALLINT UNSIGNED AUTO_INCREMENT, 
	province VARCHAR(150) NOT NULL,
	PRIMARY KEY (idProvince)
)ENGINE=InnoDB;
CREATE TABLE typeUtilisateur (
	idTypeUtilisateur TINYINT UNSIGNED AUTO_INCREMENT, 
	typeUtilisateur VARCHAR(100) NOT NULL,
	PRIMARY KEY (idTypeUtilisateur)
)ENGINE=InnoDB;
CREATE TABLE utilisateur (
	idUtilisateur MEDIUMINT UNSIGNED AUTO_INCREMENT, 
	nomUtilisateur VARCHAR(255) NOT NULL UNIQUE,
	motPasse VARCHAR(255) NOT NULL,
	prenom VARCHAR(255) NOT NULL,
	nomFamille VARCHAR(255) NOT NULL,
	dateNaissance DATE NOT NULL, 
	noCivique SMALLINT UNSIGNED NOT NULL,
	rue VARCHAR(255) NOT NULL,
	codePostal VARCHAR(20) NOT NULL,
	telephone VARCHAR(20) NOT NULL,
	telephonePortable VARCHAR(20) NOT NULL,	
	idTypeUtilisateur TINYINT UNSIGNED NOT NULL, 
	idVille SMALLINT UNSIGNED NOT NULL, 
	idProvince SMALLINT UNSIGNED NOT NULL, 
	PRIMARY KEY (idUtilisateur), 
	FOREIGN KEY (idTypeUtilisateur) REFERENCES typeUtilisateur(idTypeUtilisateur),
	FOREIGN KEY (idVille) REFERENCES ville(idVille),
	FOREIGN KEY (idProvince) REFERENCES province(idProvince)
)ENGINE=InnoDB;
CREATE TABLE connexion (
	idConnexion INT UNSIGNED AUTO_INCREMENT, 
	idUtilisateur MEDIUMINT UNSIGNED NOT NULL,
	dateConnexion DATE NOT NULL,
	adresseIP VARCHAR(15) NOT NULL,
	PRIMARY KEY (idConnexion)
)ENGINE=InnoDB;
CREATE TABLE modePaiement (
	idModePaiement TINYINT UNSIGNED AUTO_INCREMENT, 
	modePaiement VARCHAR(100) NOT NULL,
	PRIMARY KEY (idModePaiement)
)ENGINE=InnoDB;
CREATE TABLE expedition (
	idExpedition TINYINT UNSIGNED AUTO_INCREMENT, 
	expedition VARCHAR(100) NOT NULL,
	PRIMARY KEY (idExpedition)
)ENGINE=InnoDB;
CREATE TABLE commande (
	idCommande INT UNSIGNED AUTO_INCREMENT, 
	dateCommande DATE NOT NULL,
	idUtilisateur MEDIUMINT UNSIGNED NOT NULL,
	idModePaiement TINYINT UNSIGNED NOT NULL,
	idExpedition TINYINT UNSIGNED NOT NULL,
	idStatut TINYINT UNSIGNED NOT NULL,
	PRIMARY KEY (idCommande),
	FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(idUtilisateur),
	FOREIGN KEY (idModePaiement) REFERENCES modePaiement(idModePaiement),
	FOREIGN KEY (idExpedition) REFERENCES expedition(idExpedition),
	FOREIGN KEY (idStatut) REFERENCES statut(idStatut)
)ENGINE=InnoDB;
CREATE TABLE ligneCommande (
	idCommande INT UNSIGNED NOT NULL AUTO_INCREMENT,	
	idVoiture SMALLINT UNSIGNED NOT NULL,
	quantite TINYINT UNSIGNED NOT NULL,
	PRIMARY KEY (idCommande, idVoiture), 
	FOREIGN KEY (idCommande) REFERENCES commande(idCommande),
	FOREIGN KEY (idVoiture) REFERENCES voiture(idVoiture)
)ENGINE=InnoDB;

CREATE TABLE facture (
	idFacture TINYINT UNSIGNED AUTO_INCREMENT, 
	idCommande INT UNSIGNED NOT NULL,
	PRIMARY KEY (idFacture),
	FOREIGN KEY (idCommande) REFERENCES commande(idCommande)	
)ENGINE=InnoDB;
