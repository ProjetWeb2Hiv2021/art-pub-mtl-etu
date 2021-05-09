class GestionUtilisateurs{
    constructor(el) {
        this._el = el;
        this._elUtilisateurs = this._el.querySelectorAll('[data-js-utilisateur]');
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
        for (let i = 0; i < this._elUtilisateurs.length; i++) {

            let elUtilisateur = this._elUtilisateurs[i];
            let elNomUtilisateurOrifinal = elUtilisateur.querySelector('[data-js-param="username"]').value;
            let elCourrielOriginal = encodeURIComponent(elUtilisateur.querySelector('[data-js-param="courriel"]').value);
            let elModif = this._el.querySelectorAll('[data-js-mod]');
            let elSuprim = this._el.querySelectorAll('[data-js-sup]');
            console.log(elNomUtilisateurOrifinal);


            console.log(elUtilisateur);

            elModif[i].addEventListener('click', (e) => {  
                e.preventDefault();
                let validation = new FormValidator(this._el);
                let courriel = encodeURIComponent(elUtilisateur.querySelector('[data-js-param="courriel"]').value);
                let nomUtilisateur = encodeURIComponent(elUtilisateur.querySelector('[data-js-param="username"]').value);
               
                if(elNomUtilisateurOrifinal !== nomUtilisateur){
                    let requetAjax = `validerUsername&useurname=${this._allUsername.value}`;
                    this.callUseurnameAJAX(requetAjax, this._allUsername);
                }
    
                if(elCourrielOriginal !== courriel){
                    let requetAjax = `validerCourriel&courriel=${this._allEmailInputs.value}`;
                    this.callUseurnameAJAX(requetAjax, this._allEmailInputs);
                }

               
                let motPasse = encodeURIComponent(elUtilisateur.querySelector('[data-js-param="motPasse"]').value);
                let prenom = encodeURIComponent(elUtilisateur.querySelector('[data-js-param="prenom"]').value);
                let nomFamille = encodeURIComponent(elUtilisateur.querySelector('[data-js-param="nomFamille"]').value);				
                let dateNaissance = encodeURIComponent(elUtilisateur.querySelector('[data-js-param="dateNaissance"]').value);
                let selecttypeUtilisateur = elUtilisateur.querySelector('[data-js-typeUtilisateur]');
    
                let idTypeUtilisateur= Number(encodeURIComponent(selecttypeUtilisateur.options[selecttypeUtilisateur.selectedIndex].value));
                let telephone = Number(encodeURIComponent(elUtilisateur.querySelector('[data-js-param="telephone"]').value));
                let noCivique = Number(encodeURIComponent(elUtilisateur.querySelector('[data-js-param="noCivique"]').value));
                let rue = encodeURIComponent(elUtilisateur.querySelector('[data-js-param="rue"]').value);
                let codePostal = encodeURIComponent(elUtilisateur.querySelector('[data-js-param="codePostal"]').value); 
                let telephonePortable = Number(encodeURIComponent(elUtilisateur.querySelector('[data-js-param="telephonePortable"]').value));    
                let selectidVille = elUtilisateur.querySelector('[data-js-ville]');
                let idVille = Number(encodeURIComponent(selectidVille.options[selectidVille.selectedIndex].value));    
                let selectidProvince = elUtilisateur.querySelector('[data-js-province]');
                let idProvince = Number(encodeURIComponent(selectidProvince.options[selectidProvince.selectedIndex].value)); 
                let idUtilisateur = Number(elUtilisateur.dataset.jsId);

                console.log("modifier");
                console.log(idUtilisateur, nomUtilisateur, motPasse, prenom, nomFamille, courriel, dateNaissance, noCivique, rue, codePostal, telephone, telephonePortable, idTypeUtilisateur, idVille, idProvince);
                if (validation.isValid){
                    this.callAJAXAMiseAJourUtilisateur(idUtilisateur, nomUtilisateur, motPasse, prenom, nomFamille, courriel, dateNaissance, noCivique, rue, codePostal, telephone, telephonePortable, idTypeUtilisateur, idVille, idProvince);
                }
                

            });
            elSuprim[i].addEventListener('click', (e) => {
                e.preventDefault();
                console.log("supp");
                let idUtilisateur = Number(elUtilisateur.dataset.jsId);
                this.callAJAXASupprimerUtilisateur(idUtilisateur);

            });


        }
       
        

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