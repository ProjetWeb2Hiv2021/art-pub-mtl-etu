class Voiture {
    constructor(el) {
        this._el = el;
        /* Détail de la voiture */
        this._id = this._el.dataset.jsVoitureId;
        
        this.init();
    }

    init = (e) => {

        this._el.addEventListener('click', (e) => {
            e.preventDefault();
            
            
            if (this._el.parentElement.dataset.component === "VoitureListe") {
                document.location.href = 'index.php?Magasin&action=afficheVoiture&id=' + this._id;
            } else if (this._el.parentElement.dataset.component === "VoitureListeSGC") {
                document.location.href='index.php?Voiture&action=modifier&id=' + this._id; 
            }
            
            
        })
    }



}