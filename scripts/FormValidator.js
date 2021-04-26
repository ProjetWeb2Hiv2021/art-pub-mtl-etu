class FormValidator {
    constructor(el) {
        this._el = el;
        // récupère tous les éléments annee du formulaire
        this._allAnneeInputs = this._el.querySelectorAll('[data-js-annee]');
        this._anneeRegex = /^(19[5-9]\d|20[0-4]\d|2050)$/;
        this._erreurAnnee = `Veuillez entrer une annee valide svp .`;
        // récupère tous les éléments annee du formulaire
        this._allPrixInputs = this._el.querySelectorAll('[data-js-prix]');
        this._prixRegex = /^[0-9]+$/;
        this._erreurPrix = `Veuillez entrer un chiffre valide svp .`;

        
        // Booléen, valeur qui sera retournée par la validation
        this._isValid = true;


        this.initValidation();
    }


    initValidation = () => {

       // Validation des champs
       this.gestionInputRegex(this._allAnneeInputs, this._anneeRegex, this._erreurAnnee); 
       this.gestionInputRegex(this._allPrixInputs, this._prixRegex, this._erreurPrix); 
    }
    gestionInputRegex = (el, regex,msginput) => {
        let elInput = el;
        let msgErr = msginput;
        let inputRegex = regex;

        for (let i = 0, l = elInput.length; i < l; i++) {
            let inputValue = elInput[i].value,
                closestElWrapper = elInput[i].closest('[data-js-input-wrapper]'),
                elErrorMsg = closestElWrapper.querySelector('[data-js-error-msg]');
                console.log(closestElWrapper);

            console.log(typeof(inputValue));
            if(inputValue !== ""){
                if (inputRegex.test(inputValue) || inputValue == "") {
                
                    if (closestElWrapper.classList.contains('error')) {
                        this.removeError(closestElWrapper, elErrorMsg);
                    }
                } else {
                    
                    this.addError(closestElWrapper, elErrorMsg, msgErr);
                }

            }     
        }
    }
    addError = (el, elErrorMsg, msg) => {
        console.log("erreur");
        el.classList.add('error');
        elErrorMsg.textContent = msg;
        this._isValid = false;
    }


    removeError = (el, elErrorMsg) => {
        el.classList.remove('error');
        elErrorMsg.textContent = '';
    }

    get isValid() {
        return this._isValid;
    }
}