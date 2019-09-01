<?php
require_once ('model.php');
require_once ('functions.php');


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



//$vehicule = readVehicule($db,$_GET['id']);
//$id= $vehicule['Marque'];

//$tblDate = explode('-',$tableauResa['dateResa']);

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

<form action="" method="post">
<h1>Entrer le collaborateur et la date de réservation</h1>
<h1>pour le véhicule immatriculé : <?php 
                                            if(isset($_GET['id'])){
                                                echo $_GET['id'];
                                            }
                                            
                                   ?> </h1>
<p>Choix du collaborateur : </p>


    <h3></h3>
    <?php echo afficheTableau($collaborateursAdapte); readVehicule($db,$_GET['id'])?>
    <p>Date de reservation : </p>
    <select name="jour"><?php echo selectOptionsNumeric(1,31,$dateResa[2])?></select>
    <select name="mois"><?php echo selectOptionsNumeric(1,12,$dateResa[1])?></select>
    <select name="annee"><?php echo selectOptionsNumeric(2019,2023,$dateResa[0])?></select><br />

    <input type="submit" value="Enregistrer" >

</form>
</body>
</html>
