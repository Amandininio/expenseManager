<?php
require_once ('model.php');
require_once ('functions.php');

$vehicules = readVehicules($db);


// Adapte les données pour l'affichage
$vehiculesAdapte = [];
foreach ($vehicules as $vehicule){
    $vehiculesAdapte[] = [
        //'Supprimer' => '<input type="checkbox" name="supprimer[]" value="'.$vehicule['Immatriculation'].'"/>',
        'Immatriculation' => '<a href="create.php?id='.$vehicule['Immatriculation'].'" > '.$vehicule['Immatriculation'].'
        </a>',
        'Marque' => $vehicule['Marque'],
        //'Modele' => $vehicule['Modele'],
        'Couleur' => $vehicule['Couleur']
    ];
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Expense Manager</title>
  </head>
  
<!-----------------Logo---------------------------------------->
    <p class="padding"> 
      <img src="img/logo1.jfif" alt="" class="responsive">   
  </p>


  <header class>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Expense Manager</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="listerResa.php"> Réservation</a></li>
      <li><a href="update.php">Modifier réservation</a></li>
      <li><a href="clients.php"> Plan & Client</a></li>
      <li><a href="profil.php"> Compte Utilisateur</a></li>
    </ul>
    <!--<button class="btn btn-primary navbar-btn"></button>-->
  </div>
</nav>
<input type="text" name="search" placeholder="Search..">

</header>
<!------------------------Menu--------------------------------------->

<body class="container mb-12">
<h1 class="container">Gestion de mission</h1>
<div class="container">
      <script>
              var aujourdhui = new Date(); 
              var annee = aujourdhui.getFullYear(); // retourne le millésime
              var mois =aujourdhui.getMonth()+1; // date.getMonth retourne un entier entre 0 et 11 donc il faut ajouter 1
              var jour = aujourdhui.getDate(); // retourne le jour (1à 31)
              var joursemaine = aujourdhui.getDay() ; // retourne un entier compris entre 0 et 6 (0 pour dimanche)
              var tab_jour=new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
              document.write('Nous sommes le : ' +  tab_jour[joursemaine] + ' ' + jour + '/' + mois + '/' + annee) ;
      </script><br>
      <script type="text/javascript">
              var ladate=new Date()
              document.write("Heure Locale Fr : ");
              document.write(ladate.getHours()+":"+ladate.getMinutes()+":"+ladate.getSeconds())
              document.write("<BR>");
              var h=ladate.getHours();
              if (h<10) {h = "0" + h}
              var m=ladate.getMinutes();
              if (m<10) {m = "0" + m}
              var s=ladate.getSeconds();
              if (s<10) {s = "0" + s}
      </script><br>

<!-------------Tableau Récap de la réservation voitures ---------------------------------------------------------->

<form action="listerResa.php" method="post" class="footer">
    <fieldset>
              <?php echo afficheTableau($vehiculesAdapte)?><br>
          <input type="submit" name="btnAfficherListe" value="Réservations" class=" btn btn-success" />
      
    </fieldset>
</form>
</div>
<!-----------------------Contenu----------------------------------------->


<!-------------------------Frais de déplacement---------------------------------------------->
<div>
  <h2 id="note">Notez toutes vos charges ici !!</h2>
  <div class="grid-group mb-12">
      <textarea type="text" class="form-control" placeholder="Notes de frais & déplacements"></textarea>
  </div>
</div>

<!-----------------------Choix du fichier a télécharger-------------------------------------------------------->
      <div class="padding">
        <div class="input-group mb-2" id= "rechercheDoc">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Charger votre fichier</span>
            </div>
            
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Importer </label>
            </div>
<!-----------------------Choix du fichier a télécharger-------------------------------------------------------->
        <button type="button" class="btn btn-success">Envoyer</button>
      </div>
    </div>
</form>
<!-------------------------Frais de déplacement---------------------------------------------->


<!-- Footer -->
<footer>

</footer>
  <!-- Footer Elements -->
</body>
</html>