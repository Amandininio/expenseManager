<?php
require_once ('model.php');
require_once ('functions.php');

$vehicules = readVehicules($db);

// Adapte les données pour l'affichage
$vehiculesAdapte = [];
foreach ($vehicules as $vehicule){
    $vehiculesAdapte[] = [
        //'Supprimer' => '<input type="checkbox" name="supprimer[]" value="'.$vehicule['Immatriculation'].'"/>',
        'Immatriculation' => '<a href="create.php?id='.$vehicule['Immatriculation'].'" > '.$vehicule['Immatriculation'].'   </a>',
        //'Immatriculation' => $vehicule['Immatriculation'],
        'Marque' => $vehicule['Marque'],
        'Modele' => $vehicule['Modele'],
        'Couleur' => $vehicule['Couleur'],
    ];
}
?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" rel="stylesheet">
    <title>Société MAKI - Réservation de véhicules</title>
</head>

<!------------------------------------------------------------------------->
<body>
    
<fieldset>
<h1>Bonjour & Bienvenue chez 
    Expense Manager
</h1>
</fieldset>
<br />

<h2>liste des véhicules disponibles : </h2>


<!------------------------------------------>
<!------------------------------------------>




<!------------------------------------------>
<!------------------------------------------>
<h4>Cliquez ici pour trouver une voiture libre</h4>


<!------------------------------------------>
<?php //var_dump($vehiculesAdapte);?>



<form action="listerResa.php" method="post">
        <?php echo afficheTableau($vehiculesAdapte)?>
    <input type="submit" name="btnAfficherListe" value="Réservations" id="boutton" />
</form>
</body>
</html>
