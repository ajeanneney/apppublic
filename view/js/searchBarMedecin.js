
function SearchFunction() {
    // Variables
    var input, filter, divparent, divenfant, divtexte, i,a,divtexteenfant;
    input = document.getElementById("bar_recherche");
    filter = input.value.toUpperCase();
    divparent = document.getElementById("liste_de_barre");
    divenfant = divparent.getElementsByClassName("div_barre");

    //Loop sur toute la liste de li par les h2 et cache ceux qui ne match pas
    for (i = 0; i < divenfant.length; i++) {
        divtexte = divenfant[i].getElementsByTagName("div");
        for (a=0; a< divtexte.length;a++ ){
            console.log(divtexte[a].innerHTML.toUpperCase().indexOf(filter))
            if (divtexte[a].innerHTML.toUpperCase().indexOf(filter) > -1) {
                divenfant[i].style.display = "";
                break;
            } else {
                divenfant[i].style.display = "none";
            }

        }
    }


}
