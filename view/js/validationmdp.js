function validate() {
    var msg;
    var str = document.getElementById("reinitialisation_mdp").value;

    if (str.match( /[0-9]/g) &&
        str.match( /[A-Z]/g) &&
        str.match(/[a-z]/g) &&
        str.match( /[^a-zA-Z\d]/g) &&
        str.length >= 8)

        msg = "<p style='color:green'>Mot de passe fort.</p>";


    else
        msg = "<p style='color:red'>Mot de passe faible.</p>";
    document.getElementById("msg").innerHTML= msg;
}




function submitfonction () {
    var msg;
    var str = document.getElementById("reinitialisation_mdp").value;
    var str2 = document.getElementById("confirmation_mdp").value;
    var XHR = new XMLHttpRequest();

    if (str.match( /[0-9]/g) &&
        str.match( /[A-Z]/g) &&
        str.match(/[a-z]/g) &&
        str.match( /[^a-zA-Z\d]/g) &&
        str.length >= 8)

        if(str===str2){

            try{
                msg = "<p style='color:green'>Le mot de passe a été modifié</p>";

                // Configurez la requête
                XHR.open('POST', '../controller/Parametre.php?id=0',true);

                XHR.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                // Finalement, envoyez les données.
                XHR.send('reinitialisation_mdp='+str+'&confirmation_mdp='+str2);

            }
            catch {
                msg = "<p style='color:red'>Erreur d'envoie</p>";

            }



        }
        else {
            msg = "<p style='color:red'>Les mots de passe ne sont pas similaires</p>";
        }


    else
        msg = "<p style='color:red'>Mot de passe faible.</p>";

    document.getElementById("msg").innerHTML= msg;

}
