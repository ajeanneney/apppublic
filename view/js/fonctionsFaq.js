function afficheMenu(obj) {

    // variables
    var idquestion = obj.id;
    var idreponse = 'reponse' + idquestion;
    var reponse = document.getElementById(idreponse);
    var idfleche = 'fleche' + idquestion;
    var fleche = document.getElementById(idfleche);

    /*****************************************************/
    /**	on cache toutes les réponse pour n'afficher    **/
    /** que celle dont la question correspondant est cliqué **/
    /*****************************************************/


    if (document.getElementById('reponse' + 1) && document.getElementById('reponse' + 1) != reponse) {
            document.getElementById('reponse' + 1).style.display = "none";
        }


    if (reponse) {

        if (reponse.style.display == "block") {
            reponse.style.display = "none";
            fleche.setAttribute("style", "transform-origin: center; transform: rotate(0deg)");

        } else {
            reponse.style.display = "block";
            fleche.setAttribute("style", "transform-origin: center; transform: rotate(90deg)");


        }
    }

}