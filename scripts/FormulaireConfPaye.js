class FormulaireConfPaye {
    constructor(el) {
        this._el = el;
        this._elSubmit = this._el.querySelector('[data-js-submit]');
        this.init();
    }

    init = (e) => {
        console.log('Confirmation init test');
        //Vider Panier
        var elConteur = document.getElementById("conteurVoiture");
        elConteur.innerHTML = "";
        sessionStorage.removeItem('conteurVoiture');
        sessionStorage.removeItem('Panier'); 

        this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault(); console.log('Confirmation addEventListener');
                document.location.href='index.php?'; 


        });


    }


}

