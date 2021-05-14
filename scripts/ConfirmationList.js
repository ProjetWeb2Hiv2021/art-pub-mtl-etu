class ConfirmationList {
    constructor(el) {
        this._el = el;
        this._elSubmit = this._el.querySelector('[data-js-btn]');
        this._elResults = this._el.querySelector('[data-js-results]');
        this._elReserver = this._el.querySelector('[data-js-btnReserver]');
        //this._elBtnSup = this._el.querySelector('[data-js-btnSuprimmer]');
        this._elTotal = this._el.querySelector('[data-js-total]');
        console.log('Confirmation constructor');
        this.init();
    }

    init = (e) => {
        console.log('Confirmation init test');
        this.showPaniertList();

        this._elSubmit.addEventListener('click', (e) => {
            e.preventDefault(); console.log('Confirmation addEventListener');
           

        });


    }

    showPaniertList = () => {
        //
        var data = JSON.parse(sessionStorage.Panier);

        //Afficher la liste des commandes sur une Liste
                        var $total = 0;
                        let myTable= "<ul class='centreV'><li>VIN</li>";
                        myTable+= "<li>Modele</li>";
                        myTable+="<li>Km</li>";
                        myTable+="<li>Année</li>";
                        myTable+="<li>Couleur</li>";
                        myTable+="<li>Prix</li>";
                        myTable+="<li><button data-js-btnSuprimmer>Supprimer</button></li></ul>";

                        for (let i = 0, l = data.length; i < l; i++) {
                              myTable+="<ul><li data-js-vin data-js-vin>"+ data[i].vin + "</li>";
                              myTable+="<li data-js-modele data-js-modele> "+data[i].modele+ "</li>";
                              myTable+="<li data-js-km data-js-km>"+ Intl.NumberFormat().format(data[i].km) + "</li>";
                              myTable+="<li data-js-annee data-js-annee> "+data[i].annee+ "</li>";
                              myTable+="<li data-js-couleur data-js-couleur>"+ data[i].couleur + "</li>";
                              myTable+="<li data-js-prix data-js-prix> "+Intl.NumberFormat('fr-CA').format(data[i].prix)+ "</li>";
                              myTable+="<li>"+'<input type="checkbox"  data-js-sup value="' +i+'"></input>'+ "</li></ul>";

                              
                              

                              


                              $total = $total + parseInt(data[i].prix);
                        }
                                                  
                          
                          this._elResults.innerHTML = myTable;
                         
                          //Afficher le total ($)
                          this._elTotal.innerHTML = "Total: " + Intl.NumberFormat('fr-CA').format($total) + "$";
                          //let elModele = document.querySelectorAll('[data-js-modele]');
                          let elCheck = document.querySelectorAll('[data-js-sup]');
                          this._elBtnSup = this._el.querySelector('[data-js-btnSuprimmer]');

                          this._elBtnSup.addEventListener('click', (e) => {
                                e.preventDefault();
                                if (sessionStorage.getItem('Panier')) this.supprimerVehicule(data,elCheck);
                        });
    }


    supprimerVehicule = (data,elCheck) => {

        let tableauObjets;
        tableauObjets = JSON.parse(sessionStorage.getItem('Panier'));
        for (let i = 0, l = data.length; i < l; i++) {
            if(elCheck[i].checked) {
                console.log('Supprimer: '+i);
                
                tableauObjets[i].vin = "1";
            }
        }

        var elConteur = document.getElementById("conteurVoiture");
        let cont = 0;
		
		if (sessionStorage.getItem('conteurVoiture'))
        {
                cont = parseInt(sessionStorage.getItem('conteurVoiture'));
        }
        for (let i =  data.length - 1; i >= 0; i--) {
            if(tableauObjets[i].vin === "1") {
                tableauObjets.splice( i, 1 );
                cont = cont - 1;
            }
        }

               
        // Afficher le conteur sur la page à coté du icone.
        if (cont==0)
            elConteur.innerHTML = "";
        else
            elConteur.innerHTML = cont;
        
        // Sauvegarde la variable de session
        sessionStorage.setItem('conteurVoiture', cont);
        sessionStorage.setItem('Panier', JSON.stringify(tableauObjets));
        location.reload();


    }


}

