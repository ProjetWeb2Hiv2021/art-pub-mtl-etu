class FormulaireMisAjourTypeCarburant{
    constructor(el) {
        this._el = el;
        this._elSubmitMAJ = this._el.querySelector('[data-js-btnMAJ]');
        this._nomTypeCarburant = this._el.querySelector('[data-js-param="typecarburant"]');

        this.init();
    }
    init = (e) => {

        // appel le script de validation front-end
        
        this._elSubmitMAJ.addEventListener('click', (e) => {
            e.preventDefault();
            alert("Mis à jour");
             let validation = new FormValidator(this._el);
            if (validation.isValid){
                let idTypeCarburant = encodeURIComponent(this._el.querySelector('[data-js-param="idTypeCarburant"]').value);
                let nomTypeCarburant = encodeURIComponent(this._el.querySelector('[data-js-param="typeCarburant"]').value);
                this.callAJAX_MisAJour(idTypeCarburant,nomTypeCarburant);                 
            }          
        });
    }

    callAJAX_MisAJour = (idTypeCarburant,nomTypeCarburant) => {
        
        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();
 
        let typecarburant = encodeURIComponent(nomTypeCarburant),
        id = encodeURIComponent(idTypeCarburant);
        
        // Initialisation de la requète
        if (xhr) {	

            xhr.open('POST', 'index.php?TypeCarburant_AJAX&action=miseAJourTypeCarburant');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM
                        
                        let reponse = JSON.parse(xhr.responseText);                        

                        if(reponse == 1){
                            this._el.innerHTML = "<p>Le type de carburant a été modifié</p>"
                            setTimeout(function(){ 
                                document.location.href='index.php?TypeCarburant&action=connexion'; 
                            }, 2000);                           
                        }else{
                            this._el.innerHTML = "<p>probleme ou niveau de la modification</p>"
                             setTimeout(function(){ 
                                document.location.href='index.php?TypeCarburant&action=connexion'; 
                            }, 2000);
                        }                    
                        
                        
                        
                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète
            xhr.send('nomTypeCarburant=' + typecarburant + '&idTypeCarburant=' + id);
        }
    }    

}