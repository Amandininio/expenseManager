<?php
include_once('functions.php');
include_once('model.php');

?>

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
    <img src="img/Albert.png" alt="Avatar" class="float:left;width:100%;height:auto border-raduis:50px">
</p>
</header>

<body class="container">

<label for=""></label>
<?php echo updateResa($db, $idResa, $dateResa,$collaboResa, $vehiculeResa) ?>

</body>
</html>