class Header {
    constructor(el) {
        this._el = el;
        /* Cart */
        this._elItemNumber = this._el.querySelector('[data-js-item-number]');
        this._elCart = this._el.querySelector('[data-js-cart]');

        this.init();
    }

    init = () => {
        this.isItemInCart();
    }

    isItemInCart = () => {
        if (sessionStorage.getItem('itemNumber')) {
            if (this._elCart.classList.contains('empty')) { 
                this._elCart.classList.replace('empty', 'fill');
                this._elItemNumber.textContent = parseInt(sessionStorage.getItem('itemNumber'));
            }
        }
    }
}