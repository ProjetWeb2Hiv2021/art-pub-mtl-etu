class FiltrerPlusieursCriteres{
    constructor(el) {
        this._el = el;
        this._elSubmit = this._el.querySelector('[data-js-btn]');
        this._elRafraichir= this._el.querySelector('[data-js-rafraichir]');
        this._elSelectModele = this._el.querySelector('[data-js-modele]');
        this._elSelectMarque = this._el.querySelector('[data-js-marque]');
        this._elInputs= this._el.querySelectorAll('input');
        this._elMinAnnee = this._el.querySelector('[data-component="anneeMin"]'); 
        this._elMaxAnnee = this._el.querySelector('[data-component="anneeMax"]'); 
        this._elMinPrix = this._el.querySelector('[data-component="prixMin"]'); 
        this._elMaxPrix = this._el.querySelector('[data-component="prixMax"]'); 
        this._elVoitures = document.querySelector('[data-component="VoitureListe"]');
        this.elBtnRetour = document.querySelector('[data-js-retour-acceuil]');


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
                 
                if (this._elSelectMarque.options[this._elSelectMarque.selectedIndex].value != ""){
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
            this.populerSelectMarque();
            this.populerSelectModele();
            this._elSubmit.addEventListener('click', (e) => {
                e.preventDefault();
                let validation = new FormValidator(this._el);
                document.querySelector('[data-component="VoirPlus"]').classList.add("hidden");
                this.elBtnRetour.classList.remove("hidden");

                console.log(validation.isValid);
                if (validation.isValid){
                    this.populerListeVoitureRecherche();
                }
            });
            this._elRafraichir.addEventListener('click', (e) => {
                e.preventDefault();
                if (this._elSelectModele.options[this._elSelectModele.selectedIndex].value != "") {
                    this._elSelectMarque.removeAttribute("disabled", "disabled");
                }
                
                this.chargerListeModeleMarqueRafraichir();
                this._elMinAnnee.value = "";
                this._elMaxAnnee.value = "";
                this._elMinPrix.value = "";
                this._elMaxPrix.value = "";

                this._elSubmit.classList.add('disabled');
                this._elRafraichir.classList.add('disabled');
                
                
            });
            this.elBtnRetour.addEventListener('click', (e) => {
                document.location.href='index.php?'; 
            });
        
    }

    populerSelectMarque = () => {
        this._elSelectModele.addEventListener('change', (e) => {
            this._elSelectMarque.removeAttribute("disabled");
           this.marqueDuModelSelectione(this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdmodele);
        });
    }
    populerSelectModele = () => {

        this._elSelectMarque.addEventListener('change', (e) => {
            this._elSelectModele.removeAttribute("disabled");
            this.modelesDuMarqueSelectione(this._elSelectMarque.options[this._elSelectMarque.selectedIndex].dataset.jsIdmarque);
        });
    }

    marqueDuModelSelectione = (idModel) => {
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('GET', 'index.php?Magasin_AJAX&action=marqueDuModelSelectione&idModele=' +idModel);
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM

                       let reponse = JSON.parse(xhr.responseText);
                       let marque = reponse[0]["marque"];
                       
                        let listeOptionMarque = this._elSelectMarque.querySelectorAll('option');
                       for (let i = 0; i < listeOptionMarque.length; i++) {
                           const option = listeOptionMarque[i];

                           if(option.value === marque){
                                option.setAttribute('selected', 'selected');
                                this._elSelectMarque.setAttribute("disabled", "disabled");
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

    modelesDuMarqueSelectione = (idMarque) => {
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('GET', 'index.php?Magasin_AJAX&action=modelesDuMarqueSelectione&idMarque=' +idMarque);
            
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
        let idMarque = Number(this._elSelectMarque.options[this._elSelectMarque.selectedIndex].dataset.jsIdmarque) ;
        let idModele = Number(this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdmodele);
        console.log(idModele, idMarque, anneeMin, anneeMax, prixMin, prixMax);
        this.chargerListeVoitureRecherche(idModele, idMarque, anneeMin, anneeMax, prixMin, prixMax);
       
    }
    chargerListeVoitureRecherche = (idModele, idMarque, anneeMin, anneeMax, prixMin, prixMax) => {
       
        let xhr;
        xhr = new XMLHttpRequest();
        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('GET', 'index.php?Magasin_AJAX&action=chargerListeVoitureRecherche&idModele=' +idModele+'&idMarque='+idMarque+'&anneeMin='+anneeMin+'&anneeMax='+anneeMax+'&prixMin='+prixMin+'&prixMax='+prixMax);
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM
                       let reponse = JSON.parse(xhr.responseText);

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
    chargerListeModeleMarqueRafraichir = () => {
       
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
                        this._elSelectMarque.innerHTML = "";
                        let htmlMarque = "<option value=''></option>";
                        for (let i = 0; i < data["marque"].length; i++) {
                            const marque = data["marque"][i];
                            htmlMarque += `<option data-js-idMarque="${marque["idMarque"]}"  value="${marque["marque"]}">${marque["marque"]}</option>`;
                         }   
                         this._elSelectMarque.insertAdjacentHTML("afterbegin", htmlMarque);



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

