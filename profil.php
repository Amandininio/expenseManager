<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=expensemanager', 'root', '');

require_once 'functions.php';
require_once 'model.php';
$tableauResas = readtableauResas($db);

// Adapte les données pour l'affichage//
$tableauResaAdapte = [];
foreach ($tableauResas as $tableauResa){
    $tableauResaAdapte[] = [
        'Sélection' => '<input type="radio" name="idResa" value="'.$tableauResa['idResa'].'"/>',
        'Date' => $tableauResa['dateResa'],
        'Immatriculation' => $vehicule['Immatriculation'],
        'Collaborateur' => $tableauResa['collaboResa'],
        'Véhicule' => $tableauResa['vehiculeResa'],
    ];
}

if(isset($_POST['btnUpdate'])); {
    $idResa = $_POST['idResa'];
    header("location:update.php?idResa=$idResa");
}

if(isset($_POST['btnCreate'])); {
    header("location:create.php");
}

if(isset($_POST['forminscription'])); {
   
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $Email = htmlspecialchars($_POST['Email']);
            $Email2 = htmlspecialchars($_POST['Email2']);
            $mdp = sha1($_POST['Mdp']);
            $mdp2 = sha1($_POST['Mdp2']);
               if(!empty($_POST['pseudo']) AND !empty($_POST['Email']) AND !empty($_POST['Email2']) AND !empty($_POST['Mdp']) AND !empty($_POST['Mdp2'])); {
                  $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) {

         if($Email == $Email2) {

            if(filter_var($Email)) {

                                                $reqEmail = $db->prepare("SELECT * FROM collaborateurs WHERE Email = ?");
                                                $reqEmail->execute(array($Email));
                                                $Emailexist = $reqEmail->rowCount();

               if($Emailexist == 0)
               {

                  if($mdp == $mdp2) {

                     $insertmbr = $db->prepare("INSERT INTO collaborateurs(pseudo, Email, Mdp) VALUES(?, ?, ?) ");
                     $insertmbr->execute(array($pseudo, $Email, $mdp));
                     $erreur = "Votre compte a bien été créé ! <a href='\connection.php\'>Me connecter </a>";
                  } 
                  else 
                  {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               
               }
               else
               {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            }
            else
            {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         }
         else
         {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      }
      else
      {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      }
      }
      else
      {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>

<html>
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

<!------------------------------------------------------------------------>
<header class>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" href="connection.php">Expense Manager</a>
  </div>
  <ul class="nav navbar-nav">
    <li class="active"><a href="connection.php">Home</a></li>
    <li><a href="connection.php"> Réservation</a></li>
    <li><a href="listResa.php">Modifier réservation</a></li>
    <li><a href="clients.php" d> Plan & Client</a></li>
    <li><a href="connection.php"> Compte Utilisateur</a></li>
  </ul>
  <!--<button class="btn btn-primary navbar-btn"></button>-->
</div>
<li><a href="connection.php"><span class="glyphicon glyphicon-user"></span>Inscription </a></li>
    <li><a href="deconnection.php"><span class="glyphicon glyphicon-log-in"></span>Connection</a></li>
</nav>
</header>
<!------------------------------------------------------------------------>


<!------------------------------------------------------------------------>
   <body>
      <div align="center">
         <img src="img/Albert.png" alt="Avatar" id="img">
         <h2>Inscription</h2>
         <br /><br />
         <form method="POST" action="">
            <table>
               <tr>
                  <td align="right">
                     <label for="pseudo">Pseudo : </label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre pseudo" class="form-control" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="Email">Mail : </label>
                  </td>
                  <td>
                     <input type="email" placeholder="Votre mail" class="form-control" name="Email" value="<?php if(isset($Email)) { echo $Email; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mail2">Confirmation du mail : </label>
                  </td>
                  <td>
                     <input type="email" placeholder="Confirmez votre mail" class="form-control" name="Email2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp">Mot de passe : </label>
                  </td>
                  <td>
                     <input type="password" placeholder="Votre mot de passe" class="form-control" name="Mdp" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp2">Confirmation du mot de passe : </label>
                  </td>
                  <td>
                     <input type="password" placeholder="Confirmez votre mdp" class="form-control" name="Mdp2" />
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit"  name="forminscription" class="btn btn-primary" value="Je m'inscris" />
                  </td>
               </tr>
            </table>
         </form>
<?php
   if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
                      }
?>
      </div>

<h3 class="padding">Profil</h3></br></br></br></br></br></br></br></br>
<!----------------------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------------------->
<div class="container mb-6">
    <?php echo afficheTableau($tableauResaAdapte) ?>
    <div class="block">
        <input type="submit" name ="btnSupprimer" class="btn btn-danger" value="Supprimer" />
        <input type="submit" name="btnUpdate" value="Modifier" class="btn btn-success" id="modif"/>
        <input type="submit" name="btnCreate" value="Creer" class= "btn btn-primary" id="creer"/>
</div>
</div>
<div class="container-float mb-12"> 
<?php
            $collaborateurs = readCollaborateurs($db);

 //Adapte les données pour l'affichage
$collaborateursAdapte = [];
foreach($collaborateurs as $collaborateur){
    $collaborateursAdapte[] = [
        'Selection' => '<input type="radio"
                        name="selection"
                        value ="'.$collaborateur['Genre'].' '.$collaborateur['Nom'].' '.$collaborateur['Prenom'].'"/>',
                       'Genre' => $collaborateur['Genre'],
                       'Nom' => $collaborateur['Nom'],
                       'Prenom' => $collaborateur['Prenom'],
    ];
}

if(isset($_SESSION['jour'])) {
         $annee = $_SESSION['annee'];
         $mois= $_SESSION["mois"];
         $jour= $_SESSION["jour"];
         $idVehicule = $_GET["id"];
         $idCollabo = $_SESSION['selection'];

    ajoutReservation($db, $annee, $mois, $jour, $idVehicule, $idCollabo);

header ('location:index.php');
}
$resultName=  afficherListeCollaborateurs($collaborateurs);
foreach($resultName as $name){
    echo $name."<br>";
}
?>
</div>
<!--------------------------------------------------------------->




<!-----------Message d'erreur------------------------------------------------------------------------------------------------------------------------>
<?php
if(isset($erreur));
{
    echo '<font color= "red">'.$erreur.'</font>';
}
?>
   </body>
</html>