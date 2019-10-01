<? php 
   require_once('model.php');
   require_once('functions.php');
   $db = new PDO('mysql:host=127.0.0.1;dbname=expensemanager', 'root', '');


if(isset($_POST['connection'])) {
   $Email = htmlspecialchars($_SESSION['Email']);
   $Mdp = sha1($_SESSION['Mdp']);
   if(!empty($Email) AND !empty($Mdp))
   {
$requser = $db->prepare("SELECT * FROM collaborateurs WHERE Email = ? AND Mdp = ?");
      $requser->execute(array($Email, $Mdp));
      $userexist = $requser->rowCount();

      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['Email'] = $userinfo['Email'];
         $_SESSION['Nom'] = $userinfo['Nom'];
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['Mdp'] = $userinfo['Mdp'];
         $_SESSION['Mdp2'] = $userinfo['Mdp2'];
         $_SESSION['Prenom'] = $userinfo['Prenom'];
         $_SESSION['Ville'] = $userinfo['Ville'];
         $_SESSION['Genre'] = $userinfo['Genre'];
//=======Redirection de l'utilisateur dans url===================================================================//
         header("Location: profil.php?id=".$_SESSION['id']);
//=======Redirection de l'utilisateur dans url===================================================================//
      } 
      else 
      {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } 
   else 
   {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<html><head>
   <title>TUTO PHP</title>
   <meta charset="utf-8">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<header  class="">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Expense Manager</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="connection.php">Home</a></li>
      <li><a href="connection.php"> Réservation</a></li>
      <li><a href="connection.php">Modifier réservation</a></li>
      <li><a href="connection.php"> Plan & Client</a></li>
      <li><a href="connection.php"> Compte Utilisateur</a></li>
    </ul>
   
  </div>
</nav>
</header>


   <body>
      <div align="center">
         <h2>connection</h2>
         <br /><br />
         <form method="POST" action="profil.php">
         <div class="col-7">
                  <input type="email" name="Email" class="form-control" placeholder="Email" value="<?php if(isset($Email)) { echo $Email; } ?>">
          </div>
          <div class="col-7">
            <input type="password" class="form-control" placeholder="Mot de Passe" name='Mdp' id='Mdp' value="
            <?php 
            if(isset($Mdp)) {echo $Mdp;}?>">
          </div>
            <br /><br />
            <input type="submit" name="connection" value="connection !" class="btn btn-primary" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>