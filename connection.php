<?php
session_start();
require_once ('model.php');
require_once ('functions.php');
$db = new PDO('mysql:host=127.0.0.1;dbname=expensemanager', 'root', '');

if(isset($_POST['connexion'])) {
   $Email = htmlspecialchars($_POST['Email']);
   $Mdp = sha1($_POST['Mdp']);
   if(!empty($Email) AND !empty($Mdp)) {
      $requser = $db->prepare("SELECT * FROM collaborateurs WHERE Email = ? && password = ?");
      $requser->execute(array($Email, $Mdp));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
        // $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
//=======Redirection de l'utilisateur dans url===================================================================//
         header("Location: profil.php?id=".$_SESSION['id']);
//=======Redirection de l'utilisateur dans url===================================================================//
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="profil.php">
         <div class="col-7">
                  <input type="email" name="Email" class="form-control" placeholder="Email" value="<?php if(isset($Email)) { echo $Email; } ?>">
          </div>
          <div class="col-7">
            <input type="password" class="form-control" placeholder="Mot de Passe" name='Mdp'id='Mdp' value="<?php if(isset($Mdp)) { echo $Mdp; } ?>">
          </div>
            <br /><br />
            <input type="submit" name="connexion" value="connection !" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>