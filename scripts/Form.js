class Form {
    constructor(el) {
        this._el = el;
        this._elForm = this._el.querySelector('[data-js-form]');
        this._elSubmit = this._el.querySelector('[data-js-submit]');
        console.log(this._elSubmit);
    


        this.init();
    }


    init = (e) => {

        this._elSubmit.addEventListener('click', (e) => {
            
            e.preventDefault();

            
            // appel le script de validation front-end
            let validation = new FormValidation(this._el);

            // si le formulaire est valide, appelle la fonction showThanks
            if (validation.isValid){

            }                   
        });   
    }
    

}