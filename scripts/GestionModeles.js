class GestionModeles{
    constructor(el) {
        this._el = el;
        this._elSelectModele = this._el.querySelector('[data-js-modele]')
        this._elSelectMarque = this._el.querySelector('[data-js-marque]');
        this._elSelectFabricant = this._el.querySelector('[data-js-fabricant]');
        console.log(this._elSelectModele.querySelectorAll('option'));
        


        this.init();
    }
    init = (e) => {
        this._elSelectModele.addEventListener('change', (e) => {
            
            let idMarque = this._elSelectModele.options[this._elSelectModele.selectedIndex].dataset.jsIdmarque;
            let listeOptionMarque = this._elSelectMarque.querySelectorAll('option');
            for (let i = 0; i < listeOptionMarque.length; i++) {
                const option = listeOptionMarque[i];
                console.log(option.value);

                if(option.value === idMarque){
                    option.setAttribute('selected', 'selected');
                }                          
            } 
           
        });

    }
}