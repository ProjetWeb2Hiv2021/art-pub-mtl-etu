class Header {
    constructor(el) {
        this._el = el;
        this._elIconeProfil = this._el.querySelector('[data-js-icone-profil]');
        this._elMenuProfil = this._el.querySelector('[data-js-menu-profil]');
        this.init();
    }

    init = () => {
        
        this._elIconeProfil.addEventListener('mouseover', () => {
            this._elMenuProfil.style.display = "block";

        });
        this._elIconeProfil.addEventListener('mouseleave', () => {
            this._elMenuProfil.style.display = "none";
        });
        this._elMenuProfil.addEventListener('mouseover', () => {
            this._elMenuProfil.style.display = "block";
        });
        this._elMenuProfil.addEventListener('mouseleave', () => {
            this._elMenuProfil.style.display = "none";
        });
    }

}