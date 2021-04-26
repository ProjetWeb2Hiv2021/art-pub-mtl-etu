class Form {
    constructor(el) {
        this._el = el;
        this._elForm = this._el.querySelector('[data-js-form]');
        this._elSubmit = this._el.querySelector('[data-js-submit]');

    


        this.init();
    }


    init = (e) => {

        this._elSubmit.addEventListener('click', (e) => {
            
            e.preventDefault();
            console.log("formulaire");
            
            // appel le script de validation front-end
            let validation = new FormValidation(this._el);

            // si le formulaire est valide, appelle la fonction showThanks
            if (validation.isValid){
                
                this.ajoutercommande();
                this.ajouterUsager();
                this.retirerProduit();  
                setTimeout(function(){ 
                    document.location.href='index.php?Produits&action'; 
                    sessionStorage.clear();
                }, 5000);

            }                   
        });   
    }
    

}