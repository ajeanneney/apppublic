function cacher() {
    var x = document.getElementById("reinitialisation_mdp");
    var y = document.getElementById("confirmation_mdp");

    if (x.type === "password") {
        x.type = "text";
        y.type = "text";


    } else {
        x.type = "password";
        y.type = "password";
    }
}