class FormulaireAjoutFabricant{
    constructor(el) {
        this._el = el;
        this._elSubmit = this._el.querySelector('[data-js-btn]');
        this._elSubmitMAJ = this._el.querySelector('[data-js-btnMAJ]');
        this._nomFabricant = this._el.querySelector('[data-js-param="fabricant"]');

        this.init();
    }
    init = (e) => {

        // appel le script de validation front-end
        
        this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault();
            let validation = new FormValidator(this._el);
            if (validation.isValid){
                let nomFabricant = encodeURIComponent(this._el.querySelector('[data-js-param="fabricant"]').value);
                this.callAJAXAjoutFabricant(nomFabricant);                 
            }            
        });



    }


    callAJAXAjoutFabricant = (nomFabricant) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?Fabricant_AJAX&action=ajoutFabricant');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
                        let closestElWrapper = this._nomFabricant.closest('[data-js-input-wrapper]');
                        let elErrorMsg = closestElWrapper.querySelector('[data-js-error-msg]');

                        // Traitement du DOM
                        let reponse = JSON.parse(xhr.responseText);
                        if(reponse == 1){
                            this._el.innerHTML = "<p>Le fabricant a été ajouté</p>"
                            setTimeout(function(){ 
                                document.location.href='index.php?Fabricant&action=connexion'; 
                            }, 2000);
                        }else{
                            this._el.innerHTML = "<p>probleme ou niveau de l'ajout</p>"
                             setTimeout(function(){ 
                                document.location.href='index.php?Fabricant&action=connexion'; 
                            }, 2000);
                        }


                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète

            xhr.send('nomFabricant=' + nomFabricant);
        }
        
    }

    

}