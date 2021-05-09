class VoitureDetailSGC {
    constructor(el) {
        this._el = el;
        
        this._elSubmit = this._el.querySelector('[data-js-btn]');
        
        this._elVIN = this._el.querySelector('[data-js-param="vin"]');
        this._elPrixVente = this._el.querySelector('[data-js-param="prixVente"]');
        this._elAnnee = this._el.querySelector('[data-js-param="annee"]');
        this._elDateArrivee = this._el.querySelector('[data-js-param="dateArrivee"]');
        this._elPrixPaye = this._el.querySelector('[data-js-param="prixPaye"]');
        this._elKm = this._el.querySelector('[data-js-param="km"]');
        this._elCouleurfr = this._el.querySelector('[data-js-param="couleurfr"]');
        this._elCouleuren = this._el.querySelector('[data-js-param="couleuren"]');
        this._elVedette = this._el.querySelector('[data-js-param="vedette"]');

        this._elSelectTypeCarburant = this._el.querySelector('[data-js-typeCarburant]');
        this._elSelectModele = this._el.querySelector('[data-js-modele]');
        this._elSelectChassis = this._el.querySelector('[data-js-chassis]');
        this._elSelectTransmission = this._el.querySelector('[data-js-transmission]');
        this._elSelectGMP = this._el.querySelector('[data-js-gmp]');
        this._elSelectStatut = this._el.querySelector('[data-js-statut]');
        this._elResultat = this._el.querySelector('[data-js-resultat]');
        
        
        this.init();
    }

    init = () => {
        
        
        this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault();
            
            let validation = new FormValidator(this._el);
            if (validation.isValid) {
                let vin = encodeURIComponent(this._elVIN.value);
                let prixVente = encodeURIComponent(this._el.querySelector('[data-js-param="prixVente"]').value);
                let annee = encodeURIComponent(this._el.querySelector('[data-js-param="annee"]').value);
                let dateArrivee = encodeURIComponent(this._el.querySelector('[data-js-param="dateArrivee"]').value);
                let prixPaye = encodeURIComponent(this._el.querySelector('[data-js-param="prixPaye"]').value);
                let km = encodeURIComponent(this._el.querySelector('[data-js-param="km"]').value);
                let couleurfr = encodeURIComponent(this._el.querySelector('[data-js-param="couleurfr"]').value);
                let couleuren = encodeURIComponent(this._el.querySelector('[data-js-param="couleuren"]').value);
                let vedette = encodeURIComponent(this._el.querySelector('[data-js-param="vedette"]').value);
                let idTypeCarburant = Number(encodeURIComponent(this._elSelectTypeCarburant.options[this._elSelectTypeCarburant.selectedIndex].value));
                let idModele = Number(encodeURIComponent(this._elSelectModele.options[this._elSelectModele.selectedIndex].value));
                let idChassis = Number(encodeURIComponent(this._elSelectChassis.options[this._elSelectChassis.selectedIndex].value));    
                let idTransmission = Number(encodeURIComponent(this._elSelectTransmission.options[this._elSelectTransmission.selectedIndex].value));
                let idGroupeMotopropulseur = Number(encodeURIComponent(this._elSelectGMP.options[this._elSelectGMP.selectedIndex].value));
                let idStatut = Number(encodeURIComponent(this._elSelectStatut.options[this._elSelectStatut.selectedIndex].value));
                
                this.callAJAXAjoutVoiture(vin, prixVente, annee, dateArrivee, prixPaye, km, couleurfr, couleuren, vedette,
                    idTypeCarburant, idModele, idChassis, idTransmission, idGroupeMotopropulseur, idStatut);
            }
        });


    }


    callAJAXAjoutVoiture = (vin, prixVente, annee, dateArrivee, prixPaye, km, couleurfr, couleuren, vedette, idTypeCarburant,
        idModele, idChassis, idTransmission, idGroupeMotopropulseur) => {
        
        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?Voiture_AJAX&action=ajoutVoiture');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
                        
                        
                        // Traitement du DOM
                        /* console.log("test"); */
                          let reponse = JSON.parse(xhr.responseText);
                        
                        if(reponse == 1){
                            this._elResultat.innerHTML = "<p>La voiture a été ajoutée</p>";
                        }else{
                            this._elResultat.innerHTML = "<p>probleme ou niveau de l'ajout</p>";
                        }   

                        this.viderChamps();
                        
                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète

            xhr.send('vin=' + vin + '&prixVente=' + prixVente + '&annee=' + annee + '&dateArrivee=' + dateArrivee + '&prixPaye=' + prixPaye + '&km=' + km + '&couleurfr=' + couleurfr + '&couleuren='
                + couleuren + '&vedette=' + vedette + '&idTypeCarburant=' + idTypeCarburant + '&idModele=' +
                idModele + '&idChassis=' + idChassis + '&idTransmission=' + idTransmission + '&idGroupeMotopropulseur=' +  idGroupeMotopropulseur + '&idStatut=' +
                this._idStatut);
        }
        
    }
    viderChamps = () => {
        this._elVIN.value = "";
        this._elPrixVente.value = "";
        this._elAnnee.value = "";
        this._elDateArrivee.value = "";
        this._elPrixPaye.value = "";
        this._elKm.value = "";
        this._elCouleurfr.value = "";
        this._elCouleuren.value = "";
        this._elVedette.value = "";
        this._elSelectTypeCarburant.selectedIndex = 0;
        this._elSelectModele.selectedIndex = 0;
        this._elSelectChassis.selectedIndex = 0;
        this._elSelectTransmission.selectedIndex = 0;
        this._elSelectGMP.selectedIndex = 0;
        this._elSelectStatut.selectedIndex = 0;
    }

}