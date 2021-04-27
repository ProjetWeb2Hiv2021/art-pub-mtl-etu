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
        ajouterUtilisateur = () => {
        
        }
    }

}