class Modele {
    constructor(el) {
        this._el = el;
        /* Détail du modele */
        this._modele = this._el.querySelector('[data-js-modele]');
        this._marque = this._el.querySelector('[data-js-modele-marque]');
        this._fabricant = this._el.querySelector('[data-js-modele-fabricant]');
        this._parent = this._el.parentElement;
        this._valeur = 0;
        this.init();
    }

    init = (e) => {
        
        this._fabricant.addEventListener('change', (e) => {
            e.preventDefault();                
            this.callAJAX_Fabricant(e.target.value);
            this._marque.value=0;
            this._marque.classList.remove("disabled");
            this._modele.value=0;
            this._modele.classList.remove("disabled");
           
        });
        this._marque.addEventListener('change', (e) => {
            e.preventDefault();
            //console.log(this._marque.value);
            this.callAJAX_Marque(e.target.value);
            this._modele.value=0;
            this._modele.classList.remove("disabled");
           
        });
        this._modele.addEventListener('change', (e) => {
            e.preventDefault();
            
            if(e.target.value==="0"){
                this._marque.value=0;
                this._marque.classList.remove("disabled");    
                this._fabricant.value=0;
                this._fabricant.classList.remove("disabled");
            }else{
                this.callAJAX_Modele(e.target.value);
            }
            
            
           
           
        });
    }

    callAJAX_Modele = (param) => {
        
        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();
        
        // Initialisation de la requète
        if (xhr) {	
            //console.log(param);    
            // Ouverture de la requète : fichier recherché

            xhr.open('GET', 'index.php?Modele_AJAX&action=synchroniserListesModele&idModele=' + param);
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM
                        //this._elResults.innerHTML = xhr.responseText;
                        
                        let data = JSON.parse(xhr.responseText);
                        
                        if(this._modele===0){
                            
                        }else{
                            this._marque.value = data.laMarque.idMarque;
                            this._marque.classList.add("disabled");
                            this._fabricant.value = data.leFabricant.idFabricant;
                            this._fabricant.classList.add("disabled");
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
    callAJAX_Fabricant = (param) => {
        
        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();
        
        // Initialisation de la requète
        if (xhr) {	
            //console.log(param);    
            // Ouverture de la requète : fichier recherché

            xhr.open('GET', 'index.php?Modele_AJAX&action=synchroniserListesFabricant&idFabricant=' + param);
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM
                        
                        let reponse = JSON.parse(xhr.responseText);                        

                        //this._marque.innerHTML = ;
                        let chaine = "<option value='0'>Choisir Marque</option>";
                        for (let i =0; i<reponse["marque"].length;i++){
                            chaine+=`<option value=${reponse['marque'][i].idMarque}>${reponse['marque'][i].marque}</option>`
                        }
                        this._marque.innerHTML = chaine;
                        chaine = "<option value='0'>Choisir Modele</option>";
                        for (let i =0; i<reponse["modele"].length;i++){
                            chaine+=`<option value=${reponse['modele'][i].idModele}>${reponse['modele'][i].modele}</option>`
                        }
                        this._modele.innerHTML = chaine;                      
                        
                        
                        
                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète
            xhr.send();
        }
    }
    callAJAX_Marque = (param) => {
        
        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();
        
        // Initialisation de la requète
        if (xhr) {	
            //console.log(param);    
            // Ouverture de la requète : fichier recherché

            xhr.open('GET', 'index.php?Modele_AJAX&action=synchroniserListesMarque&idMarque=' + param);
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM
                        
                        
                        let reponse = JSON.parse(xhr.responseText);                        
                        
                        let chaine = "<option value='0'>Choisir Modele</option>";
                        for (let i =0; i<reponse["modele"].length;i++){
                            chaine+=`<option value=${reponse['modele'][i].idModele}>${reponse['modele'][i].modele}</option>`
                        }
                        this._modele.innerHTML = chaine;                      
                        
                        
                        
                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète
            xhr.send();
        }
    }
}