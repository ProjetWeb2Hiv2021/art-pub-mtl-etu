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
            if (this._elSelect.options[this._elSelect.selectedIndex].value != 0) this._elSubmit.classList.remove('disabled');
            else this._elSubmit.classList.add('disabled');

        });


        this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault();
            document.querySelector('[data-component="VoirPlus"]').classList.add("hidden");
            let value = this._elSelect.options[this._elSelect.selectedIndex].value;
            this.elBtnRetour.classList.remove("hidden");

            let param = "";
            if(value === "annee"){
                param = `filtrerParAnnee`;
            }else if(value === "marque"){
                param = `filtrerParMarque`;
            }else if(value === "modele"){
                param = `filtrerParModele`;
            }
            console.log(param);

            this.callAJAX(param);

            this.gestionDetailsVoiture();
            
            /* this.callAJAX(value); */
        });
        this.elBtnRetour.addEventListener('click', (e) => {
            document.location.href='index.php?'; 
        });
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
                       
    // Traitement du DOM
                        let reponse = JSON.parse(xhr.responseText);
                        console.log(reponse);
                        this._elVoitures.innerHTML="";
                        
                        let html = "";
                        if(reponse.length >0){
                        
                        for (let j = 0; j < reponse.length; j++) {
                                let idVoiture = reponse[j]["idVoiture"];
                                let vin = reponse[j]["vin"];
                                let prixVente = reponse[j]["prixVente"];
                                let annee = reponse[j]["annee"];
                                let dateArrivee = reponse[j]["dateArrivee"];
                                let km = reponse[j]["km"];
                                let groupeMotopropulseur = reponse[j]["groupeMotopropulseur"];
                                let marque = reponse[j]["marque"];
                                let statut = reponse[j]["statut"];

                                let modele = reponse[j]["modele"];
                                let fabricant = reponse[j]["fabricant"];
                                let couleur = reponse[j]["couleur"];
                                let cheminFichier = reponse[j]["cheminFichier"];
                                let chassis = reponse[j]["chassis"];
                                
                        
                            
                                
                                html += `<article class="voiture_liste__voiture" 
                                data-js-voiture
                                data-js-voiture-id="${idVoiture}" 
                                data-js-voiture-vin="${vin}"
                                data-js-voiture-prixVente="${prixVente}"
                                data-js-voiture-km="${km}" 
                                data-js-voiture-annee="${annee}" 
                                data-js-voiture-modele="${modele}" 
                                data-js-voiture-prix="${prixVente}" 
                                data-js-voiture-groupeMotopropulseur="${groupeMotopropulseur}" 
                                data-js-voiture-marque="${marque}"
                                data-js-voiture-fabricant="${fabricant}"
                                data-js-voiture-statut="${statut}"
                                data-component="Voiture"
                                >
                                <div class="voiture_liste__image-wrapper">
                                <img src="${cheminFichier}" alt="" class="voiture_liste__image">
                                </div> 
                                <div class = "info_voiture">
                                    <h2>${marque}</h2>
                                    <h2>${modele}</h2>
                                    <h3>${prixVente}&nbsp;$</h3>
                                    <span>${annee}</span><br>                             
                                    <span>${km} Km</span><br>               
                                    <span>${groupeMotopropulseur}</span><br>
                                </div>             
                                </article>`
                                
                            }
                            this._elVoitures.innerHTML = html;
                            this.gestionDetailsVoiture();

                        }else{
                            let htmlErr = "";

                            htmlErr += `<p>Pas de voiture disponible pour cette recherche</p>`;
                            this._elVoitures.innerHTML = htmlErr;
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
    gestionDetailsVoiture = () =>{
    
        let voitures = this._elVoitures.querySelectorAll('[data-component="Voiture"]');
        for (let k = 0; k < voitures.length; k++) {
            const voiture = voitures[k];
            new Voiture(voiture);
            
        }
    }
}