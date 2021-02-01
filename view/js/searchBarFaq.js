
function SearchFunction() {
    // Variables
    var input, filter, ul, li, h2, i;
    input = document.getElementById("bar_recherche");
    filter = input.value.toUpperCase();
    ul = document.getElementById("faq");
    li = ul.getElementsByTagName("li");


    //Loop sur toute la liste de li par les h2 et cache ceux qui ne match pas
    for (i = 0; i < li.length; i++) {
        h2 = li[i].getElementsByTagName("h2")[0];
        if (h2.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
