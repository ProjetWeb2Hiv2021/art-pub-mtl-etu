class FiltrerUnCritere {
    constructor(el) {
        this._el = el;
        this._elSelect = this._el.querySelector('select');
        this._elSubmit = this._el.querySelector('[data-js-btn]');
        this._elVoitures = document.querySelector('[data-component="VoitureListe"]');
        this.elBtnRetour = document.querySelector('[data-js-retour-acceuil]');

       
        this.init();
    }

    init = (e) => {
        
        this._el.addEventListener('change', (e) => {
            e.preventDefault();
            console.log("lyes1");
            if (this._elSelect.options[this._elSelect.selectedIndex].value != 0) this._elSubmit.classList.remove('disabled');
            else this._elSubmit.classList.add('disabled');
        });


        this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault();
            document.querySelector('[data-component="VoirPlus"]').classList.add("hidden");
            let value = this._elSelect.options[this._elSelect.selectedIndex].value;
            this.elBtnRetour.classList.remove("hidden");
            
            this.filtre(value);
            /*this.trier(value);*/
            this.gestionDetailsVoiture();
            
            /* this.callAJAX(value); */
        });
        this.elBtnRetour.addEventListener('click', (e) => {
            document.location.href='index.php?'; 
        });
    }

    /* Methode filtrer par parametre je dois encore le refacto c est une v0 */
    filtre = (param) => {
        
        let listeVoitures =  this._elVoitures.querySelectorAll('[data-js-voiture]');
        console.log(listeVoitures.length);
        let listeAnnees = [];
        let listeFabricants = [];
        let listeModeles = [];  
        let ajouterListe = false;
        if(param === "annee"){

        
            for (let i = 0; i < listeVoitures.length; i++) {
                const voiture = listeVoitures[i];
                console.log(listeAnnees.length);
                if(listeAnnees.length > 0){
                    
                    for (let j = 0; j < listeAnnees.length; j++) {
                        const element = listeAnnees[j];
                        if(element == voiture.dataset.jsVoitureAnnee){
                            ajouterListe = true;
                            
                        }
                        
                    }
                    if(ajouterListe !== true){
                        listeAnnees.push(voiture.dataset.jsVoitureAnnee);
                        ajouterListe = false;
                    }
                    ajouterListe = false;
                }else if(listeAnnees.length == 0){
                    listeAnnees.push(voiture.dataset.jsVoitureAnnee);                  
                } 
                
            }

            //Trier le vecteur: listeAnnees par ann�e: ordre ascendant
            let varInt= 0;
            for (let j = 0; j < listeAnnees.length-1; j++) {               
                for (let i = j+1 ; i < listeVoitures.length; i++) {
                    if(listeAnnees[j] > listeAnnees[i]){
                        varInt = listeAnnees[j];
                        listeAnnees[j] = listeAnnees[i];
                        listeAnnees[i] = varInt;
                    }                   
                }     
            }



            //let html = `<div>`;
            let html = ``;
            for (let j = 0; j < listeAnnees.length; j++) {
                const annee = listeAnnees[j];
                //html += `<div data-je-filtre-annee=${annee}><h2>${annee}</h2>`;
                for (let i = 0; i < listeVoitures.length; i++) {
                    const voiture = listeVoitures[i];
                    if(voiture.dataset.jsVoitureAnnee == annee){
                        html += `${voiture.outerHTML}`;
                    }
                    
                }   
               //html += `</div>`;      
            }

            let sectionVoitures= document.querySelector('[data-component="VoitureListe"]');
            sectionVoitures.innerHTML = html;          
        }else if(param === "fabricant"){
        
            for (let i = 0; i < listeVoitures.length; i++) {
                const voiture = listeVoitures[i];
                console.log(listeFabricants.length);
                if(listeFabricants.length > 0){
                    
                    for (let j = 0; j < listeFabricants.length; j++) {
                        const element = listeFabricants[j];
                        if(element == voiture.dataset.jsVoitureFabricant){
                            ajouterListe = true;
                            console.log("deuxeme tour");
                        }
                        
                    }
                    if(ajouterListe !== true){
                        listeFabricants.push(voiture.dataset.jsVoitureFabricant);
                    
                    }
                    ajouterListe = false;
                }else if(listeFabricants.length == 0){
                    listeFabricants.push(voiture.dataset.jsVoitureFabricant);                  
                } 
                
            }
            console.log(listeFabricants);
            let html = `<div>`;
            for (let j = 0; j < listeFabricants.length; j++) {
                const fabricant = listeFabricants[j];
                html += `<div data-je-filtre-fabricant=${fabricant}><h2>${fabricant}</h2>`;
                for (let i = 0; i < listeVoitures.length; i++) {
                    const voiture = listeVoitures[i];
                    if(voiture.dataset.jsVoitureFabricant == fabricant){
                        html += `${voiture.outerHTML}`;
                    }
                    
                }   
                html += `</div>`;      
            }
            console.log(html);  
            let sectionVoitures= document.querySelector('[data-component="VoitureListe"]');
            sectionVoitures.innerHTML = html;
        }else if(param === "modele"){
        
            for (let i = 0; i < listeVoitures.length; i++) {
                const voiture = listeVoitures[i];
                console.log(listeModeles.length);
                if(listeModeles.length > 0){
                    
                    for (let j = 0; j < listeModeles.length; j++) {
                        const element = listeModeles[j];
                        if(element == voiture.dataset.jsVoitureModele){
                            ajouterListe = true;
                            console.log("deuxeme tour");
                        }
                        
                    }
                    if(ajouterListe !== true){
                        listeModeles.push(voiture.dataset.jsVoitureModele);
                    
                    }
                    ajouterListe = false;
                }else if(listeModeles.length == 0){
                    listeModeles.push(voiture.dataset.jsVoitureModele);                  
                } 
                
            }
            console.log(listeModeles);
            let html = `<div>`;
            for (let j = 0; j < listeModeles.length; j++) {
                const modele = listeModeles[j];
                html += `<div data-je-filtre-modele=${modele}><h2>${modele}</h2>`;
                for (let i = 0; i < listeVoitures.length; i++) {
                    const voiture = listeVoitures[i];
                    if(voiture.dataset.jsVoitureModele == modele){
                        html += `${voiture.outerHTML}`;
                    }
                    
                }   
                html += `</div>`;      
            }
            console.log(html);  
            let sectionVoitures= document.querySelector('[data-component="VoitureListe"]');
            sectionVoitures.innerHTML = html;
        }
    }

    /* le code si dessous est juste au cas ou nous decidions de faire un appel ajax au lieu d'un tri comme plus haut */

    callAJAX = (param) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('GET', 'index.php?Magasin_AJAX&action=' + param);
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM
                        this._elResults.innerHTML = xhr.responseText;


                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète
            xhr.send();
        }
    }
    gestionDetailsVoiture = () =>{
    
        let voitures = this._elVoitures.querySelectorAll('[data-component="Voiture"]');
        for (let k = 0; k < voitures.length; k++) {
            const voiture = voitures[k];
            new Voiture(voiture);
            
        }
    }
}