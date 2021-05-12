class FormulaireAjoutVoiture {
    constructor(el) {
        this._el = el;
        
        this._elSubmit = this._el.querySelector('[data-js-btn]');
        this._elSubmitImage = this._el.querySelector('[data-js-btn-aj-img]');
        this._elFormVoiture = this._el.querySelector('[data-js-component="Form"]');
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
        this._elFormVoiture = this._el.querySelector('[data-js-component="Form"]');
        this._elFormImage = this._el.querySelector('[data-component-form-image]');
        this._elIdV = this._el.querySelector('[data-js-param="idV"]');
        this._elImage = this._el.querySelector('[data-js-param="fichierATeleverser"]');
        this._elErrImage = this._el.querySelector('[data-component-form-image] .error-message');
        this._vin;
        this._elOrdre = this._el.querySelector('[data-js-param="ordre"]');
        this.init();
    }

    init = () => {
        
        
        this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault();
            
            let validation = new FormValidator(this._elFormVoiture);
            if (validation.isValid) {
                let vin = encodeURIComponent(this._elVIN.value);
                let prixVente = encodeURIComponent(this._el.querySelector('[data-js-param="prixVente"]').value);
                let annee = encodeURIComponent(this._el.querySelector('[data-js-param="annee"]').value);
                let dateArrivee = encodeURIComponent(this._el.querySelector('[data-js-param="dateArrivee"]').value);
                let prixPaye = encodeURIComponent(this._el.querySelector('[data-js-param="prixPaye"]').value);
                let km = encodeURIComponent(this._el.querySelector('[data-js-param="km"]').value);
                let couleurfr = encodeURIComponent(this._el.querySelector('[data-js-param="couleurfr"]').value);
                let couleuren = encodeURIComponent(this._el.querySelector('[data-js-param="couleuren"]').value);
                let vedette = encodeURIComponent(this._el.querySelector('[data-js-param="vedette"]').checked ? 1 : 0);
                let idTypeCarburant = Number(encodeURIComponent(this._elSelectTypeCarburant.options[this._elSelectTypeCarburant.selectedIndex].value));
                let idModele = Number(encodeURIComponent(this._elSelectModele.options[this._elSelectModele.selectedIndex].value));
                let idChassis = Number(encodeURIComponent(this._elSelectChassis.options[this._elSelectChassis.selectedIndex].value));    
                let idTransmission = Number(encodeURIComponent(this._elSelectTransmission.options[this._elSelectTransmission.selectedIndex].value));
                let idGroupeMotopropulseur = Number(encodeURIComponent(this._elSelectGMP.options[this._elSelectGMP.selectedIndex].value));
                let idStatut = Number(encodeURIComponent(this._elSelectStatut.options[this._elSelectStatut.selectedIndex].value));
                

                this.callAJAXAjoutVoiture(
                    vin,
                    prixVente,
                    annee,
                    dateArrivee,
                    prixPaye,
                    km,
                    couleurfr,
                    couleuren,
                    vedette,
                    idGroupeMotopropulseur,
                    idTypeCarburant,
                    idChassis,
                    idModele,
                    idTransmission,
                    idStatut);
            } 
        });
        this._elSubmitImage.addEventListener('click', (e) => {
            e.preventDefault();
                let formImage = this._elFormImage;
                this._elErrImage.innerHTML = "";
                let id = Number(encodeURIComponent(this._elIdV.value));
                let vin = encodeURIComponent(this._vin);
                if(this._elOrdre.value==""){
                    this._elOrdre.value = 1;                    
                } else {
                    this._elOrdre.value = Number(encodeURIComponent(this._elOrdre.value))+1;
                }
                let ordre = Number(encodeURIComponent(this._elOrdre.value));
                console.log(ordre);
                this.callAJAXAjoutImage(formImage, id, vin, ordre);
        });

    }


    callAJAXAjoutVoiture = (vin,
                    prixVente,
                    annee,
                    dateArrivee,
                    prixPaye,
                    km,
                    couleurfr,
                    couleuren,
                    vedette,
                    idGroupeMotopropulseur,
                    idTypeCarburant,
                    idChassis,
                    idModele,
                    idTransmission,
                    idStatut) => {
        
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
                        let reponse = parseInt(JSON.parse(xhr.responseText));
                        
                        
                        if(reponse != 0){
                            this._elResultat.innerHTML = "<p>La voiture " + reponse + " a été ajoutée</p>";
                            this._elIdV.value = reponse;

                            this._elFormImage.classList.remove('disabled');
                            this._vin = this._elVIN.value;
                            this._elFormVoiture.classList.add('disabled');
                            this.viderChampsVoiture(); 
                        }else{
                            this._elResultat.innerHTML = "<p>probleme au niveau de l'ajout</p>";
                        }    
                      
                        
                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète

            xhr.send(
                'vin=' + vin +
                '&prixVente=' + prixVente +
                '&annee=' + annee +
                '&dateArrivee=' + dateArrivee +
                '&prixPaye=' + prixPaye +
                '&km=' + km +
                '&couleurfr=' + couleurfr +
                '&couleuren=' + couleuren +
                '&vedette=' + vedette +
                '&idGroupeMotopropulseur=' + idGroupeMotopropulseur +
                '&idTypeCarburant=' + idTypeCarburant +
                '&idChassis=' + idChassis +
                '&idModele=' + idModele +                
                '&idTransmission=' + idTransmission +                
                '&idStatut=' + idStatut);
        }
        
    }
    viderChampsVoiture = () => {
        this._elVIN.value = "";
        this._elPrixVente.value = "";
        this._elAnnee.value = "";        
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

    viderChampsImage = () => {
        this._elOrdre.value = "";
        this._elIdV.value = "";
        this._elImage.value = "";
    }
    callAJAXAjoutImage = (formImage, id, vin, ordre) => {
        
        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();
        
        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open("post", "index.php?Voiture_AJAX&action=ajoutImage&id=" + id +"&vin="+ vin+"&ordre="+ordre, true);            
            xhr.setRequestHeader('Accept', 'multipart/form-data');

            // reference : https://codepen.io/tcannonfodder/pen/QjpMoL
            let data = new FormData(formImage);
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
                        
                        let reponse;
                        // Traitement du DOM
                         try {
                            // Code to run
                             reponse = JSON.parse(xhr.responseText);
                        
                        } 
      
                        catch ( e ) {
                             console.log(xhr.responseText);
                            // Code to run if an exception occurs
                             
                        }
                        
                        
                        
                        //console.log(reponse["error"]);
                        if (reponse["error"]) {
                            this._elErrImage.innerHTML = reponse["msg"];
                        } else {
                            console.log(reponse);
                            this._elResultat.innerHTML += "L'image " + reponse["ordre"] + " a été ajoutée<br/>";
                            if (reponse["ordre"] == 3) {
                                this.viderChampsImage();
                                this._elFormImage.classList.add('disabled');
                                
                                this._elFormVoiture.classList.remove('disabled');
                                
                            }
                        }
                        
                   

                        
                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète

            xhr.send(data);
        }
        
    }

}