var like = document.getElementById('like');

var etat2 = true
var divElement = document.getElementById('like');

// Ajouter un écouteur d'événement pour détecter les clics sur la div
divElement.addEventListener('click', function() {
    if (etat == true){
    like.style.fill = 'red'
    etat = false
    }
    else if(etat== false){
    like.style.fill = '#D9D9D9'   
    etat = true     
    }

}); 

var fleche = document.getElementById('fleche');
var cadre = document.getElementById("cadreMenu");



fleche.addEventListener('click', function() {
    if (etat2 == true){
        cadre.style.width="70px"
        etat2 = false

        var item = document.getElementById("menu")
        item.style.display="none"
        var item = document.getElementById("home")
        item.style.display="none"
        var item = document.getElementById("search")
        item.style.display="none"
        var item = document.getElementById("notif")
        item.style.display="none"
        var item = document.getElementById("explore")
        item.style.display="none"
        var item = document.getElementById("profile")
        item.style.display="none"
        var item = document.getElementById("settings")
        item.style.display="none"

        const elements = document.querySelectorAll('.middleMenu div a');
        elements.forEach(element => {
            element.style.margin = "0px"
        });
        


















        }
        else if(etat2== false){
        cadre.style.width="340px"

        etat2 = true     
        }
    
   
}); 