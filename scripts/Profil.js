class Profil{
    constructor(el) {
        this._el = el;
        this._elSubmit = this._el.querySelector('[data-js-btn]');
        this._elVoitures = document.querySelector('[data-component="VoitureListe"]');
        this._elSelectVille = this._el.querySelector('[data-js-ville]');
        this._elSelectProvince= this._el.querySelector('[data-js-province]');
        this._elSelectTypeUtilisateur = this._el.querySelector('[data-js-typeutilisateur]');
        this._elNomUtilisateurOrifinal = this._el.querySelector('[data-js-param="username"]').value;
        this._elCourrielOriginal = encodeURIComponent(this._el.querySelector('[data-js-param="courriel"]').value);
        this._elbtnSupp = this._el.querySelector('[data-js-btn-supp]');
        console.log(this._elSubmit);
        // récupère élément username
        this._allUsername = this._el.querySelector('[data-js-param="username"]');
        this._allEmailInputs = this._el.querySelector('input[type="email"]');

        this.init();
    }
    init = (e) => {
        /* au change le btn recherche s'active */
        // si le formulaire est valide, appelle la fonction showThanks
        // appel le script de validation front-end
        
        /* if (validation.isValid){ */
        this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault();
            console.log("panier");
            let nomUtilisateur = encodeURIComponent(this._el.querySelector('[data-js-param="username"]').value);
            let courriel = encodeURIComponent(this._el.querySelector('[data-js-param="courriel"]').value);
            let validation = new FormValidator(this._el);
            if(this._elNomUtilisateurOrifinal !== nomUtilisateur){
                let requetAjax = `validerUsername&useurname=${this._allUsername.value}`;
                this.callUseurnameAJAX(requetAjax, this._allUsername);
            }

            if(this._elCourrielOriginal !== courriel){
                let requetAjax = `validerCourriel&courriel=${this._allEmailInputs.value}`;
                this.callUseurnameAJAX(requetAjax, this._allEmailInputs);
            }

            if (validation.isValid){
                
				let motPasse = encodeURIComponent(this._el.querySelector('[data-js-param="motPasse"]').value);
				let prenom = encodeURIComponent(this._el.querySelector('[data-js-param="prenom"]').value);
				let nomFamille = encodeURIComponent(this._el.querySelector('[data-js-param="nomFamille"]').value);
				
				let dateNaissance = encodeURIComponent(this._el.querySelector('[data-js-param="dateNaissance"]').value);
                let selecttypeUtilisateur = this._el.querySelector('[data-js-typeutilisateur]');
                let idTypeUtilisateur=1;
                if(selecttypeUtilisateur !== null){
                    idTypeUtilisateur = Number(encodeURIComponent(selecttypeUtilisateur.options[selecttypeUtilisateur.selectedIndex].value));
                }
                console.log(selecttypeUtilisateur);

				let telephone = Number(encodeURIComponent(this._el.querySelector('[data-js-param="telephone"]').value));
                let noCivique = Number(encodeURIComponent(this._el.querySelector('[data-js-param="noCivique"]').value));
                let rue = encodeURIComponent(this._el.querySelector('[data-js-param="rue"]').value);
                let codePostal = encodeURIComponent(this._el.querySelector('[data-js-param="codePostal"]').value); 
                let telephonePortable = Number(encodeURIComponent(this._el.querySelector('[data-js-param="telephonePortable"]').value));				
                 
                let selectidVille = this._el.querySelector('[data-js-ville]');
                let idVille = Number(encodeURIComponent(selectidVille.options[selectidVille.selectedIndex].value));    
                console.log(idVille);
                let selectidProvince = this._el.querySelector('[data-js-province]');
                let idProvince = Number(encodeURIComponent(selectidProvince.options[selectidProvince.selectedIndex].value)); 
                let idUtilisateur = Number(this._el.querySelector('[data-js-id]').dataset.jsId);
                console.log(idUtilisateur, nomUtilisateur, motPasse, prenom, nomFamille, courriel, dateNaissance, noCivique, rue, codePostal, telephone, telephonePortable, idTypeUtilisateur, idVille, idProvince);
                this.callAJAXAMiseAJourUtilisateur(idUtilisateur, nomUtilisateur, motPasse, prenom, nomFamille, courriel, dateNaissance, noCivique, rue, codePostal, telephone , telephonePortable, idTypeUtilisateur, idVille, idProvince);
                /* setTimeout(function(){ 
                    document.location.href='index.php?'; 
                }, 5000); */
    
            }
            this._elbtnSupp.addEventListener('click', (e) => {
                e.preventDefault();
                console.log("suppr");
                let idUtilisateur = Number(this._el.querySelector('[data-js-id]').dataset.jsId);
                this.callAJAXASupprimerUtilisateur(idUtilisateur);
                this._el.inneHTML = "<p>Votre compte a bien été supprimé";
                setTimeout(function(){ 
                    document.location.href='index.php?'; 
                }, 5000);
            });
            
        });

    }

    callUseurnameAJAX = (useurname, input) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('GET', 'index.php?Utilisateur_AJAX&action='+useurname);
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
                        let closestElWrapper = input.closest('[data-js-input-wrapper]');
                        let elErrorMsg = closestElWrapper.querySelector('[data-js-error-msg]');

                        // Traitement du DOM
                        let reponse = JSON.parse(xhr.responseText);
                        if(reponse == false){
                            closestElWrapper.classList.add('error');
                            elErrorMsg.textContent  = "Déjà utilisé"
                            
                        }else{
                            if (closestElWrapper.classList.contains('error')) {
                                closestElWrapper.classList.remove('error');
                                elErrorMsg.textContent  = ""
                                
                                                              
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
    callAJAXAMiseAJourUtilisateur = (idUtilisateur, nomUtilisateur, motPasse, prenom, nomFamille, courriel, dateNaissance, noCivique, rue, codePostal, telephone, telephonePortable, idTypeUtilisateur, idVille, idProvince) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?Utilisateur_AJAX&action=miseAJourUtilisateur');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                       let html = "<div data-js-reponse style='text-align:center;color:green'>Votre profil a bien été modifié ."
                       
                       this._el.insertAdjacentHTML("beforeend", html);
                       this._elSubmit.setAttribute("disabled", "disabled");
                       setTimeout(() => {
                        
                            this._elSubmit.removeAttribute("disabled");
                            this._el.querySelector('[data-js-reponse]').remove();
                            console.log(this._el.querySelector('[data-js-commande]'));
                            if(this._el.querySelector('[data-js-commande]')){
                                window.location.href = `index.php?Magasin&action=commande&nomUtilisateur=${this._elNomUtilisateurOrifinal}`;
                            } 
                        }, 4000);

                    }
                }
            });
            // Envoi de la requète

            xhr.send('idUtilisateur=' + idUtilisateur + '&nomUtilisateur=' + nomUtilisateur + '&motPasse=' + motPasse + '&prenom=' + prenom + '&nomFamille=' + nomFamille + '&courriel=' + courriel + '&dateNaissance=' + dateNaissance + '&noCivique=' + noCivique + '&rue=' + rue + '&codePostal=' + codePostal + '&telephone=' + telephone + '&telephonePortable=' + telephonePortable+ '&idTypeUtilisateur=' + idTypeUtilisateur + '&idVille=' + idVille + '&idProvince=' + idProvince);
        }
        
    }

    callAJAXASupprimerUtilisateur = (idUtilisateur) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?Utilisateur_AJAX&action=supprimerUtilisateur');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
                       
                       
                    }
                }
            });
            // Envoi de la requète

            xhr.send('idUtilisateur=' + idUtilisateur);
        }
        
    }
    

}