class FormValidator {
    constructor(el) {
        this._el = el;
        // récupère tous les éléments annee du formulaire
        //debut Validation filtre plusieurs criteres
        this._allAnneeInputs = this._el.querySelectorAll('[data-js-annee]');
        this._anneeRegex = /^(19[5-9]\d|20[0-4]\d|2050)$/;
        this._erreurAnnee = `Veuillez entrer une annee valide svp .`;
        // récupère tous les éléments input radio required du formulaire
        this._allRequiredRadioWrappers = this._el.querySelectorAll('[data-js-radio="required"]');

        // récupère tous les éléments annee du formulaire
        this._allPrixInputs = this._el.querySelectorAll('[data-js-prix]');
        this._prixRegex = /^[0-9]+$/;
        this._erreurPrix = `Veuillez entrer un chiffre valide svp .`;
        //fin Validation filtre plusieurs criteres

        //debut Validation formulaire utilisateur
        // récupère tous les éléments input required du formulaire
        this._allRequiredInputs = this._el.querySelectorAll('[required]');


        // récupère tous les éléments input email du formulaire
        this._allEmailInputs = this._el.querySelectorAll('input[type="email"]');
        this._emailRegex = /(.+)@(.+){1,}\.(.+){1,}/;
        this._erreurMail = `L'adresse courriel saisie n'est pas valide.`;

        // récupère tous les éléments input tel du formulaire
        this._allTelInputs = this._el.querySelectorAll('input[type="tel"]');
        this._telRegex = /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/;
        this._erreurTel = `Le numero de telephone est incorrect.`;

        // récupère tous les éléments input code postaldu formulaire
        this._elcodePostal = this._el.querySelectorAll('[data-js-param="codePostal"]');
        this._codePostalRegex = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
        this._erreurCodePostal = `le code postal saisie n'est pas valide.`;
        //console.log(this._elcodePostal);

        // récupère tous les éléments input email du formulaire
        this._allDateInputs = this._el.querySelectorAll('input[type="date"]');
        this._erreurDate = `Vous n'avez pas l'age requis pour créer un compte .`;
        //fin Validation formulaire utilisateur

        //debut Validation formulaire VoitureSGC
        this._allRequiredInputsSGC = this._el.querySelectorAll('[required]');


        // Booléen, valeur qui sera retournée par la validation
        this._isValid = true;
        

        this.initValidation();
    }


    initValidation = () => {
        this. btnRadioValidation();

       // Validation des champs
       //debut Validation filtre plusieurs criteres
       this.gestionInputRegex(this._allAnneeInputs, this._anneeRegex, this._erreurAnnee); 
       this.gestionInputRegex(this._allPrixInputs, this._prixRegex, this._erreurPrix); 
       //fin Validation filtre plusieurs criteres

        // validation des champs required
       for (let i = 0, l = this._allRequiredInputs.length; i < l; i++) {
        let closestElWrapper = this._allRequiredInputs[i].closest('[data-js-input-wrapper]'),
            elErrorMsg = closestElWrapper.querySelector('[data-js-error-msg]');
            
        if (this._allRequiredInputs[i].value == '') {
            let inputDataset = this._allRequiredInputs[i].dataset.jsParam,              // Récupère la valeur du dataset
            // let inputName = this._allRequiredInputs[i].name,                         // Recupère la valeur de l'attribut name
                msg = `Le champ ${inputDataset} est obligatoire.`;
            this.addError(closestElWrapper, elErrorMsg, msg);
        } else {
            if (closestElWrapper.classList.contains('error')) {
                
                this.removeError(closestElWrapper, elErrorMsg);
            }
        }
        this.btnRadioValidation();
        //debut Validation formulaire utilisateur
        this.gestionInputRegex(this._allEmailInputs, this._emailRegex, this._erreurMail);
        this.gestionInputRegex(this._allTelInputs, this._telRegex, this._erreurTel);
        
        this.gestionInputDate(this._allDateInputs, this._erreurDate);
        this.gestionInputRegex(this._elcodePostal, this._codePostalRegex, this._erreurCodePostal);
        ;
     
    }


    }
    gestionInputRegex = (el, regex,msginput) => {
        let elInput = el;
        let msgErr = msginput;
        let inputRegex = regex;

       
        for (let i = 0, l = elInput.length; i < l; i++) {
            let inputValue = elInput[i].value,
                closestElWrapper = elInput[i].closest('[data-js-input-wrapper]'),
                elErrorMsg = closestElWrapper.querySelector('[data-js-error-msg]');


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

    gestionInputDate = (el, msginput) => {
        let elInput = el;
        let msgErr = msginput;
        let dateAujourdhui = new Date();

        for (let i = 0, l = elInput.length; i < l; i++) {
            let inputValue = elInput[i].value,
                closestElWrapper = elInput[i].closest('[data-js-input-wrapper]'),
                elErrorMsg = closestElWrapper.querySelector('[data-js-error-msg]');
            console.log(inputValue);

            if (inputValue == ""){
                let inputDataset = elInput[i].dataset.jsParam, 
                            // let inputName = this._allRequiredInputs[i].name,                         // Recupère la valeur de l'attribut name
                msg = `Le champ  ${inputDataset} est obligatoire.`;
                this.addError(closestElWrapper, elErrorMsg, msg);
            }else{
                let dateUtilisateur = new Date(inputValue);
                let age = this.dateDiff(dateUtilisateur, dateAujourdhui);
                console.log(age);
                if(age < 18){
                    this.addError(closestElWrapper, elErrorMsg, msgErr);
                }else{
                    this.removeError(closestElWrapper, elErrorMsg);
                }
            }
        }

    } 
    dateDiff =(d1, d2) =>
    {
        return new Number((d2.getTime() - d1.getTime()) / 31536000000).toFixed(0);
    }

    addError = (el, elErrorMsg, msg) => {
        
        el.classList.add('error');
        elErrorMsg.textContent = msg;
        this._isValid = false;
    }


    removeError = (el, elErrorMsg) => {
        console.log("remove");
        el.classList.remove('error');
        elErrorMsg.textContent = '';
    }

    get isValid() {
        return this._isValid;
    }
    // validation des champs radio required
    btnRadioValidation = () => {
        for (let i = 0, l = this._allRequiredRadioWrappers.length; i < l; i++) {
            console.log(this._allRequiredRadioWrappers);
            let elRadios = this._allRequiredRadioWrappers[i].querySelectorAll('input[type="radio"]'),
                elErrorMsg = this._allRequiredRadioWrappers[i].querySelector('[data-js-error-msg]'),
                isChecked = false;

            for (let n = 0, m = elRadios.length; n < m; n++) {
                if (elRadios[n].checked) isChecked = true;
            }

            if (isChecked) {
                if (this._allRequiredRadioWrappers[i].classList.contains('error')) {
                    this.removeError(this._allRequiredRadioWrappers[i], elErrorMsg);
                }
            } else {
                let inputDataset = this._allRequiredRadioWrappers[i].dataset.jsInput,
                    msg = `Une option ${inputDataset} doit être sélectionnée.`;;
                this.addError(this._allRequiredRadioWrappers[i], elErrorMsg, msg);
            }
        }
    }

}