<?php
require_once ('model.php');
require_once ('functions.php');
/*=====Condition de sécurité & de remplissage formulaire correct=============================================================================================================================================================================*/
if(isset($_POST['connection']))
{
        if(!empty($_POST['Prenom']) AND !empty($_POST['Nom']) AND !empty($_POST['Ville']) AND !empty($_POST['Email']) AND !empty($_POST['Mdp']) AND !empty($_POST['Mdp2']) AND !empty($_POST['Tel']))
        {
            echo "ok";
            $Prenom = htmlspecialchars($_POST['Prenom']);
            $Nom = htmlspecialchars($_POST['Nom']);
            $Ville = htmlspecialchars($_POST['Ville']);
            $Tel = htmlspecialchars($_POST['Tel']);
            $Email = htmlspecialchars($_POST ['email']);
          //$Genre = htmlspecialchars ($_POST ['Genre']); //
            $Mdp = sha1();
            $Mdp2 = sha1();

            $Prenomlength = strlen($Prenomlength);
            if($Prenomlength <= 50)
            {
              if(filter_var($Mdp))
                 if($Mdp ==  $Mdp2)
                 {                         //==Insertion du Client dans la Base de Donnée
                      $insertMbr = $db->prepare("INSERT INTO clients (login, password) VALUES (?, ?)");
                      $insertMbr->execute(array($Email, $Mdp)) or die('Error: '. mysql_error() );
                      $erreur = "Votre compte à bien été créer !";
                      $_SESSION['comptecree'] = "Votre compte à bien était enregistrer";
//=============Redirection une fois l'insertion faite=================================//
                      header('location: index.php');
                 } 
                 else
                 {
                    $erreur = "Les mot de passe ne sont pas identiques ";
                 }
                 }
                 else
                 {
                        $erreur = "Ton Prénom est trop long, on n'est pas des Russe !! ";
                 }
              }
              else
              {
                  $erreur = 'Tous les champs doivent être remplies !!'; 
              }
}

?>
<!--------------------------------------------------------------------------------------------------->



<!---------------------------Formulaire------------------------------------------------------------------------>
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
      <li><a href="profil.php"> Compte Utilisateur</a></li>
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

<!---------------Formulaire d'inscription à la base de données-------------------------------------------------------------------------------------------------------------------->
<form action="" id="formulaire" class="container mb-12" method="POST">
    <table class="row">
          <div class="col-7">
          <h2 class="mb-2">Formulaire Inscription</h2>
            <input type="text" class="form-control" placeholder="Prenom" name='Prenom'id='Prenom' value="<?php if(isset($Prenom)) { echo $Prenom; } ?>">
          </div>
          <div class="col-7">
            <input type="text" class="form-control" placeholder="Nom" name='Nom'id='Nom' value="<?php if(isset($Nom)) { echo $Nom; } ?>">
          </div>
          <div class="col-7">
            <input type="text" class="form-control" placeholder="Ville" name='Ville'id='Ville'value="<?php if(isset($Ville)) { echo $Ville; } ?>">
          </div>
          <div class="col-7">
                  <input type="email" class="form-control" placeholder="Email" value="<?php if(isset($Email)) { echo $Email; } ?>">
          </div>
          <div class="col-7">
            <input type="password" class="form-control" placeholder="Mot de Passe" name='Mdp'id='Mdp' value="Mdp">
          </div>
          <div class="col-7">
            <input type="password" class="form-control" placeholder=" Confirmer le mot de passe" name='Mdp2'id='Mdp2' value="Mdp2">
          </div>
          <div class="col-7">
                  <input type="number" class="form-control" placeholder="Numéro de téléphone"  name="Tel" value="<?php if(isset($Tel)) { echo $Tel; } ?>">
          </div><br>
          <div class="col-1">
                <button type="submit" class="btn btn-primary" name="Inscription" value= "connection">Connection</button>
          </div>
    </table>
</form>
<!-----------FIN DE FORMULAIRE------------------------------------------------------------------------------------------------------------------->



<!----------------------------Messages d'Erreur Formulaire-------------------------------------------------------------------------------------->
<?php
if(isset($erreur))
{
    echo '<font color= "red">'.$erreur."</font>";
}
?>
</body>
</html>

