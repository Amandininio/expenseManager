<?php
require_once ('model.php');
require_once ('functions.php');

$tableauResas = readtableauResas($db);

// Adapte les données pour l'affichage
$tableauResaAdapte = [];
foreach ($tableauResas as $tableauResa){
    $tableauResaAdapte[] = [

        'Sélection' => '<input type="radio" name="idResa" value="'.$tableauResa['idResa'].'"/>',
        'Date' => $tableauResa['dateResa'],
        //'Immatriculation' => $vehicule['Immatriculation'],
        'Collaborateur' => $tableauResa['collaboResa'],
        'Véhicule' => $tableauResa['vehiculeResa'],
    ];
}

if(isset($_POST['btnUpdate'])) {
    $idResa = $_POST['idResa'];
    header("location:update.php?idResa=$idResa");
}



if(isset($_POST['btnSupprimer'])) {
    $idResa = $_POST['idResa'];


    deleteResa($db,$idResa);
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

    <h2>Tableau des réservations classé par date</h2>
    <form method="post" action="">
    <?php echo afficheTableau($tableauResaAdapte) ?>

        <input type="submit" name ="btnSupprimer" value="Supprimer" />
        <input type="submit" name="btnUpdate" value="Modifier" />
    <form>

    </form>
</fieldset>


</body>
</html>