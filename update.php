<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
    <title>Document</title>
</head>
<!-------------------------------------------------------------------------------------------------------------------->

<header>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Expense Manager</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="listerResa.php">Réservation</a></li>
      <li><a href="update.php">Modifier réservation</a></li>
      <li><a href="clients.php"> Plan & Client</a></li>
    </ul>
    <!--<button class="btn btn-primary navbar-btn"></button>-->
  </div>
</nav>
<input class="autofocus" type="text" name="search" placeholder="Search">
</header>
<!-------------------------------------------------------------------------------------------------------------------->
<body class="">
<fieldset>
<h1 class="">Modifier la réservation  </h1>
<?php
require_once ('model.php');
require_once ('functions.php');
if(isset($_GET['idResa'])){
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
</fieldset><br />

<fieldset>
<p class="p">Choix du collaborateur : </p>

<form method="post" action="" class="">
    <select name="listeCollaborateur" class="form-control">
        <?php echo selectOptions(afficherListeCollaborateurs($collaborateursAdapte),$reservations['collaboResa'])?>
    </select><br>

    
    <p class="p">Liste Véhicules : </p>
    <select name="listeVehicule" class="form-control">
        <?php echo selectOptions(afficherVehicules($vehiculesAdapte),$reservations['vehiculeResa'])?>
    </select>

    <p class="p">Date de reservation : </p>
    <select name="jour" class="form-control"><?php echo selectOptionsNumeric(1,31,$dateResa[2])?></select>
    <select name="mois" class="form-control"><?php echo selectOptionsNumeric(1,12,$dateResa[1])?></select>
    <select name="annee" class="form-control"><?php echo selectOptionsNumeric(2019,2023,$dateResa[0])?></select><br />

    <input type="submit" value="Enregistrer" class="btn btn-primary">

</form>
</fieldset>
<?php
} else {
    header('Location: http://localhost/expenseManager2/listerResa.php');    
}
?>

</body>
</html>
