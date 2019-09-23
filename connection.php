<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "expensemanager");


if(isset($_POST['connexion'])) {
   $mailconnect = htmlspecialchars($_POST['Email']);
   $mdpconnect = sha1($_POST['Mdp']);

   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $mysqli->prepare("SELECT * FROM collaborateurs WHERE Email = ? AND  password = ?", array($mailconnect, $mdpconnect));
      
      $requser->execute();
      $userexist = $requser->rowCount();

      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['Email'] = $userinfo['Email'];
         header("Location: profil2.php?id=".$_SESSION['id']);
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
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
         <div class="col-7">
                  <input type="email" name="Email" class="form-control" placeholder="Email" value="<?php if(isset($Email)) { echo $Email; } ?>">
          </div>
          <div class="col-7">
            <input type="password" class="form-control" placeholder="Mot de Passe" name='Mdp'id='Mdp' value="Mdp">
          </div>
            <br /><br />
            <input type="submit" name="connexion" value="Se connecter !" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>