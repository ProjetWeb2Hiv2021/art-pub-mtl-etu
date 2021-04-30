class FormulaireAjoutUtilisateur{
    constructor(el) {
        this._el = el;
        this._elSubmit = this._el.querySelector('[data-js-btn]');
        this._elVoitures = document.querySelector('[data-component="VoitureListe"]');
        this._elSelectVille = this._el.querySelector('[data-js-ville]');
        this._elSelectProvince= this._el.querySelector('[data-js-province]');
        this._elSelectTypeUtilisateur= this._el.querySelector('[data-js-typeutilisateur]');
        // récupère élément username
        this._allUsername = this._el.querySelector('[data-js-param="username"]');


        this.init();
    }
    init = (e) => {
        /* au change le btn recherche s'active */
        // si le formulaire est valide, appelle la fonction showThanks
        // appel le script de validation front-end
        
        /* if (validation.isValid){ */
        this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault();
            let validation = new FormValidator(this._el);
            if (validation.isValid){
                let nomUtilisateur = encodeURIComponent(this._el.querySelector('[data-js-param="username"]').value);
				let motPasse = encodeURIComponent(this._el.querySelector('[data-js-param="motPasse"]').value);
				let prenom = encodeURIComponent(this._el.querySelector('[data-js-param="prenom"]').value);
				let nomFamille = encodeURIComponent(this._el.querySelector('[data-js-param="nomFamille"]').value);
				let courriel = encodeURIComponent(this._el.querySelector('[data-js-param="courriel"]').value);
				let dateNaissance = encodeURIComponent(this._el.querySelector('[data-js-param="dateNaissance"]').value);
				let noCivique = Number(encodeURIComponent(this._el.querySelector('[data-js-param="noCivique"]').value));
				let rue = encodeURIComponent(this._el.querySelector('[data-js-param="rue"]').value);
				let codePostal = encodeURIComponent(this._el.querySelector('[data-js-param="codePostal"]').value);
				let telephone = Number(encodeURIComponent(this._el.querySelector('[data-js-param="telephone"]').value));
				let telephonePortable = Number(encodeURIComponent(this._el.querySelector('[data-js-param="telephonePortable"]').value));

				let selecttypeUtilisateur = this._el.querySelector('[data-js-typeutilisateur]');
                let idTypeUtilisateur = Number(encodeURIComponent(selecttypeUtilisateur.options[selecttypeUtilisateur.selectedIndex].value));

				let selectidVille = this._el.querySelector('[data-js-ville]');
                let idVille = Number(encodeURIComponent(selectidVille.options[selectidVille.selectedIndex].value));

				let selectidProvince = this._el.querySelector('[data-js-province]');
                let idProvince = Number(encodeURIComponent(selectidProvince.options[selectidProvince.selectedIndex].value));
                console.log(this._el.querySelector('[data-js-typeutilisateur]').options[this._el.querySelector('[data-js-typeutilisateur]').selectedIndex].value);
                console.log(nomUtilisateur, motPasse, prenom, nomFamille, courriel, dateNaissance, noCivique, rue, codePostal, telephone, telephonePortable, idTypeUtilisateur, idVille, idProvince);

                this.callAJAXAjoutUtilisateur(nomUtilisateur, motPasse, prenom, nomFamille, courriel, dateNaissance, noCivique, rue, codePostal, telephone, telephonePortable, idTypeUtilisateur, idVille, idProvince);
                setTimeout(function(){ 
                    document.location.href='index.php?Magasin&action'; 
                }, 5000);             
            }
            
        });
        this._allUsername.addEventListener('blur', (e) => {
            this.callUseurnameAJAX(this._allUsername.value);
        });
        
    }

    callUseurnameAJAX = (useurname) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('GET', 'index.php?Utilisateur_AJAX&action=validerUsername&useurname=' +useurname);
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
                        let closestElWrapper = this._allUsername.closest('[data-js-input-wrapper]');
                        let elErrorMsg = closestElWrapper.querySelector('[data-js-error-msg]');

                        // Traitement du DOM
                        let reponse = JSON.parse(xhr.responseText);
                        if(reponse == false){
                            closestElWrapper.classList.add('error');
                            elErrorMsg.textContent  = "Le nom d'utilisateur et deja utilise"
                            this._elSubmit.setAttribute("disabled", "disabled");
                        }else{
                            if (closestElWrapper.classList.contains('error')) {
                                closestElWrapper.classList.remove('error');
                                elErrorMsg.textContent  = ""
                                this._elSubmit.removeAttribute("disabled", "disabled");
                                                              
                            }
                        }


                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète
            xhr.send();
        }
        
    }
    callAJAXAjoutUtilisateur = (nomUtilisateur, motPasse, prenom, nomFamille, courriel, dateNaissance, noCivique, rue, codePostal, telephone, telephonePortable, idTypeUtilisateur, idVille, idProvince) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?Utilisateur_AJAX&action=ajoutUtilisateur');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
                        let closestElWrapper = this._allUsername.closest('[data-js-input-wrapper]');
                        let elErrorMsg = closestElWrapper.querySelector('[data-js-error-msg]');

                        // Traitement du DOM
                        let reponse = JSON.parse(xhr.responseText);
                        if(reponse == 1){
                            this._el.innerHTML = "<p>votre compte d'utilisateur a été ajouté</p>"
                        }else{
                            this._el.innerHTML = "<p>probleme ou niveau de l'ajout</p>"
                            setTimeout(function(){ 
                                document.location.href='index.php?Utilisateur&action=creerClient'; 
                            }, 5000);
                        }


                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète

            xhr.send('nomUtilisateur=' + nomUtilisateur + '&motPasse=' + motPasse + '&prenom=' + prenom + '&nomFamille=' + nomFamille + '&dateNaissance=' + dateNaissance + '&noCivique=' + noCivique + '&rue=' + rue + '&codePostal=' + codePostal + '&telephone=' + telephone + '&telephonePortable=' + telephonePortable+  '&courriel=' + courriel + '&idTypeUtilisateur=' + idTypeUtilisateur + '&idVille=' + idVille + '&idProvince=' + idProvince);
        }
        
    }
    

}