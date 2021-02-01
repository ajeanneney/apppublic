var elt = document.querySelector('select');
var container0 =document.getElementById("chartContainer0")
var container1 =document.getElementById("chartContainer1")
var container2 =document.getElementById("chartContainer2")
var myVar = setTimeout(hide, 30);


elt.addEventListener('change', function () {
    console.log(this.selectedIndex);

    if (this.selectedIndex === 0){
        container0.style.display = "";
        container0.style.height = "400px";
        container0.style.width = "90%";

        container1.style.display = "none";
        container2.style.display = "none";


    }

    if (this.selectedIndex === 1){
        container0.style.display = "none";

        container1.style.display = "";
        container1.style.height = "400px";
        container1.style.width = "90%";

        container2.style.display = "none";

    }

    if(this.selectedIndex === 2){
        container0.style.display = "none";
        container1.style.display = "none";

        container2.style.display = "";
        container2.style.height = "400px";
        container2.style.width = "90%";

    }
})

function hide() {
    container1.style.display = "none";
    container2.style.display = "none";

}