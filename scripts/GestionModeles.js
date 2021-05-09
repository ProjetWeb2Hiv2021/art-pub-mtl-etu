class GestionModeles{
    constructor(el) {
        this._el = el;
        this._elSelectModele = this._el.querySelector('[data-js-modele]');
        this._elSelectMarque = this._el.querySelector('[data-js-marque]');
        this._elSelectFabricant = this._el.querySelector('[data-js-fabricant]');
        this._elSelectStatus = this._el.querySelector('[data-js-status]');
        this._elModif = this._el.querySelector('[data-js-mod]');
        this._elSuprim = this._el.querySelector('[data-js-sup]');
        console.log(this._elSelectStatus);
        this._elSelectFabricant.setAttribute("disabled", "disabled");
        this.actuModeleStatus();
        /* traitement de l'ajout */
        this._elAjout = this._el.querySelector('[data-js-ajoutmodel]');
        this._elSelectMarqueAjout =  this._elAjout.querySelector('[data-js-marque]');
        this._elSelectFabricantAjout = this._elAjout.querySelector('[data-js-fabricant]');


        this.init();
    }
    init = (e) => {
        this._elSelectModele.addEventListener('change', (e) => {
            
            this.actuModeleStatus();
            let idMarque = this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdmarque;
            let listeOptionMarque = this._elSelectMarque.querySelectorAll('option');
            for (let i = 0; i < listeOptionMarque.length; i++) {
                
                const option = listeOptionMarque[i];
                option.removeAttribute('selected');
                if(option.value === idMarque){
                    option.setAttribute('selected', 'selected');
                    let idFabricant = this._elSelectMarque.options[this._elSelectMarque.selectedIndex].dataset.jsIdfabricant;
                    let listeOptionFabricant = this._elSelectFabricant.querySelectorAll('option');
                    console.log(this._elSelectFabricant.querySelectorAll('option'));
                    for (let j = 0; j < listeOptionFabricant.length; j++) {
                        
                        const option = listeOptionFabricant[j];
                        option.removeAttribute('selected');
                        if(option.value === idFabricant){
                            option.setAttribute('selected', 'selected');
                        }

                    } 
                }

            }    
        });
        this._elModif.addEventListener('click', (e) => {
            let idModele = this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdmarque;
            let idMarque = this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdmarque;
            let idFabricant = this._elSelectMarque.options[this._elSelectMarque.selectedIndex].dataset.jsIdfabricant;
            let status = this._elSelectStatus.options[this._elSelectStatus.selectedIndex].value;
            console.log(status);
            let path = "miseAJourModele";
            let requete = `'idModele='${idModele}'&idMarque='${idMarque}'&idFabricant='${idFabricant}'&status='${status}`
            /* this.callAJAXAMiseAJourModele(requete, path); */
        });
        this._elModif.addEventListener('click', (e) => {
            let idModele = this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdmarque;
            let path = "supprimerModele";
            let requete = `'idModele='${idModele}`
            /* this.callAJAXAMiseAJourModele(requete, path); */
        });
    }
    callAJAXA = (requete, path) => {

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
                       
                       
                    }
                }
            });
            // Envoi de la requète

            xhr.send(requete);
        }
        
    }
    actuModeleStatus = () => {
        let statusModele = this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdstatus;
        let listeOptionstatusModele= this._elSelectStatus.querySelectorAll('option');
        console.log(listeOptionstatusModele);
        for (let j = 0; j < listeOptionstatusModele.length; j++) {
            
            const option = listeOptionstatusModele[j];
            option.removeAttribute('selected');
            if(option.value === statusModele){
                option.setAttribute('selected', 'selected');
            }

        } 
    }

}