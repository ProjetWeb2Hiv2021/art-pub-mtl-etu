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
            /* this.callAJAX(this._id); */
           /*  document.location.href='index.php?Magasin&action=afficheVoiture&id=' + this._id; */
            /* this.callAJAX(this._el.dataset.jsVoitureId); */
            
        })
    }


/*     callAJAX = (param) => { */
        
        // Déclaration de l'objet XMLHttpRequest
/*         let xhr;
        xhr = new XMLHttpRequest(); */

        // Initialisation de la requète
/*         if (xhr) {	 */
            //console.log(param);    
            // Ouverture de la requète : fichier recherché

/*             xhr.open('GET', 'index.php?Magasin_AJAX&action=afficheVoiture&id=' + param); */
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
         /*    xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
 */
                        // Traitement du DOM
                        //this._elResults.innerHTML = xhr.responseText;
                        //console.log(xhr.responseText);
                        //debut changement lyes
                       /*  let elBody = document.querySelector('body');
                        let elVoitureVedette = elBody.querySelector('[data-component="VoitureVedette"]');
                        elVoitureVedette.parentNode.removeChild( elVoitureVedette); 
                        let elBtnRetour = document.querySelector('[data-js-retour-acceuil]');
                        elBtnRetour.parentNode.removeChild(elBtnRetour);
                        let elBtnVoirPlus = document.querySelector('[data-component="VoirPlus"]');
                        elBtnVoirPlus.parentNode.removeChild(elBtnVoirPlus); */
                        //fin modif lyes
                        /* let elFilterUn = elBody.querySelector('[data-component="FiltrerUnCritere"]');
                        let elFiltrerPlusieurs = elBody.querySelector('[data-component="FiltrerPlusieursCriteres"]');
                        let elListe = elBody.querySelector('[data-component="VoitureListe"]');
                        elFilterUn.parentNode.removeChild(elFilterUn);
                        elFiltrerPlusieurs.parentNode.removeChild(elFiltrerPlusieurs);
                        elListe.parentNode.removeChild(elListe);
                        let elMain = document.createElement('main');
                        elMain.innerHTML = xhr.responseText; */
                        //elMain.appendChild(xhr.responseText);
                      /*   elBody.appendChild(elMain); */

                        
                        
                        
/* 
                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            }); */
            // Envoi de la requète
    /*         xhr.send();
        }
    } */
}