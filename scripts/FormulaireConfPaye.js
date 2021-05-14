class FormulaireConfPaye {
    constructor(el) {
        this._el = el;
        this._elSubmit = this._el.querySelector('[data-js-submit]');
        this.init();
    }

    init = (e) => {
        console.log('Confirmation init test');

        this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault(); console.log('Confirmation addEventListener');
                
                document.location.href='index.php?'; 


        });


    }


}

