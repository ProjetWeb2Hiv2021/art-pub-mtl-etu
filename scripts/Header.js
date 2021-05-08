class Header {
    constructor(el) {
        this._el = el;
        this._elIconeProfil = this._el.querySelector('[data-js-icone-profil]');
        this._elNomUtilisateur = this._el.querySelector('[data-js-utilisateur-connecte]');
        this._elMenuProfil = this._el.querySelector('.menu_profil');
        this._elSelectLangue = this._el.querySelector('[data-js-langue]');
        this._elbtnForm = this._el.querySelector('[data-js-btn]');
        console.log(this._elSelectLangue);

        this.init();
    }

    init = () => {
        if(this._elNomUtilisateur){
            this._elNomUtilisateur.addEventListener('click', () => {
                if(this._elMenuProfil.style.display == "block"){
                    this._elMenuProfil.style.display = "none";
                }else{
                    this._elMenuProfil.style.display = "block";
                }          
            });
            this._elMenuProfil.addEventListener('mouseover', () => {
                this._elMenuProfil.style.display = "block";
            });
            this._elMenuProfil.addEventListener('mouseleave', () => {
                this._elMenuProfil.style.display = "none";
            }); 
        }

        
/*         this._elSelectLangue.addEventListener('change', () => {
            console.log();
            let langue = this._elSelectLangue.options[this._elSelectLangue.selectedIndex].value;
            console.log(langue);
            document.location.href=`index.php?Magasin&action=""&langue=${langue}`;
        }); */
		
		        //Afficher conteur dans le header
        var elConteur = document.getElementById("conteurVoiture");

        let cont = 0;
        if (sessionStorage.getItem('conteurVoiture'))
        {
            cont = parseInt(sessionStorage.getItem('conteurVoiture'));           
        }
            
        // Afficher le conteur sur la page à coté du icone.
        if (cont==0)
            elConteur.innerHTML = "";
        else
            elConteur.innerHTML = cont;
		
		
		
        
    } 


}