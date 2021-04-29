class FiltrerPlusieursCriteres{
    constructor(el) {
        this._el = el;
        this._elSubmit = this._el.querySelector('[data-js-btn]');
        this._elRafraichir= this._el.querySelector('[data-js-rafraichir]');
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
        // si le formulaire est valide, appelle la fonction showThanks
        // appel le script de validation front-end
        
        /* if (validation.isValid){ */
            this._el.addEventListener('change', (e) => {
                e.preventDefault();
                if (this._elSelectModele.options[this._elSelectModele.selectedIndex].value != ""){
                    this._elSubmit.classList.remove('disabled');
                    this._elRafraichir.classList.remove('disabled');
                }else{
                    this._elSubmit.classList.add('disabled');
                    this._elRafraichir.classList.add('disabled');
                } 
                 
                if (this._elSelectFabricant.options[this._elSelectFabricant.selectedIndex].value != ""){
                    this._elSubmit.classList.remove('disabled');
                    this._elRafraichir.classList.remove('disabled');
                }else{
                    this._elSubmit.classList.add('disabled');
                    this._elRafraichir.classList.add('disabled');
                } 
                for (let i = 0; i <  this._elInputs.length; i++) {
                    const input =  this._elInputs[i];
                    if (input.value >= 0){
                        this._elSubmit.classList.remove('disabled');
                        this._elRafraichir.classList.remove('disabled');
                    }else{
                        this._elSubmit.classList.add('disabled');
                        this._elRafraichir.classList.add('disabled');
                    } 
                    console.log(input.value);
                }
            });
            this.populerSelectFabricant();
            this.populerSelectModele();
            this._elSubmit.addEventListener('click', (e) => {
                e.preventDefault();
                let validation = new FormValidator(this._el);
                console.log(validation.isValid);
                if (validation.isValid){
                    this.populerListeVoitureRecherche();
                }
            });
            this._elRafraichir.addEventListener('click', (e) => {
                e.preventDefault();
                if (this._elSelectModele.options[this._elSelectModele.selectedIndex].value != "") {
                    this._elSelectFabricant.removeAttribute("disabled", "disabled");
                }
                
                this.chargerListeModeleFabricantRafraichir();
                this._elMinAnnee.value = "";
                this._elMaxAnnee.value = "";
                this._elMinPrix.value = "";
                this._elMaxPrix.value = "";

                this._elSubmit.classList.add('disabled');
                this._elRafraichir.classList.add('disabled');  
                
            });
        
    }

    populerSelectFabricant = () => {
        this._elSelectModele.addEventListener('change', (e) => {
            this._elSelectFabricant.removeAttribute("disabled");
           this.fabricantDuModelSelectione(this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdmodele);
        });
    }
    populerSelectModele = () => {

        this._elSelectFabricant.addEventListener('change', (e) => {
            this._elSelectModele.removeAttribute("disabled");
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

                           if(option.value === fabricant){
                                option.setAttribute('selected', 'selected');
                                this._elSelectFabricant.setAttribute("disabled", "disabled");
                           }                          
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
                       let reponse = JSON.parse(xhr.responseText);
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
        
        let anneeMin = Number(this._elMinAnnee.value);
        if(anneeMin==""){
            anneeMin = 1900;
        }
        let anneeMax = Number(this._elMaxAnnee.value);
        
        if(anneeMax==""){       
            anneeMax = new Date().getFullYear();
        }
        let prixMin = this._elMinPrix.value;
        if(prixMin==""){
            prixMin = 0;
        }
        let prixMax = this._elMaxPrix.value;
        if(prixMax==""){
            prixMax = 10000000;
        }
        let idFabricant = Number(this._elSelectFabricant.options[this._elSelectFabricant.selectedIndex].dataset.jsIdfabricant) ;
        let idModele = Number(this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdmodele);
        
        this.chargerListeVoitureRecherche(idModele, idFabricant, anneeMin, anneeMax, prixMin, prixMax);

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
                       let reponse = JSON.parse(xhr.responseText);

                       this._elVoitures.innerHTML="";
                       /* console.log(fabricant[0]["fabricant"]); */
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
                                    <span>${fabricant}</span> 
                                    <span>${annee}</span><br>                             
                                    <span>${km} Km</span><br>               
                                    <span>${couleur}</span> <br>
                                    <span>${groupeMotopropulseur}</span><br>
                                    <span>${chassis}</span> 
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
    chargerListeModeleFabricantRafraichir = () => {
       
        let xhr;
        xhr = new XMLHttpRequest();
        
        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('GET', 'index.php?Magasin_AJAX&action=chargerListeModeleRafraichir');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM

                       let data = JSON.parse(xhr.responseText);

                       
                       this._elSelectModele.innerHTML = "";
                        let html = "<option value=''></option>";
                       for (let i = 0; i < data["modele"].length; i++) {
                           const modele = data["modele"][i];
                           
                           html += `<option data-js-idModele="${modele["idModele"]}"  value="${modele["modele"]}">${modele["modele"]}</option>`;
                        }                       
                        this._elSelectModele.insertAdjacentHTML("afterbegin", html);
                        this._elSelectFabricant.innerHTML = "";
                        let htmlFabricant = "<option value=''></option>";
                        for (let i = 0; i < data["fabricant"].length; i++) {
                            const fabricant = data["fabricant"][i];
                            htmlFabricant += `<option data-js-idFabricant="${fabricant["idFabricant"]}"  value="${fabricant["fabricant"]}">${fabricant["fabricant"]}</option>`;
                         }   
                         this._elSelectFabricant.insertAdjacentHTML("afterbegin", htmlFabricant);



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

