class VoirPlus {
    constructor(el) {
        this._el = el;
        this._elBtn = this._el.querySelector('[data-js-voir-plus]');
        this._elNombreDeVoitures = Number(document.querySelector('[data-js-voiture-nombre]').dataset.jsVoitureNombre);
        this._nbrVoitureAcceuil = 12;
        this._elSelectVoitures = document.querySelector('[data-component="VoitureListe"]');
        this.init();
    }

    init = (e) => {
        this._elBtn.addEventListener('click', (e) => {
            e.preventDefault();
            let nombreDeVoituresAffiches = document.querySelectorAll('[data-js-voiture-nbr]').length;
            
            if(nombreDeVoituresAffiches < this._elNombreDeVoitures){
                this.showMore(nombreDeVoituresAffiches);
                
            }            

            if(document.querySelectorAll('[data-js-voiture-nbr]').length + this._nbrVoitureAcceuil  >= this._elNombreDeVoitures) {
                
                this._el.classList.add('hidden');
                console.log(this._el.classList);
            }
            

        });
    }

    showMore = (nombreDeVoituresAffiches) => {
        
        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('GET', 'index.php?Magasin_AJAX&action=voirPlus&offset=' + nombreDeVoituresAffiches);
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM
                        let reponse = JSON.parse(xhr.responseText);
                        let html = "";
                        for (let j = 0; j < reponse.length; j++) {
                            
                            
                            html +=`<article class="voiture_liste__voiture" 
                                data-js-voiture
                                data-js-voiture-nbr
                                data-js-voiture-id="${reponse[j]["idVoiture"]}" 
                                data-js-voiture-vin="${reponse[j]["vin"]}"
                                data-js-voiture-prixVente="${reponse[j]["prixVente"]}"
                                data-js-voiture-km="${reponse[j]["km"]}" 
                                data-js-voiture-annee="${reponse[j]["annee"]}" 
                                data-js-voiture-modele="${reponse[j]["idModele"]}" 
                                data-js-voiture-modele="${reponse[j]["couleur"]}" 
                                data-js-voiture-prix="${reponse[j]["prixPaye"]}" 
                                data-js-voiture-groupeMotopropulseur="${reponse[j]["groupeMotopropulseur"]}" 
                                data-js-voiture-modele="${reponse[j]["modele"]}"
                                data-js-voiture-marque="${reponse[j]["marque"]}"
                                data-js-voiture-fabricant="${reponse[j]["fabricant"]}"
                                data-js-voiture-statut="${reponse[j]["statut"]}"
                                data-component="Voiture"
                            >
                    
                                <div class="voiture_liste__image-wrapper">
                                    <img src="${reponse[j]["cheminFichier"]}" alt="" class="voiture_liste__image">
                                </div> 
                                <div class = "info_voiture">                                    
                                    <h2>${reponse[j]["marque"]}&nbsp;${reponse[j]["modele"]}</h2>                                    
                                    <h3>`+new Intl.NumberFormat().format(reponse[j]["prixVente"])+`&nbsp;$</h3>
                                    <span>${reponse[j]["annee"]}</span>                             
                                    <span>`+new Intl.NumberFormat().format(reponse[j]["km"])+` Km</span>
                                    <span>${reponse[j]["groupeMotopropulseur"]}</span>
                                </div>             
                            </article>`;
                            
                            
                        }
                        this._elSelectVoitures.insertAdjacentHTML("beforeend", html);
                        this.gestionDetailsVoiture();

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
    
        let voitures = document.querySelectorAll('[data-component="Voiture"]');

        for (let k = 0; k < voitures.length; k++) {
            const voiture = voitures[k];
            new Voiture(voiture);
            
        }
    }
}