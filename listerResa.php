<?php
require_once ('model.php');
require_once ('functions.php');
//=================================================//
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

/*if(isset($_POST['btnCreate'])){
    header("location:create.php");
}*/

if(isset($_POST['btnSupprimer'])) {
    $idResa = $_POST['idResa'];


    deleteResa($db,$idResa);
    header('location:index.php');
}
?>
<!--------------------------------------------------------------->


<!----------------------Application Expense Manager----------------------------------------->
<!doctype html>
<html lang="fr">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Document</title>

<!---------------------Application Expense Manager------------------------------------------>


<header>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Expense Manager</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="listerResa.php">Réservation</a></li>
     
      <li><a href="clients.php"> Plan & Client</a></li>
    </ul>
    <!--<button class="btn btn-primary navbar-btn"></button>-->
  </div>
</nav>
<input type="text" name="search" placeholder="Search..">
<div class="container">
</div>
</header>


<!--------------------------------------------------------------->
<body class="padding">
    <h2 class="padding">Tableau des réservations classé par date</h2><br><br>

<form method="post" action="#" class="padding" >
  <div class="container mb-12">
    <?php echo afficheTableau($tableauResaAdapte) ?>
  </div>


<!--------------------------------------------------------------->



<div class="block">
        <input type="submit" name ="btnSupprimer" class="btn btn-danger" value="Supprimer" />
        <input type="submit" name="btnUpdate" value="Modifier" class="btn btn-success" id="modif"/>
        <input type="submit" name="btnCreate" value="Créer" class= "btn btn-primary" id="creer"/>
</div>
</form>
<!--------------------------------------------------------------->
</body>
</html>