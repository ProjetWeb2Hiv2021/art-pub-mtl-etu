class GestionMarque{
    constructor(el) {
        this._el = el;
        this._elSelectMarque = this._el.querySelector('[data-js-marque]');
        this._elSelectFabricant = this._el.querySelector('[data-js-fabricant]');
        this._elSelectStatus = this._el.querySelector('[data-js-status]');
        this._elModif = this._el.querySelector('[data-js-mar]');
        
        console.log(this._elSelectStatus);

        this.elMarqueAmodifier = this._el.querySelector('[data-js-marquemodif]');
        this._elreponse = this._el.querySelector('[data-js-reponse]')

        /* traitement de l'ajout */
        this._elAjout = this._el.querySelector('[data-js-ajoutmarque]');

        this._elSelectFabricantAjout = this._elAjout.querySelector('[data-js-fabricant]');
        this._btnAjoutMarque = this._elAjout.querySelector('[data-js-ajoutmar]');
        this._elSelectStatusAjout = this._elAjout.querySelector('[data-js-status]');
        
        

        this.init();
    }
    init = (e) => {
        this.actuMarqueStatus();
        this.elMarqueAmodifier.value = this._elSelectMarque.options[this._elSelectMarque.selectedIndex].value;
        this._elSelectMarque.addEventListener('change', (e) => {
            this.actuMarqueStatus();
            
            let idFabricant = this._elSelectMarque.options[this._elSelectMarque.selectedIndex].dataset.jsIdfabricant;
            let elMarqueAmodifier = this._el.querySelector('[data-js-marquemodif]');
            elMarqueAmodifier.value= this._elSelectMarque.options[this._elSelectMarque.selectedIndex].value;
            let listeOptionFabricant = this._elSelectFabricant.querySelectorAll('option');
            for (let j = 0; j < listeOptionFabricant.length; j++) {
                
                const option = listeOptionFabricant[j];
                option.removeAttribute('selected');
                if(option.value === idFabricant){
                    option.setAttribute('selected', 'selected');
                }

            }               
        });
        this._elModif.addEventListener('click', (e) => {
            let idMarque = this._elSelectMarque.options[this._elSelectMarque.selectedIndex].dataset.jsIdmarque;
            let nouvelleValeurMarque = this._el.querySelector('[data-js-marquemodif]').value;
            let idFabricant = this._elSelectFabricant.options[this._elSelectFabricant.selectedIndex].dataset.jsIdfabricant;
            let statut = this._elSelectStatus.options[this._elSelectStatus.selectedIndex].value;
            
            let path = "miseAJourMarque";
            let requete = `idMarque=${idMarque}&nouvelleValeurMarque=${nouvelleValeurMarque}&idFabricant=${idFabricant}&statut=${statut}`;
            console.log(requete);
            this.callAJAX(requete, path);

 
        });
        this._btnAjoutMarque.addEventListener('click', (e) => {
            let marque = this._elAjout.querySelector('[data-js-marque]').value;
            let idFabricant = this._elSelectFabricantAjout.options[this._elSelectFabricantAjout.selectedIndex].value;
            let statut = this._elSelectStatusAjout.options[this._elSelectStatusAjout.selectedIndex].value;
            console.log(marque, idFabricant, statut);
            let path = "ajouterMarque";
            let requete = `marque=${marque}&idFabricant=${idFabricant}&statut=${statut}`;
            console.log(requete);
            this.callAJAX(requete, path);
            
        });

    }
    callAJAX = (requete, path) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?Modele_AJAX&action='+path);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
                        let reponse = JSON.parse(xhr.responseText);
                        
                        if(reponse["marqueajour"]){

                            this._elreponse.innerHTML = "la marque a bien été mis à jour";
                            
                        }else if(reponse["marqueajouter"]){
                            this._elreponse.innerHTML = "la marque a bien a bien été ajouté";
                        };
                        setTimeout(() => {
                            this._elreponse.innerHTML= "";
                        }, 4000);
                       
                    }
                }
            });
            // Envoi de la requète

            xhr.send(`${requete}`);
        }
        
    }
    actuMarqueStatus = () => {
        let statusMarque = this._elSelectMarque.options[this._elSelectMarque.selectedIndex].dataset.jsIdstatus;
        let listeOptionstatusMarque= this._elSelectStatus.querySelectorAll('option');

        for (let j = 0; j < listeOptionstatusMarque.length; j++) {
            
            const option = listeOptionstatusMarque[j];
            option.removeAttribute('selected');
            if(option.value === statusMarque){
                option.setAttribute('selected', 'selected');
            }

        } 
    }

}