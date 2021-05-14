class GestionPayPal{
    constructor(el) {
        this._el = el;
        this._elSubmit = this._el.querySelector('[data-js-submit]');
     
console.log(this);
        this.init();
        
    }
    init = () => {
        this.gestionPayPal();
    }

     callAJAXACM = (param, path) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?'+path);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
                        let reponse = JSON.parse(xhr.responseText);
                        
                        this.ajoutLigneCommande(reponse);
                        this.ajoutFacture(reponse);
                        
     
                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète

            xhr.send(param);
        }
    }
    ajoutFacture = (idCommande) =>{
        let param = `idCommande=${idCommande}`;
        let path =`Commande_AJAX&action=ajoutFacture`;
        this.callAJAXFACT(param, path);  
    }
    ajoutLigneCommande = (idCommande) =>{
        
        let path =`Commande_AJAX&action=ajoutLigneCommande`;

        let commande = JSON.parse(sessionStorage.commande);
            for (let j = 0; j < commande.length; j++) {
                let idVoiture = commande[j].idVoiture;
                let param = `idCommande=${idCommande}&idVoiture=${idVoiture}`;
                console.log(param);
                this.callAJAXA(param, path);                
            }
         
    }
    callAJAXA = (param, path) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?'+path);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
                        let reponse = JSON.parse(xhr.responseText);
                       
                        
                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
                // Envoi de la requète

                xhr.send(param);
            }
        }      
    
    callAJAXFACT = (param, path) => {

        // Déclaration de l'objet XMLHttpRequest
        let xhr;
        xhr = new XMLHttpRequest();

        // Initialisation de la requète
        if (xhr) {	
            
            // Ouverture de la requète : fichier recherché
            xhr.open('POST', 'index.php?'+path);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            // Écoute l'objet XMLHttpRequest instancié et défini le comportement en callback
            xhr.addEventListener('readystatechange', () => {

                if (xhr.readyState === 4) {							
                    if (xhr.status === 200) {
                        let reponse = JSON.parse(xhr.responseText);

                       
                        this._el.setAttribute("data-js-idfacture", reponse);
                        document.location.href=`index.php?Magasin&action=confPayement&idFacture=${reponse}`;
                    
     
                    } else if (xhr.status === 404) {
                        console.log('Le fichier appelé dans la méthode open() n’existe pas.');
                    }
                }
            });
            // Envoi de la requète

            xhr.send(param);
        }
    }
    gestionPayPal = () =>{
        
		// Render the PayPal button into #paypal-button-container
		paypal.Buttons({
			env: 'sandbox', // Optional: specify 'sandbox' environment
			client: {
			sandbox:    'ATlHtKh_utdnQ_wd-x91mInf3gaYJtS2KB0f4b5ewKZrhotDvxID2ROyQQiYaFhf8p4-DMH4ShaNFKfm',
			production: 'xxxxxxxxx'          
		},  
		style: {
			size: 'responsive',
			label :'checkout'
		},

			// Set up the transaction
			createOrder: function(data, actions) {
				let eltotaltvs = "" + document.querySelector('[data-js-totalfacture]').innerHTML;
				//console.log(eltotaltvs);
				return actions.order.create({
					purchase_units: [{
						amount: {
							
							value: eltotaltvs
						}
					}]
				});
			},

			// Finalize the transaction
			onApprove: function(data, actions) {
				return actions.order.capture().then(function(details) {
					// Show a success message to the buyer
					alert('La transaction a été faite ' + details.payer.name.given_name +'!');
					console.log(data);

                    // lyes
                    let idUtilisateur = document.querySelector('[data-js-utilisateur]').dataset.jsUtilisateur;
                    let optionDePaiement = document.querySelectorAll('input');
                    let idModePaiement = "";
                    let idExpedition = "";
                    let elExpedition= document.querySelectorAll('[data-js-param="expedition"]');
                    for (let j = 0; j < elExpedition.length; j++) {
                        const livraison = elExpedition[j];
                        if(livraison.checked){
                            idExpedition = livraison.value;
                        }
                    }
                    for (let k = 0; k < optionDePaiement.length; k++) {
                        const option = optionDePaiement[k];
                        
                        if(option.checked){
                            console.log(option.value);
                            idModePaiement = option.value;
                        }
    
                    }

                    let param = `idUtilisateur=${idUtilisateur}&idModePaiement=${idModePaiement}&idExpedition=${idExpedition}`;
                    let path =`Commande_AJAX&action=ajoutCommande`;
                    /* document.querySelector('[data-component="FormulaireCommande"]').callAJAXACM(param, path); */
                    
                    this.callAJAXACM(param, path);

				});
			}
		}).render('#paypal-button-container');



	
    }
      
}