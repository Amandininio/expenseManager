<?php
//$db = new PDO('mysql:host=localhost;dbname=expensemanager;charset=utf8','root','');
$mysqli = new mysqli("localhost", "root", "", "expensemanager");

require_once ('model.php');
require_once ('functions.php');
//=====Condition de sécurité & de remplissage formulaire correct=============================================================================================================================================================================//
if(isset($_SESSION['connection']))
{           
  echo "ok";
  $Prenom = htmlspecialchars($_SESSION['Prenom']);
  $Nom = htmlspecialchars($_SESSION['Nom']);
  $Ville = htmlspecialchars($_SESSION['Ville']);
  $Tel = htmlspecialchars($_SESSION['Tel']);
  $Email = htmlspecialchars($_SESSION ['Email']);
  //$Genre = htmlspecialchars ($_SESSION ['Genre']);
  $Mdp = sha1($_SESSION ['Mdp']);
  $Mdp2 = sha1($_SESSION ['Mdp2']);//

  if(!empty($_SESSION['Prenom']) && 
      !empty($_SESSION['Nom']) && 
      !empty($_SESSION['Ville']) && 
      !empty($_SESSION['Email']) && 
      !empty($_SESSION['Mdp']) && 
      !empty($_SESSION['Mdp2']) && 
      !empty($_SESSION['Tel']))
  {
            
    $Prenomlength = strlen($Prenom);
    if($Prenomlength <= 50)
    {
      if(filter_var($Email, FILTER_VALIDATE_EMAIL))
      {
        $reqmail = $mysqli->prepare("SELECT * FROM clients WHERE Email = ?");
        $reqmail->bind_param('s', $Email);
        $reqmail->execute();
        $res = $reqmail->get_result();
        $mailexist = $res->num_rows;
        if($mailexist == 0)
        {
            if(true){
              if($Mdp ==  $Mdp2)
              {                         //==Insertion du Client dans la Base de Donnée==//
                $insertMbr = $mysqli->prepare("INSERT INTO clients (`Email`, `password`, `Ville`, `Nom`, `Prenom`, `Tel`) VALUES (?, ?, ?, ?, ?, ?)");
                $insertMbr->bind_param('sssssi', $Email, $Mdp, $Ville, $Nom, $Prenom, $Tel);
                $insertMbr->execute() or die('Error: '. mysqli_error() );
                //$insertMbr->query() or die('Error: '. mysql_error() );
                $erreur = "Votre compte à bien été créer !";
                $_SESSION['comptecree'] = "Votre compte à bien était enregistrer";
                /*================================================Redirection une fois l'insertion faite=================================//*/
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
    }
  }
}
?>
<!--------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------Formulaire------------------------------------------------------------------------>
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
<!-------------------------------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------Header------------------------------------------------------------------------>
<header>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Expense Manager</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="listerResa.php"> Réservation</a></li>
      <li><a href="update.php">Modifier réservation</a></li>
      <li><a href="clients.php"> Plan & Client</a></li>
      <li><a href="connection.php"> Compte Utilisateur</a></li>
    </ul>
    <!--<button class="btn btn-primary navbar-btn"></button>-->
  </div>
</nav>
<input class="autofocus" type="text" name="search" placeholder="Search">
</header>
<!--------------------------------------------------------Header------------------------------------------------------------------------>


<body>
<h1>Page Clients</h1>
<div id="googleMap" style="width:100%;height:azuto;">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11614.742703174841!2d-0.36542149999999995!3d43.299903799999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1567258368456!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="">
</iframe>
</div>

<!-----------Formulaire d'inscription à la base de données-------------------------------------------------------------------------------------------------------------------->
<form action="" id="formulaire" class="container mb-12" method="POST">
    <table class="row">
          <div class="col-7">
          <h2 class="mb-2">Formulaire Inscription</h2>
            <input type="text" class="form-control" placeholder="Prenom" name='Prenom' id='Prenom' value="<?php if(isset($Prenom)) { echo $Prenom; } ?>">
          </div>
          <div class="col-7">
            <input type="text" class="form-control" placeholder="Nom" name='Nom' id='Nom' value="<?php if(isset($Nom)) { echo $Nom; } ?>">
          </div>
          <div class="col-7">
            <input type="text" class="form-control" placeholder="Ville" name='Ville' id='Ville' value="<?php if(isset($Ville)) { echo $Ville; } ?>">
          </div>
          <div class="col-7">
                  <input type="email" class="form-control" placeholder="Email" name="Email" value="<?php if(isset($Email)) { echo $Email; } ?>">
          </div>
          <div class="col-7">
            <input type="password" class="form-control" placeholder="Mot de Passe" name='Mdp' id='Mdp' value="Mdp">
          </div>
          <div class="col-7">
            <input type="password" class="form-control" placeholder=" Confirmer le mot de passe" name='Mdp2' id='Mdp2' value="Mdp2">
          </div>
          <div class="col-7">
                  <input type="number" class="form-control" placeholder="Numéro de téléphone"  name="Tel" value="<?php if(isset($Tel)) { echo $Tel; } ?>">
          </div><br>
          <div class="col-1">
                <button type="submit" class="btn btn-primary" name="connection" value= "connection">Inscription</button>
          </div>
    </table>
</form>
<!-----------FIN DE FORMULAIRE------------------------------------------------------------------------------------------------------------------->



<!-----------Messages d'Erreur Formulaire-------------------------------------------------------------------------------------->
<footer>
<?php
    if(isset($erreur))
    {
       echo '<font color= "red">'.$erreur."</font>";
    }
?>
</footer>
</body>
</html>