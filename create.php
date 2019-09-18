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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<!------------------------------------------------------------------------->

<!------------------------------------------------------------------------>
<header>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Expense Manager</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="listerResa.php"> Réservation</a></li>
      <li><a href="update.php">Modifier réservation</a></li>
      <li><a href="clients.php"> Plan & Client</a></li>
      <li><a href="create.php"> </a></li>
    </ul>
    <!--<button class="btn btn-primary navbar-btn"></button>-->
  </div>
</nav>
</header>


<body>
<form action="" method="post">
<h1>Entrer le collaborateur et la date de réservation</h1>
<h1>pour le véhicule immatriculé : <?php 
                                            if(isset($_GET['idResa'])){
                                                echo $_GET['idResa'];
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
