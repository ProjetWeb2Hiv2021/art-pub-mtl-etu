class FormValidator {
    constructor(el) {
        this._el = el;


        // Booléen, valeur qui sera retournée par la validation
        this._isValid = true;


        this.initValidation();
    }


    initValidation = () => {

       // Validation des champs 
       
    }

    get isValid() {
        return this._isValid;
    }
}