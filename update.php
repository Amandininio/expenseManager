<?php
require_once ('model.php');
require_once ('functions.php');

$reservations = readResa($db,$_GET['idResa']);

$dateResa = explode( '-', $reservations['dateResa'] );

$collaborateurs = readCollaborateurs($db);
$vehicules = readVehicules($db);

// Adapte les données pour l'affichage
$collaborateursAdapte = [];
foreach ($collaborateurs as $collaborateur){
    $collaborateursAdapte[] = [
        'collaborateur' => $collaborateur['Genre'].' '.$collaborateur['Nom'].' '.$collaborateur['Prenom'],
    ];
}

$vehiculesAdapte = [];
foreach ($vehicules as $vehicule){
    $vehiculesAdapte[] = [
        'vehicule' => $vehicule['Immatriculation'],
    ];
}

if(isset($_POST['listeCollaborateur'])) {
    $idResa = $_GET["idResa"];
    $dateResa = $_POST['annee'].'-'.$_POST["mois"].'-'.$_POST["jour"];
    $collaboResa = $_POST['listeCollaborateur'];
    $vehiculeResa = $_POST['listeVehicule'];

    updateResa($db, $idResa, $dateResa,$collaboResa, $vehiculeResa);

    header('location:index.php');
}

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<fieldset>

<h1>Modifier une réservation : </h1>
</fieldset>
<br />
<h1>Modifiez les champs souhaités et cliquez sur</h1>
<h1>ENREGISTRER pour modifier la réservation suivante :  </h1>
<fieldset>
<p>Choix du collaborateur : </p>

<form method="post" action="">
    <select name="listeCollaborateur">
        <?php echo selectOptions(afficherListeCollaborateurs($collaborateursAdapte),$reservations['collaboResa'])?>
    </select>
    <p>Liste Véhicules : </p>
    <select name="listeVehicule">
        <?php echo selectOptions(afficherVehicules($vehiculesAdapte),$reservations['vehiculeResa'])?>
    </select>
    <p>Date de reservation : </p>
    <select name="jour"><?php echo selectOptionsNumeric(1,31,$dateResa[2])?></select>
    <select name="mois"><?php echo selectOptionsNumeric(1,12,$dateResa[1])?></select>
    <select name="annee"><?php echo selectOptionsNumeric(2019,2023,$dateResa[0])?></select><br />

    <input type="submit" value="Enregistrer">

</form>
</fieldset>
</body>
</html>
