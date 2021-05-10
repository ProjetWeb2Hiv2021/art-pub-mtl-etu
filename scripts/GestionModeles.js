class GestionModeles{
    constructor(el) {
        this._el = el;
        this._elSelectModele = this._el.querySelector('[data-js-modele]');
        this._elSelectMarque = this._el.querySelector('[data-js-marque]');
        this._elSelectFabricant = this._el.querySelector('[data-js-fabricant]');
        this._elSelectStatus = this._el.querySelector('[data-js-status]');
        this._elModif = this._el.querySelector('[data-js-mod]');
        
        console.log(this._elSelectStatus);
        this._elSelectFabricant.setAttribute("disabled", "disabled");
        this.elModeleAmodifier = this._el.querySelector('[data-js-modelemodif]');
        this._elreponse = this._el.querySelector('[data-js-reponse]')
        console.log(this._elreponse);
        this.actuModeleStatus();
        /* traitement de l'ajout */
        this._elAjout = this._el.querySelector('[data-js-ajoutmodel]');

        this._elSelectMarqueAjout =  this._elAjout.querySelector('[data-js-marque]');
        this._elSelectFabricantAjout = this._elAjout.querySelector('[data-js-fabricant]');
        this._btnAjoutModele = this._elAjout.querySelector('[data-js-ajoutmod]');
        this._elSelectFabricantAjout.setAttribute("disabled", "disabled");
        this._elSelectStatusAjout = this._elAjout.querySelector('[data-js-status]');
        
        

        this.init();
    }
    init = (e) => {
        this.elModeleAmodifier.value= this._elSelectModele.options[this._elSelectModele.selectedIndex].value;
        this._elSelectModele.addEventListener('change', (e) => {
            
            this.actuModeleStatus();
            let idMarque = this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdmarque;
            let elModeleAmodifier = this._el.querySelector('[data-js-modelemodif]');
            elModeleAmodifier.value= this._elSelectModele.options[this._elSelectModele.selectedIndex].value;
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
            let nouvelleValeurModel = this._el.querySelector('[data-js-modelemodif]').value;
            let idMarque = this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdmarque;
            let idFabricant = this._elSelectMarque.options[this._elSelectMarque.selectedIndex].dataset.jsIdfabricant;
            let status = this._elSelectStatus.options[this._elSelectStatus.selectedIndex].value;
            
            let path = "miseAJourModele";
            let requete = `idModele=${idModele}&nouvelleValeurModel=${nouvelleValeurModel}&idMarque=${idMarque}&status=${status}`;
            console.log(requete);
            this.callAJAX(requete, path);

 
        });

        /* ajout  modele*/
        this._btnAjoutModele.addEventListener('click', (e) => {
            let modele = this._elAjout.querySelector('[data-js-modele]').value;
            let idMarque =  this._elSelectMarqueAjout.options[this._elSelectMarqueAjout.selectedIndex].value;
            let idFabricant = this._elSelectFabricantAjout.options[this._elSelectFabricantAjout.selectedIndex].value;
            let status = this._elSelectStatusAjout.options[this._elSelectStatusAjout.selectedIndex].value;
            console.log(modele, idMarque, idFabricant, status);
            let path = "ajouterModele";
            let requete = `modele=${modele}&idMarque=${idMarque}&status=${status}`;
            console.log(requete);
            this.callAJAX(requete, path);
            
        });
        this._elSelectMarqueAjout.addEventListener('change', (e) => {
            console.log("change");

            let idFabricant = this._elSelectMarqueAjout.options[this._elSelectMarqueAjout.selectedIndex].dataset.jsIdfabricant;
            let listeOptionFabricantAjout = this._elSelectFabricantAjout.querySelectorAll('option');
            for (let j = 0; j < listeOptionFabricantAjout.length; j++) {
                
                const option = listeOptionFabricantAjout[j];
                option.removeAttribute('selected');
                if(option.value === idFabricant){
                    option.setAttribute('selected', 'selected');
                }

            }
          
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
                        
                        if(reponse["modeleajour"]){

                            this._elreponse.innerHTML = "le modele a bien été mis à jour";
                            
                        }else if(reponse["modeleajouter"]){
                            this._elreponse.innerHTML = "le modele a bien a bien été ajouté";
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