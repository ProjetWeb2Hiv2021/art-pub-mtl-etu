class VoitureDetail {
    constructor(el) {
        this._el = el;
        this._systeme = this._el.dataset.jsSysteme;
        this._elSubmit = this._el.querySelector('[data-js-btn]');
        this.init();
    }

    init = (e) => {
        
        console.log(this._el);
         this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault();
            
            console.log('Produit ajouter au panier');
            let modele = this._el.querySelector('[data-js-modele]').value;
            

            
            let vin = this._el.querySelector('[data-js-param="vin"]').value;
            let prix = this._el.querySelector('[data-js-param="prixVente"]').value;
            let annee = this._el.querySelector('[data-js-param="annee"]').value;
            let km = this._el.querySelector('[data-js-param="km"]').value;
            let couleur = this._el.querySelector('[data-js-param="couleurfr"]').value;
            let liste = this._el.querySelector('[data-js-param="statut"]');
            //let vStatus = liste.options[liste.selectedIndex].value;
            // id voiture 
            let idVoiture = this._el.querySelector('[data-js-idvoiture]').dataset.jsIdvoiture;

            this.ajouterNouvelObjet(idVoiture, modele, vin,prix,annee,km,couleur);
            console.log(idVoiture);

        });


    }


    ajouterNouvelObjet = (idVoiture, modele, vin,prix,annee,km,couleur) => {

 
        let objet = {},
            tableauObjets;

        if (!sessionStorage.getItem('Panier')) tableauObjets = [];
        else {
            if (Array.isArray(JSON.parse(sessionStorage.Panier))) tableauObjets = JSON.parse(sessionStorage.getItem('Panier'));
            else {
                tableauObjets = []
                tableauObjets.push(JSON.parse(sessionStorage.getItem('Panier')));
            }
        }

        ///
        var sw = 0
        for (let i = 0, l = tableauObjets.length; i < l; i++) {
            //Vérifier si le voiture existe dans la variable de session.
            if (vin == tableauObjets[i].vin)
            {
                sw = 1;
            }
        }

        //
        if(sw==0){
            objet.idVoiture = idVoiture;
            objet.modele = modele;
            objet.vin = vin;
            objet.prix  = prix;
            objet.annee = annee;
            objet.km  = km;
            objet.couleur  = couleur;
            tableauObjets.push(objet);
            sessionStorage.setItem('Panier', JSON.stringify(tableauObjets));


            var elConteur = document.getElementById("conteurVoiture");
            let cont = 0;
            if (sessionStorage.getItem('conteurVoiture'))
            {
                cont = parseInt(sessionStorage.getItem('conteurVoiture')) + 1;
            }
            else
                cont = 1;
        
            // Afficher le conteur sur la page à coté du icone.
            elConteur.innerHTML = cont;
    
            // Sauvegarde la variable de session
            sessionStorage.setItem('conteurVoiture', cont);

            alert("Vous avez ajoutez une voiture au panier");
        }
        else
            alert("La voiture est déjà dans le panier");



    }

}