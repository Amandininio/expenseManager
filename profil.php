<?php
include_once('functions.php');
include_once('model.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Document</title>
</head>

<header class="page-header">
<p>
    <img src="img/Albert.png" alt="Avatar" id="img">
</p>
</header>

<body class="container">

<label for=""></label>

<div>
<?php
$collaborateurs = readCollaborateurs($db);

// Adapte les données pour l'affichage
$collaborateursAdapte = [];
foreach ($collaborateurs as $collaborateur){
    $collaborateursAdapte[] = [
        'Selection' => '<input type="radio"
                        name="selection"
                        value="'.$collaborateur['Genre'].' '.$collaborateur['Nom'].' '.$collaborateur['Prenom'].'"/>',
        'Genre' => $collaborateur['Genre'],
        'Nom' => $collaborateur['Nom'],
        'Prenom' => $collaborateur['Prenom'],
    ];
}


if(isset($_POST['jour'])) {
         $annee = $_POST['annee'];
         $mois= $_POST["mois"];
         $jour= $_POST["jour"];
         $idVehicule = $_GET["id"];
         $idCollabo = $_POST['selection'];

    ajoutReservation($db, $annee, $mois, $jour, $idVehicule, $idCollabo);

header('location:index.php');
}
afficherListeCollaborateurs($collaborateurs);
?>
</div>
</body>
</html>