<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../view/pictures/logoSH.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../view/css/main.css">
    <link rel="stylesheet" href="../view/css/gestionnaire.css">
    <title>Gestionnaire</title>

    <script type="text/javascript">
    	function hideAndSee() {
    		divMedecin = document.getElementById('idMedecin');
    		divPatient = document.getElementById('idPatient');
    		divMail = document.getElementById('divMail');
    		var select = document.getElementById('role').value;
    		if (select == 'patient'){
    			divMedecin.style.display = "block";
    			divPatient.style.display = "none";
    			divMail.style.display = "none";
    		}
    		else if (select == 'famille'){
    			divPatient.style.display = "block";
    			divMedecin.style.display = "none";
    			divMail.style.display = "block";
    		}
    		else if (select == 'medecin' || select == 'gestionnaire'){
    			divMail.style.display = "block";
    			divMedecin.style.display = "none";
    			divPatient.style.display = "none";
    		}
    	}

    </script>

</head>
<body>

<header>
    <img id="logoheader" src="../view/pictures/logoSH.png" alt="Logo Senior Healthcare">
    <h1> Espace Gestionnaire </h1>
    <div class="block_center"> </div>
</header>


<main>

    <nav class="menu">
        <ul>
            <li class="menu_bilan"> <a class="bouton_classique" href="../index.php"> Accueil </a></li>
            <li class="faq"> <a class="bouton_classique" href="../view/html/faq.php"> F.A.Q </a></li>
            <li class="compte"><a class="bouton_classique" href="Parametre.php?id=0"> Mon Compte </a>
                <ul class="subcompte">
                    <li> <a href="Parametre.php?id=1">Mot de passe </a> </li>
                    <li> <a href="Parametre.php?id=2">Adresse mail</a> </li>
                    <li> <a href="Parametre.php?id=3">Contact </a> </li>
                    <li> <a href="Parametre.php?id=4">Déconnexion</a> </li>
                </ul>
            </li>
            <li class="message"><a href="../view/html/messagerie.php"> Consulter mes messages</a> </li>

        </ul>
    </nav>

<div class="container">

	<div class="ajoutQuestion">
	<form action="" method="post">
		<h2>Ajouter une question à la faq</h2>
		<div class="formulaire">
			<label class="titre_champ" for="question">Question :</label> <br>
			<textarea required name="question" id="question" rows="2" cols="35" class="champ_textarea"> </textarea>
		</div>
		<div class="formulaire">
			<label class="titre_champ" for="reponse">Reponse :</label> <br>
			<textarea required name="reponse" id="reponse" rows="5" cols="35" class="champ_textarea"> </textarea>
		</div>
		<div class="div_submit formulaire">
			<input class="bouton_submit" type="submit" name="ajouter" value="Ajouter">
		</div>
	</form>
	</div>


	<div class="ajoutUser">
	<form action="" method="post">
		<h2>Ajouter un nouvel utilisateur</h2>

		<div class="formulaire">
			<label class="titre_champ" for="role">Role de l'user</label>
			<select name="role" id="role" onchange="hideAndSee()" class="champ">
				<option value="" selected disabled hidden>Choisir un rôle</option>
				<option value="patient">Patient</option>
				<option value="famille">Famille</option>
				<option value="medecin">Medecin</option>
				<option value="gestionnaire">Gestionnaire</option>
			</select>
		</div>

		<div class="formulaire">
			<label class="titre_champ" for="prenom">Prénom :</label>
			<input class="champ" type="text" name="prenom" id="prenom">
		</div>

		<div class="formulaire">
			<label class="titre_champ" for="nom">Nom :</label>
			<input class="champ" type="text" name="nom" id="nom">
		</div>

		<div class="formulaire">
			<div id="divMail" style="display: none">
				<label class="titre_champ" for="mail">Adresse mail :</label>
				<input class="champ" type="email" name="mail" id="mail">
			</div>
		</div>

		<!-- si role == patient -->
		<div class="formulaire">
		<div id="idMedecin" style="display: none">
			<label for="naissance" class="titre_champ">Date de naissance</label>
			<input type="date" class="champ" name="naissance" id="naissance"><br><br>

			<label for="medecin" class="titre_champ">Medecin attribué a ce patient :</label>
				<select name="medecin" id="medecin" class="champ">
					<option value="" selected disabled hidden>Choisir un medecin</option>
					<?php
						$medecins = getTable('medecin');
						while($medecin = $medecins->fetch()){
							$prenomMedecin = $medecin['prenom'] . ' ' . $medecin['nom'];
							$idMedecin = $medecin['id'];
							?>
							<option value="<?= $idMedecin ?>"><?= $prenomMedecin ?></option>
							<?php
						}
					?>
				</select>
		</div>
		</div>

		<!-- si role == famille -->
		<div class="formulaire">
			<div id="idPatient" style="display: none">
				<label class="titre_champ" for="patient">Patient de cette famille :</label>
				<select class="champ" name="patient" id="patient">
					<option value="" selected disabled hidden>Choisir un patient</option>
					<?php
						$patients = getTable('patient');
						while($patient = $patients->fetch()){
							$prenomPatient = $patient['prenom'] . ' ' . $patient['nom'];
							$idPatient = $patient['id'];
							?>
							<option value="<?= $idPatient ?>"><?= $prenomPatient ?></option>
							<?php
						}
					?>
				</select>
			</div>
		</div>
		<div class="div_submit formulaire">
			<input class="bouton_submit" type="submit" name="ajouter" value="Ajouter">
		</div>

        <h2>Rechercher un utilisateur </h2>

        <div class="centre"> <a class="bouton_classique" href="../view/html/rechercheuser.php"> Par nom </a> </div> <br> <br>


    </form>
	</div>

</div>
</main>

    <?php
    include("footer.php");
    ?>

</body>

</html>
