class FormulaireCommande{
    constructor(el) {
        this._el = el;
        this._elSubmit = this._el.querySelector('[data-js-submit]');
        this._elForm = this._el.querySelector('form');
        this._elNomUtilisateur = this._el.dataset.jsNomutilisateur;
        console.log(this._elForm);
        this._elCarteCredit = this._el.querySelector('[data-js-carte]');
        this._elMPaiment= this._el.querySelector('[data-js-paiment]');
        this._elPayPal= this._el.querySelector('[data-js-paypal]');
        console.log(this._elCarteCredit);
        // récupère élément username

        this.init();

    }
    init = (e) => {
        /* au change le btn recherche s'active */
        // si le formulaire est valide, appelle la fonction showThanks
        // appel le script de validation front-end
        
        /* if (validation.isValid){ */
        
        this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault();
            
            let validation = new FormValidator(this._el);
            if (validation.isValid){
                let html = "<div data-js-recap><div>"
                this._el.insertAdjacentHTML("beforeend", html);
                this._elForm.classList.add("hidden");
                
                let commande = JSON.parse(sessionStorage.commande);
                for (let j = 0; j < commande.length; j++) {
                    let idVoiture = commande[j].idVoiture;
                    let param = `idVoiture=${idVoiture}`;
                    let path =`Voiture_AJAX&action=voitureParId`;
                    this.callAJAXA(param, path);  
                    
                }

                
                let paramUtilisateur = `nomUtilisateur=${this._elNomUtilisateur}`;
                let pathUtilisateur =`Utilisateur_AJAX&action=verifierEnregistrement`;
                console.log(paramUtilisateur);
                this.callAJAXA(paramUtilisateur, pathUtilisateur);
                
                this.calculTotal();
                
                
                
  
                if(this._elPayPal.checked){
                    /* deriger l'utilisateur vers paypal */
                }

            }else{
                console.log("Non valide");
        
            }
            
        });
        this._elMPaiment.addEventListener('change', (e) => {
            console.log("hna");
            if(this._elCarteCredit.checked){
                if(!this._el.querySelector('[data-js-formcredit]')){
                    let html =`<fieldset data-js-formcredit>
                            <legend>Informations CB</legend>
                            <div class="input-wrapper" data-js-input-wrapper>
                                <fieldset>
                                <legend>Type de carte bancaire</legend>
                                <div class="input-wrapper" data-js-input-wrapper data-js-radio="required" data-js-param="info" data-js-input="Type de carte bancaire">
                                    <input id=visa name=type_de_carte data-js-param="carte" type=radio>
                                    <label for=visa>VISA</label>
                                    
                                    <input id=amex name=type_de_carte data-js-param="carte" type=radio>
                                    <label for=amex>AmEx</label>
                                    
                                    <input id=mastercard name=type_de_carte data-js-param="carte" type=radio>
                                    <label for=mastercard>Mastercard</label><small class="error-message" data-js-error-msg></small>                       
                                </div>
                                </fieldset>
                            </div>
                            
                            <div class="input-wrapper" data-js-input-wrapper>
                                <label for=numero_de_carte>N° de carte</label>
                                <input id=numero_de_carte name=numero_de_carte type=number required data-js-param="numerocarte"><small class="error-message" data-js-error-msg></small>
                            </div>
                            <div class="input-wrapper" data-js-input-wrapper>
                                <label for=securite>Code sécurité</label>
                                <input id=securite name=securite type=number required data-js-param="code"><small class="error-message" data-js-error-msg></small>
                            </div>
                            
                        </fieldset>`;
                    this._elMPaiment.insertAdjacentHTML('afterend', html);
                }
            }else{
                console.log("pas check");
                if(this._el.querySelector('[data-js-formcredit]')){
                    this._el.querySelector('[data-js-formcredit]').remove();
                }
                
                
            }
           
            
            
        });

    }

    callAJAXA = (param, path) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?'+path);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
                        let reponse = JSON.parse(xhr.responseText);
                        if(reponse.modele && reponse.marque && reponse.couleurfr && reponse.km && reponse.prixVente){
                            let html =`<div data-js-voiturcommande>
                                            <div data-js-description>
                                                Modele voiture : ${reponse.modele} de la marque ${reponse.marque} de couleur ${reponse.couleurfr} avec ${reponse.km} au compteur
                                            </div>
                                            <div data-js-prix="${reponse.prixVente}">
                                                ${reponse.prixVente} $
                                            </div>
                                        </div>`;

                            let recap = this._el.querySelector('[data-js-recap]');
                            recap.insertAdjacentHTML("beforeend", html);
                            
                            
                        }
                        if(reponse[0].nomFamille && reponse[0].telephone){

                            let htmlUtilisateur =`<div data-js-utilisateur>
                                                    <p>Nom :${reponse[0].nomFamille}</p>
                                                    <p>Prenom :${reponse[0].prenom}</p>
                                                    <p>Nom prenom :${reponse[0].nomFamille}</p>
                                                    <p>Adresse :${reponse[0].noCivique} ${reponse[0].rue} ${reponse[0].ville} ${reponse[0].province} ${reponse[0].codePostal}</p>
                                                    <p>telephone :${reponse[0].telephone}</p>
                                                </div>`;

                            let recap = this._el.querySelector('[data-js-recap]');
                            recap.insertAdjacentHTML("afterbegin", htmlUtilisateur);

                            let htmlTaxe = `<div data-js-taxe>
                                                <div class="prixTaxe" data-js-tvh='${reponse[0].tvh}'><div>TVH: ${reponse[0].tvh}</div><div data-js-totaltvh></div>3333</div>
                                                <div class="prixTaxe" data-js-tvp='${reponse[0].tvp}'><div>TVP: ${reponse[0].tvp}</div><div data-js-totaltvp></div>3333</div>
                                                <div class="prixTaxe" data-js-tvs='${reponse[0].tvs}'><div>TVS: ${reponse[0].tvs}</div><div data-js-totaltvs></div>3333</div>
                                                <div class="prixTaxe" data-js-total><div>TOTAL :</div><div data-js-totaltvs></div>3333</div>
                                            <div>`;
                            recap.insertAdjacentHTML("beforeend", htmlTaxe);
                            
                        }
                        
                        
                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète

            xhr.send(param);
        }
    }
    
    calculTotal = () => {
        let recap = this._el.querySelector('[data-js-recap]');
        let elTvh = recap.querySelector('[data-js-tvh]').dataset.jsTvh;
        let elTvp = recap.querySelector('[data-js-tvp]').dataset.jsTvp;
        let elTvs = recap.querySelector('[data-js-tvh]').dataset.jsTvs;
        let elTprixHT = this._el.querySelectorAll('[data-js-prix]').dataset.jsPrix;
        let eltotaltvh = recap.querySelector('[data-js-totaltvh]');
        let eltotaltvp = recap.querySelector('[data-js-totaltvp]');
        let eltotaltvs = recap.querySelector('[data-js-totaltvs]');
        let totalFacture = 0;
        let totalTvh = 0;
        let totalTvp = 0;
        let totalTvs = 0;

        if(elTvh == 0){
            elTvh = 1;
        }
        if(elTvp == 0){
            elTvp = 1;
        }
        if(elTvs == 0){
            elTvs = 1;
        }
        for (let i = 0; i < elTprixHT.length; i++) {
            const prixVoiture = elTprixHT[i];
            totalTvh += Number(prixVoiture)*Number(elTvh);
            totalTvp += Number(prixVoiture)*Number(elTvp);
            totalTvs += Number(prixVoiture)*Number(elTvs);

            totalFacture += Number(prixVoiture)*(Number(elTvh)+Number(elTvp)+Number(elTvs));
        }
        let elTotal = recap.querySelector('[data-js-tvs]');
        elTotal.innerHTML = totalFacture;
        eltotaltvh.innerHTML = totalTvh;
        eltotaltvp.innerHTML = totalTvp;
        eltotaltvs.innerHTML = totalTvs;
    }
 

}