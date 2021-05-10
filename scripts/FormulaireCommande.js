class FormulaireCommande{
    constructor(el) {
        this._el = el;
        this._elSubmit = this._el.querySelector('[data-js-submit]');
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
                let commande = JSON.parse(sessionStorage.commande);
                for (let j = 0; j < commande.length; j++) {
                    commande[j].idVoiture;
                                       
                }
                
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

 

}