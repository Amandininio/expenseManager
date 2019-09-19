<?php
include_once('functions.php');
include_once('model.php');

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
          //$Genre =                  ($_POST ['Genre']); //
            $Mdp = sha1();
            $Mdp2 = sha1();

            $Prenomlength = strlen($Prenomlength);
            if($Prenomlength <= 50)
            {
              if(filter_var($Mdp))
                 if($Mdp ==  $Mdp2)
                 {
                      $insertMbr = $db->prepare("INSERT INTO collaborateurs (login, password) VALUES (?, ?)");
                      $insertMbr->execute(array($Email, $Mdp)) or die('Error: '. mysql_error() );
                      $erreur = "Votre compte à bien été créer !";
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
<!--=====Condition de sécurité & de remplissage formulaire correct=============================================================================================================================================================================*/-->


<!--------------------------------------------------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Document</title>
</head>

<header class="page-header">
<p>
    <img src="img/Albert.png" alt="Avatar" id="img">
</p>
</header>

<body class="container">
<h3 class="padding">Profil</h3>
<!----------------------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------------------->
<?php
//$collaborateurs = readCollaborateurs($db);

// Adapte les données pour l'affichage
//$collaborateursAdapte = [];
//foreach ($collaborateurs as $collaborateur){
//    $collaborateursAdapte[] = [
//        'Selection' => '<input type="radio"
//                        name="selection"
//                        value="'.$collaborateur['Genre'].' '.$collaborateur['Nom'].' '.$collaborateur['Prenom'].'"/>',
//        'Genre' => $collaborateur['Genre'],
//        'Nom' => $collaborateur['Nom'],
//        'Prenom' => $collaborateur['Prenom'],
//    ];
//}


//if(isset($_POST['jour'])) {
         //$annee = $_POST['annee'];
         //$mois= $_POST["mois"];
         //$jour= $_POST["jour"];
         //$idVehicule = $_GET["id"];
         //$idCollabo = $_POST['selection'];

    //ajoutReservation($db, $annee, $mois, $jour, $idVehicule, $idCollabo);

//header('location:index.php');
//}
//$resultName=  afficherListeCollaborateurs($collaborateurs);
//foreach($resultName as $name){
//    echo $name."<br>";
//}
//?>


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
            <input type="password" class="form-control" placeholder="Mot de Passe" name='Mdp'id='Mdp'>
          </div>
          <div class="col-7">
            <input type="password" class="form-control" placeholder=" Confirmer le mot de passe" name='Mdp2'id='Mdp2'>
          </div>
          <div class="col-7">
                  <input type="number" class="form-control" placeholder="Numéro de téléphone"  name="Tel" value="<?php if(isset($Tel)) { echo $Tel; } ?>">
          </div><br>
          <div class="col-1">
                <button type="submit" class="btn btn-primary" name="connection">Connection</button>
          </div>
    </table>
</form>
<!-----------FIN DE FORMULAIRE------------------------------------------------------------------------------------------------------------------->


<!-----------Message d'erreur------------------------------------------------------------------------------------------------------------------------>
<?php
if(isset($erreur))
{
    echo '<font color= "red">'.$erreur."</font>";
}
?>
</body>
</html>