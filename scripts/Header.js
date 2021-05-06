class Header {
    constructor(el) {
        this._el = el;
        this._elIconeProfil = this._el.querySelector('[data-js-icone-profil]');
        this._elMenuProfil = this._el.querySelector('.menu_profil');
        this._elSelectLangue = this._el.querySelector('[data-js-langue]');
        this._elbtnForm = this._el.querySelector('[data-js-btn]');
        console.log(this._elSelectLangue);

        this.init();
    }

    init = () => {
        console.log(this._elIconeProfil);
        console.log(this._elMenuProfil);
        
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
        
/*         this._elSelectLangue.addEventListener('change', () => {
            console.log();
            let langue = this._elSelectLangue.options[this._elSelectLangue.selectedIndex].value;
            console.log(langue);
            document.location.href=`index.php?Magasin&action=""&langue=${langue}`;
        }); */
        
    } 


}