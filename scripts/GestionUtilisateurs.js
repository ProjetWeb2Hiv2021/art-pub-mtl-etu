class GestionUtilisateurs{
    constructor(el) {
        this._el = el;
        this.elModifier = this._el.querySelector('[data-js-btn]');
        
        this.elSupprimer = this._el.querySelector('[data-js-btn-supp]');
        console.log(this.elSupprimer);
        this.el_selectusername = this._el.querySelector('[data-js-utilisateurs]');
        this.el_username = this._el.querySelector('[data-js-param="username"]');
        this.el_motPasse = this._el.querySelector('[data-js-param="motPasse"]');
        this.el_prenom = this._el.querySelector('[data-js-param="prenom"]');
        this.el_nomFamille = this._el.querySelector('[data-js-param="nomFamille"]');
        this.el_courriel = this._el.querySelector('[data-js-param="courriel"]');       
        this.el_dateNaissance = this._el.querySelector('[data-js-param="dateNaissance"]');
        this.el_selecttypeUtilisateur = this._el.querySelector('[data-js-typeutilisateur]');
        this.el_telephone = this._el.querySelector('[data-js-param="telephone"]');
        this.el_noCivique = this._el.querySelector('[data-js-param="noCivique"]');
        this.el_rue = this._el.querySelector('[data-js-param="rue"]');
        this.el_codePostal = this._el.querySelector('[data-js-param="codePostal"]'); 
        this.el_telephonePortable = this._el.querySelector('[data-js-param="telephonePortable"]');				    
        this.el_selectidVille = this._el.querySelector('[data-js-ville]');
        this.el_selectidProvince = this._el.querySelector('[data-js-province]');
        this._allUsername = this._el.querySelector('[data-js-param="username"]');
        this._allEmailInputs = this._el.querySelector('input[type="email"]');
        this.init();
    }
    init = (e) => {
        
        this.el_selectusername.addEventListener('change', (e) => {
            console.log("change");
            this. popoluerFormulaire();
        });
        this.elModifier.addEventListener('click', (e) => {
            
            e.preventDefault();
            this.modifUtilisateur();
            let nomUtilisateur = encodeURIComponent(this._el.querySelector('[data-js-param="username"]').value);
            let tempDiv = document.createElement('div');
            tempDiv.innerHTML = `l'utilisateur ${nomUtilisateur} a bien été modifié`;

            this._el.insertAdjacentElement("beforeend", tempDiv);
            setTimeout(function(){ 
                document.querySelector('[data-component="GestionUtilisateurs"]').lastElementChild.remove();
                /* this._el.lastElementChild.remove(); */
            }, 5000);  
        });

        this.elSupprimer.addEventListener('click', (e) => {
            
            e.preventDefault();
            console.log("supp");
            let idUtilisateur = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsIdutilisateur;
            this.callAJAXASupprimerUtilisateur(idUtilisateur);
            let nomUtilisateur = encodeURIComponent(this._el.querySelector('[data-js-param="username"]').value);
            let tempDiv = document.createElement('div');
            tempDiv.innerHTML = `l'utilisateur ${nomUtilisateur} a bien été supprimé`;

            this._el.insertAdjacentElement("beforeend", tempDiv);
            setTimeout(function(){ 
                document.querySelector('[data-component="GestionUtilisateurs"]').lastElementChild.remove();
                /* this._el.lastElementChild.remove(); */
            }, 5000); 
                
        });
    }

    modifUtilisateur = () =>{
        let validation = new FormValidator(this._el);
        let courriel = encodeURIComponent(this._el.querySelector('[data-js-param="courriel"]').value);
        let nomUtilisateur = encodeURIComponent(this._el.querySelector('[data-js-param="username"]').value);
      
        if(this.el_username.value !== nomUtilisateur){
            let requetAjax = `validerUsername&useurname=${this._allUsername.value}`;
            this.callUseurnameAJAX(requetAjax, this._allUsername);
        }
        
        if(encodeURIComponent(this.el_courriel.value) !== courriel){
            let requetAjax = `validerCourriel&courriel=${this._allEmailInputs.value}`;
            this.callUseurnameAJAX(requetAjax, this._allEmailInputs);
        }
        let motPasse = encodeURIComponent(this._el.querySelector('[data-js-param="motPasse"]').value);
        let prenom = encodeURIComponent(this._el.querySelector('[data-js-param="prenom"]').value);
        let nomFamille = encodeURIComponent(this._el.querySelector('[data-js-param="nomFamille"]').value);				
        let dateNaissance = encodeURIComponent(this._el.querySelector('[data-js-param="dateNaissance"]').value);
        let selecttypeUtilisateur = this._el.querySelector('[data-js-typeutilisateur]'); 
        let idTypeUtilisateur= Number(encodeURIComponent(selecttypeUtilisateur.options[selecttypeUtilisateur.selectedIndex].value));
        let telephone = Number(encodeURIComponent(this._el.querySelector('[data-js-param="telephone"]').value));
        let noCivique = Number(encodeURIComponent(this._el.querySelector('[data-js-param="noCivique"]').value));
        let rue = encodeURIComponent(this._el.querySelector('[data-js-param="rue"]').value);
        let codePostal = encodeURIComponent(this._el.querySelector('[data-js-param="codePostal"]').value); 
        let telephonePortable = Number(encodeURIComponent(this._el.querySelector('[data-js-param="telephonePortable"]').value));    
        let selectidVille = this._el.querySelector('[data-js-ville]');
        let idVille = Number(encodeURIComponent(selectidVille.options[selectidVille.selectedIndex].value));    
        let selectidProvince = this._el.querySelector('[data-js-province]');
        let idProvince = Number(encodeURIComponent(selectidProvince.options[selectidProvince.selectedIndex].value)); 
        let idUtilisateur = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsIdutilisateur;

        console.log("modifier");
        console.log(idUtilisateur, nomUtilisateur, motPasse, prenom, nomFamille, courriel, dateNaissance, noCivique, rue, codePostal, telephone, telephonePortable, idTypeUtilisateur, idVille, idProvince);
        if (validation.isValid){
            this.callAJAXAMiseAJourUtilisateur(idUtilisateur, nomUtilisateur, motPasse, prenom, nomFamille, courriel, dateNaissance, noCivique, rue, codePostal, telephone, telephonePortable, idTypeUtilisateur, idVille, idProvince);
        }
    }

    popoluerFormulaire = () =>{

       
        let idtypeUtilisateur =  this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsIdtypeutilisateur;
        console.log(idtypeUtilisateur);
        let listetypeUtilisateur = this.el_selecttypeUtilisateur.querySelectorAll('option');
        for (let j = 0; j < listetypeUtilisateur.length; j++) {
            
            const option = listetypeUtilisateur[j];
            option.removeAttribute('selected');
            if(option.value === idtypeUtilisateur){
                option.setAttribute('selected', 'selected');
            }

        }
        let idVille =  this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsIdville;
        console.log(idVille);
        let idProvince =  this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsIdprovince;
        let listeville = this.el_selectidVille.querySelectorAll('option');
        let listeprovince =  this.el_selectidProvince.querySelectorAll('option');
        for (let j = 0; j < listetypeUtilisateur.length; j++) {
                
            const option = listetypeUtilisateur[j];
            option.removeAttribute('selected');
            if(option.value === idtypeUtilisateur){
                option.setAttribute('selected', 'selected');
            }

        }
        for (let j = 0; j < listeville.length; j++) {
                
            const option = listeville[j];
            option.removeAttribute('selected');
            if(option.value === idVille){
                option.setAttribute('selected', 'selected');
            }

        }
        for (let j = 0; j < listeprovince.length; j++) {
                
            const option = listeprovince[j];
            option.removeAttribute('selected');
            if(option.value === idProvince){
                option.setAttribute('selected', 'selected');
            }

        }
        console.log(this.el_username);

        this.el_username.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsUsername;
       /*  this.el_motPasse.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsMotpasse; */
        this.el_prenom.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsPrenom;
        this.el_nomFamille.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsNomfamille;
        this.el_courriel.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsCourriel;   
        this.el_dateNaissance.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsDatenaissance;
        this.el_telephone.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsTelephone;
        this.el_noCivique.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsNocivique;
        this.el_rue.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsRue;
        this.el_codePostal.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsCodepostal;
        this.el_telephonePortable.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsTelephoneportable;		    
        
          
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