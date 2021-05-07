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

        //Afficher la liste des commandes sur une table
                        var $total = 0;
                        let myTable= "<table><tr><td style='width: 200px; color: red;text-align: center;'>Nro. voiture</td>";
                        myTable+= "<td style='width: 100px; color: red; text-align: right;'>Modele</td>";
                        myTable+="<td style='width: 100px; color: red; text-align: right;'>Km</td>";
                        myTable+="<td style='width: 100px; color: red; text-align: right;'>Anee</td>";
                        myTable+="<td style='width: 100px; color: red; text-align: right;'>Couleur</td>";
                        myTable+="<td style='width: 100px; color: red; text-align: right;'>Prix</td>";
                        myTable+="<td style='width: 100px; color: red; text-align: right;'><button style='font-size: 10pt;margin-bottom: 30pt;' data-js-btnSuprimmer>Supprimer</button></td>";

                        for (let i = 0, l = data.length; i < l; i++) {
                              myTable+="<tr><td style='width: 200px;text-align: center;' data-js-vin>"+ data[i].vin + "</td>";
                              myTable+="<td style='width: 100px;text-align: right;'data-js-modele> "+data[i].modele+ "</td>";
                              myTable+="<td style='width: 200px;text-align: right;' data-js-km>"+ data[i].km + "</td>";
                              myTable+="<td style='width: 100px;text-align: right;'data-js-annee> "+data[i].annee+ "</td>";
                              myTable+="<td style='width: 200px;text-align: right;' data-js-couleur>"+ data[i].couleur + "</td>";
                              myTable+="<td style='width: 100px;text-align: right;'data-js-prix> "+Intl.NumberFormat('fr-CA').format(data[i].prix)+ "</td>";
                              myTable+="<td style='width: 100px;text-align: right;'> "+'<input type="checkbox"  data-js-sup value="' +i+'"></input>'+ "</td>";

                              
                              myTable+="</tr>";

                              


                              $total = $total + parseInt(data[i].prix);
                        }
                                                  
                          myTable+="</table>";
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

