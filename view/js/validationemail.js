
function submitfonction () {
    var msg;
    var str = document.getElementById("reinitialisation_Email").value;
    var str2 = document.getElementById("confirmation_Email").value;
    var XHR = new XMLHttpRequest();

    if (str.match( /[@]/g) &&
        str.match( /[.]/g))


        if(str===str2){

            try{
                msg = "<p style='color:green'>Le mail a été modifié</p>";

                // Configurez la requête
                XHR.open('POST', '../controller/Parametre.php?id=0',true);

                XHR.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                // Finalement, envoyez les données.
                XHR.send('reinitialisation_Email='+str+'&confirmation_Email='+str2);

            }
            catch {
                msg = "<p style='color:red'>Erreur d'envoie</p>";

            }



        }
        else {
            msg = "<p style='color:red'>Les mots de passe ne sont pas similaires</p>";
        }


    else
        msg = "<p style='color:red'>Ce n'est pas une adresse mail</p>";

    document.getElementById("msg").innerHTML= msg;

}
