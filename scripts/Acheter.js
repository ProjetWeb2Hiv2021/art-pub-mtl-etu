class Acheter {
    constructor(el) {
        this._el = el;
        console.log(this._el.innerHTML);
        this._elNomUtilisateur =  this._el.dataset.jsNomutilisateur;

        console.log(this._elNomUtilisateur);
        this._elIdVoiture = document.querySelectorAll('[data-js-idVoiture]');
        console.log(this._elIdVoiture);
        this.init();
    }

    init = (e) => {
        this._el.addEventListener('click', (e) => {
            e.preventDefault();
            if(sessionStorage.commande){
                sessionStorage.removeItem('commande'); 
            }
            let path = "verifierEnregistrement"
            let param = `nomUtilisateur=${this._elNomUtilisateur}`;
            console.log(param);
            this.callAJAXA(param, path);
        });

    }
    callAJAXA = (param, path) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?Utilisateur_AJAX&action='+path);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        let reponse = JSON.parse(xhr.responseText);
                        for (let i = 0; i < this._elIdVoiture.length; i++) {
                            const voiture = this._elIdVoiture[i];
                            console.log(voiture);
                            let idVoiture = voiture.dataset.jsIdvoiture;
                            let modele = voiture.querySelector('[data-js-modele]');
                            let vin = voiture.querySelector('[data-js-vin]');
                            let prix = voiture.querySelector('[data-js-prix]');
                            let annee = voiture.querySelector('[data-js-annee]');
                            let km = voiture.querySelector('[data-js-km]');
                            let couleur = voiture.querySelector('[data-js-couleur]');
                            this.ajoutItemCommande(idVoiture, modele, vin,prix,annee,km,couleur);
                        }
                        
                        for (let i = 0; i < reponse.length; i++) {
                            const utilisateur = reponse[i];
                            if(utilisateur['noCivique'] == "" || utilisateur['rue'] == "" || utilisateur['codePostal'] == "" 
                            || utilisateur['telephonePortable'] == ""  || utilisateur['idVille']== ""  || utilisateur['idProvince']== "" ){
                                window.location.href = `index.php?Utilisateur&action=profil&nomUtilisateur=${this._elNomUtilisateur}&commande=encours`;                                                             
                            }else{
                                window.location.href = `index.php?Magasin&action=commande&nomUtilisateur=${this._elNomUtilisateur}`;
                            }                         
                            
                        }
                        


                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète

            xhr.send(param);
        }
    }
    ajoutItemCommande = (idVoiture, modele, vin,prix,annee,km,couleur) => {
        /* ajouter couleur commande */
        let objet = {},
            tableauObjets;

        if (!sessionStorage.getItem('commande')) tableauObjets = [];
        else {
            if (Array.isArray(JSON.parse(sessionStorage.commande))) tableauObjets = JSON.parse(sessionStorage.getItem('commande'));
            else {
                tableauObjets = []
                tableauObjets.push(JSON.parse(sessionStorage.getItem('commande')));
            }
        }
        objet.idVoiture = idVoiture;
        objet.modele = modele;
        objet.vin = vin;
        objet.prix = prix;
        objet.annee = annee;
        objet.km = km;
        objet.couleur = couleur;
        tableauObjets.push(objet);
        
        sessionStorage.setItem('commande', JSON.stringify(tableauObjets));
    }

}