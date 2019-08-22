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
        'Immatriculation' => $vehicule['Immatriculation'],
        'Marque' => $vehicule['Marque'],
        'Modele' => $vehicule['Modele'],
        'Couleur' => $vehicule['Couleur'],
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

    <title>Expense Manager</title>
  </head>
  <body>
     
 
<!------------------Heure & Date---------------------------------------->
<p id="logo"> <img src="img/index.png" alt="" > </p>
    <h1>Gestion de mission</h1>
    <div class="container mb-">
      <input type="email" name="email" id="email" class="form-control" placeholder="Login"><br>
      <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Mot de passe"><br>
      <button type="submit" class="btn-primary">Connection</button>
      
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Acceuil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Missions<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Statistiques</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Clients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#" tabindex="-1">Login</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Valider</button>
            
          </form>
        </div>
      </nav>
<!------------------------Menu--------------------------------------->


<!-----------------------Contenu----------------------------------------->

<form id="formulaire" class="mb-12">
        <div class="mb-12">
          <div class="col-7">
          <h2 class="mb-12">Formulaire du client</h2>
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
              </div>

<!------------------Heure & Date--------------------------------------->
<div class="row">
<!--<script>
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
</script><br>-->

<!-------------Tableau Récap de la réservation voitures ---------------------------------------------------------->
<form action="listerResa.php" method="" class="mb-10 xs-4">
  <?php echo afficheTableau($vehiculesAdapte) ?><br>
    <input type="submit" name="btnAfficherListe" value="Réservations" id="boutton" class="primary"/>
</form>
</div>

          <div><br><br>
              <label for="">Commercial </label>
              <select name="" id="liste">
                  <option value="">Michel Brun</option>
                  <option value="">Pierce browsman</option>
                  <option value="">Chuck Norris</option>
                  <option value="">Jesus Christ</option>
              </select>
             <label for="">Date de rendez-vous  <input type="date" name="date" id="date"></label><br>
              <textarea name="" id="" cols="30" rows="10" placeholder="Commenter la situation avec le client"></textarea>
              
              
          </div>
        </div>

<!-----------------------Contenu----------------------------------------->


<!-------------------------Frais de déplacement---------------------------------------------->
<div>
  <div class="grid-group mb-12">
      <input type="text" class="form-control" placeholder="Notes de frais & déplacements">
  </div>
</div>

<h2>Notez toutes vos charges ici !!</h2>


<!-----------------------Choix du fichier a télécharger-------------------------------------------------------->
      <div class="input-group mb-3" id= "rechercheDoc">
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
</form>
<!-------------------------Frais de déplacement---------------------------------------------->


<!----------------------- Tableau Récapitulatif Portefeuil client---------------------------------------------------------------------->
<h4 id="row">Tableau récapitulatif du portefeuille client</h4>
<table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Prenom</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Tel</th>
            <th scope="col">Addresse</th>
            <th scope="col">Frais</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  </body>
</html>