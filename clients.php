<?php
require_once ('model.php');
require_once ('functions.php');

$vehicules = readVehicules($db);

// Adapte les données pour l'affichage
$vehiculesAdapte = [];
foreach ($vehicules as $vehicule){
    $vehiculesAdapte[] = [
        'Supprimer' => '<input type="checkbox" name="supprimer[]" value="'.$vehicule['Immatriculation'].'"/>',
        'Immatriculation' => '<a href="create.php?id='.$vehicule['Immatriculation'].'" > '.$vehicule['Immatriculation'].'
        </a>',
        'Marque' => $vehicule['Marque'],
        /*'Modele' => $vehicule['Modele'],*/
        'Couleur' => $vehicule['Couleur']
    ];
}
?>
<!--------------------------------------------------------------------------------------------------->


<!--------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Document</title>
</head>

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
<input class="autofocus" type="text" name="search" placeholder="Search">
</header>

<body>
<h1>Page Clients</h1>
    
   
<div id="googleMap" style="width:100%;height:azuto;">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11614.742703174841!2d-0.36542149999999995!3d43.299903799999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1567258368456!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="">
</iframe>
</div>

<form action="listerResa.php" id="formulaire" class="container mb-12" method="post">
    <div class="mb-12">
          <div class="col-7">
          <h2 class="mb-12">Formulaire Client</h2>
            <input type="text" class="form-control" placeholder="Prénom">
          </div>
          <div class="col-7">
            <input type="text" class="form-control" placeholder="Nom">
          </div>
          <div class="form-row">
                <div class="col-7">
                  <input type="text" class="form-control" placeholder="Ville">
                </div>
                <div class="col-7">
                  <input type="text" class="form-control" placeholder="Email">
                </div>
                <div class="col-7">
                  <input type="text" class="form-control" placeholder="Numéro de téléphone">
                </div>
                <button type="submit" class="btn-primary">Connection</button>
           </div>
    </div>
</div>
</form>
</body>
</html>

