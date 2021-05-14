class GestionUtilisateurs{
    constructor(el) {
        this._el = el;
        this.el_selectusername = this._el.querySelector('[data-js-utilisateurs]');
        this.el_username = this._el.querySelector('[data-js-param="username"]');
        this.el_motPasse = this._el.querySelector('[data-js-param="motPasse"]');
        this.el_prenom = this._el.querySelector('[data-js-param="prenom"]');
        this.el_nomFamille = this._el.querySelector('[data-js-param="nomFamille"]');
        this.el_courriel = this._el.querySelector('[data-js-param="courriel"]');       
        this.el_dateNaissance = this._el.querySelector('[data-js-param="dateNaissance"]');
        this.el_selecttypeUtilisateur = this._el.querySelector('[data-js-typeutilisateur]');
        this.el_telephone = this._el.querySelector('[data-js-param="telephone"]');
        this.el_noCivique = this._el.querySelector('[data-js-param="noCivique"]');
        this.el_rue = this._el.querySelector('[data-js-param="rue"]');
        this.el_codePostal = this._el.querySelector('[data-js-param="codePostal"]'); 
        this.el_telephonePortable = this._el.querySelector('[data-js-param="telephonePortable"]');				    
        this.el_selectidVille = this._el.querySelector('[data-js-ville]');
        this.el_selectidProvince = this._el.querySelector('[data-js-province]');
      
        this.init();
    }
    init = (e) => {
        
        this.el_selectusername.addEventListener('change', (e) => {
            console.log("change");

            let idUtilisateur = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsIdutilisateur;
            let idtypeUtilisateur =  this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsIdtypeutilisateur;
            console.log(idtypeUtilisateur);
            let listetypeUtilisateur = this.el_selecttypeUtilisateur.querySelectorAll('option');
            for (let j = 0; j < listetypeUtilisateur.length; j++) {
                
                const option = listetypeUtilisateur[j];
                option.removeAttribute('selected');
                if(option.value === idtypeUtilisateur){
                    option.setAttribute('selected', 'selected');
                }

            }
        let idVille =  this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsVille;
        let idProvince =  this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsProvince;
        let listeville = this.el_selectidVille.querySelectorAll('option');
        let listeprovince =  this.el_selectidProvince.querySelectorAll('option');
        for (let j = 0; j < listetypeUtilisateur.length; j++) {
                
            const option = listetypeUtilisateur[j];
            option.removeAttribute('selected');
            if(option.value === idtypeUtilisateur){
                option.setAttribute('selected', 'selected');
            }

        }
        for (let j = 0; j < listeville.length; j++) {
                
            const option = listeville[j];
            option.removeAttribute('selected');
            if(option.value === idVille){
                option.setAttribute('selected', 'selected');
            }

        }
        for (let j = 0; j < listeprovince.length; j++) {
                
            const option = listeprovince[j];
            option.removeAttribute('selected');
            if(option.value === idProvince){
                option.setAttribute('selected', 'selected');
            }

        }
        console.log(this.el_username);

        this.el_username.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsUsername;
       /*  this.el_motPasse.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsMotpasse; */
        this.el_prenom.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsPrenom;
        this.el_nomFamille.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsNomfamille;
        this.el_courriel.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsCourriel;   
        this.el_dateNaissance.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsDatenaissance;
        this.el_telephone.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsTelephone;
        this.el_noCivique.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsNocivique;
        this.el_rue.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsRue;
        this.el_codePostal.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsCodepostal;
        this.el_telephonePortable.value = this.el_selectusername.options[this.el_selectusername.selectedIndex].dataset.jsTelephoneportable;		    
        
          
        });
    }

}