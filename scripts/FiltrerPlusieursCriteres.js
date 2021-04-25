class FiltrerPlusieursCriteres{
    constructor(el) {
        this._el = el;
        this._elSubmit = this._el.querySelector('[data-js-btn]');
        this._elSelectModele = this._el.querySelector('[data-js-modele]');
        this._elSelectFabricant = this._el.querySelector('[data-js-fabricant]');
        this._elInputs= this._el.querySelectorAll('input');
        this._elMinAnnee = this._el.querySelector('[data-component="anneeMin"]'); 
        this._elMaxAnnee = this._el.querySelector('[data-component="anneeMax"]'); 
        this._elMinPrix = this._el.querySelector('[data-component="prixMin"]'); 
        this._elMaxPrix = this._el.querySelector('[data-component="prixMax"]'); 
        this._elVoitures = document.querySelector('[data-component="VoitureListe"]');


        this.init();
    }
    init = (e) => {
        /* au change le btn recherche s'active */
        this._el.addEventListener('change', (e) => {
            e.preventDefault();
            if (this._elSelectModele.options[this._elSelectModele.selectedIndex].value != 0) this._elSubmit.classList.remove('disabled');
            else this._elSubmit.classList.add('disabled');
            if (this._elSelectFabricant.options[this._elSelectFabricant.selectedIndex].value != 0) this._elSubmit.classList.remove('disabled');
            else this._elSubmit.classList.add('disabled');
            for (let i = 0; i <  this._elInputs.length; i++) {
                const input =  this._elInputs[i];
                if (input.value >= 0) this._elSubmit.classList.remove('disabled');
                else this._elSubmit.classList.add('disabled');
                console.log(input.value);
            }
        });
        this.populerSelectFabricant();
        this.populerSelectModele();
        this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault();
            this.populerListeVoitureRecherche();
        });
    }

    populerSelectFabricant = () => {
        this._elSelectModele.addEventListener('change', (e) => {
            this._elSelectFabricant.removeAttribute("disabled")
            console.log("alooooo");
            console.log(this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdmodele);
           this.fabricantDuModelSelectione(this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdmodele);
        });
    }
    populerSelectModele = () => {

        this._elSelectFabricant.addEventListener('change', (e) => {
            this._elSelectModele.removeAttribute("disabled")
            console.log(this._elSelectFabricant.options[this._elSelectFabricant.selectedIndex].dataset.jsIdfabricant);
            this.modelesDuFabricantSelectione(this._elSelectFabricant.options[this._elSelectFabricant.selectedIndex].dataset.jsIdfabricant);
        });
    }

    fabricantDuModelSelectione = (idModel) => {
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('GET', 'index.php?Magasin_AJAX&action=fabricantDuModelSelectione&idModele=' +idModel);
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM

                       let reponse = JSON.parse(xhr.responseText);
                       let fabricant = reponse[0]["fabricant"];
                       
                        let listeOptionFabricant = this._elSelectFabricant.querySelectorAll('option');
                       for (let i = 0; i < listeOptionFabricant.length; i++) {
                           const option = listeOptionFabricant[i];
                           console.log(fabricant);
                           
                           if(option.value === fabricant){
                                option.setAttribute('selected', 'selected');
                                this._elSelectFabricant.setAttribute("disabled", "disabled");
                           }                          
                        }
                       /* console.log(fabricant[0]["fabricant"]); */


                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète
            xhr.send();
        }
    }

    modelesDuFabricantSelectione = (idFabricant) => {
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('GET', 'index.php?Magasin_AJAX&action=modelesDuFabricantSelectione&idFabricant=' +idFabricant);
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM
                        console.log(xhr.responseText);
                       let reponse = JSON.parse(xhr.responseText);
                       console.log(reponse.length);
                       this._elSelectModele.innerHTML = "";
                       let elementOption ="<option></option>";
                        for (let j = 0; j < reponse.length; j++) {
                            const modele = reponse[j]["modele"];
                            const idModele = reponse[j]["idModele"];
                            if(modele.length >0){
                                elementOption += `<option data-js-idModele="${idModele}"  value="${modele}">${modele}</option>`;
                                this._elSelectModele.innerHTML = elementOption;
                            }
                            
                            
                        }
                        if(reponse.length == 0){
                            let elementOption = `<option>Pas de modele disponible</option>`;
                            this._elSelectModele.insertAdjacentHTML("afterbegin", elementOption);
                            this._elSelectModele.setAttribute("disabled", "disabled")
                        }
                  
                       /* console.log(fabricant[0]["fabricant"]); */


                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète
            xhr.send();
        }
    }
    populerListeVoitureRecherche = () => {
        let minAnnee = this._elMinAnnee.value;
        if(minAnnee==""){
            minAnnee = 1900;
        }
        let maxAnnee = this._elMaxAnnee.value;
        /* a revoir Lyes */
        /* let dateAjouduit = new date(); */
        if(maxAnnee==""){
            maxAnnee = 2021;
        }
        let minPrix = this._elMinPrix.value;
        if(minPrix==""){
            minPrix = 0;
        }
        let maxPrix = this._elMaxPrix.value;
        if(maxPrix==""){
            maxPrix = 10000000;
        }
        let idFabricant = this._elSelectFabricant.options[this._elSelectFabricant.selectedIndex].dataset.jsIdfabricant;
        let idModele = this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdmodele;
        this.chargerListeVoitureRecherche(idModele, idFabricant, minAnnee, maxAnnee, minPrix, maxPrix);

    }
    chargerListeVoitureRecherche = (idModele, idFabricant, anneeMin, anneeMax, prixMin, prixMax) => {
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('GET', 'index.php?Magasin_AJAX&action=chargerListeVoitureRecherche&idModele=' +idModele+'&idFabricant='+idFabricant+'&anneeMin='+anneeMin+'&anneeMax='+anneeMax+'&prixMin='+prixMin+'&prixMax='+prixMax);
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM
                        console.log(JSON.parse(xhr.responseText));
                       let reponse = JSON.parse(xhr.responseText);
                       this._elVoitures.innerHTML="";
                       /* console.log(fabricant[0]["fabricant"]); */
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
                        
                            if(reponse.length >0){
                                console.log(modele);
                                console.log(fabricant);
                                console.log(couleur);
                                console.log(marque);
                                console.log(statut);
                            }
                            let html = "";
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
                                <h2><?= $voiture["modele"] ?></h2>
                                <h3>${prixVente}&nbsp;$</h3>
                                <span>${fabricant}</span> 
                                <span>${annee}</span><br>                             
                                <span>${km} Km</span><br>               
                                <span>${couleur}</span> <br>
                                <span>${groupeMotopropulseur}</span><br>
                                <span>${chassis}</span> 
                            </div>             
                            </article>`
                            this._elVoitures.insertAdjacentHTML("afterbegin", html);
                        
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
}