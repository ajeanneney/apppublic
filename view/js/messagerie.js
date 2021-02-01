
function DeleteRow(idMessage) {
    if (confirm("Supprimer ce message ?"))
    {
        jQuery.ajax({
           url : 'deleteRow.php',
           type : 'POST', 
           data : 'idMessage=' + idMessage,
           dataType : 'html'
       });
        document.location.reload();
    }

 }
