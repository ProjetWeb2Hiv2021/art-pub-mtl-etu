class FiltrerUnCritere {
    constructor(el) {
        this._el = el;
        this._elSelect = this._el.querySelector('select');
        this._elSubmit = this._el.querySelector('[data-js-btn]');

        this._elResults = document.querySelector('[data-js-voiture]');

        this.init();
    }

    init = (e) => {

        this._el.addEventListener('change', (e) => {
            e.preventDefault();

            if (this._elSelect.options[this._elSelect.selectedIndex].value != 0) this._elSubmit.classList.remove('disabled');
            else this._elSubmit.classList.add('disabled');
        });


        this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault();
            
            let value = this._elSelect.options[this._elSelect.selectedIndex].value;
            this.callAJAX(value);
        });
    }


    callAJAX = (param) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('GET', 'index.php?Magasin_AJAX&action=filtrerUnCritere&column=' + param);
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {

                        // Traitement du DOM
                        this._elResults.innerHTML = xhr.responseText;


                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète
            xhr.send();
        }
    }
}