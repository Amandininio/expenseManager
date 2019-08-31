<?php

require_once ('functions.php');

$dataManager = new MissionManager();
$userMan = new UserManager();

//URL : http://localhost/expenseManager/php/testread.php?id='value'

$id=$_GET['id'];

$user = $userMan->read($id);
$results=$dataManager->readWhereFkCommercial($user);
// echo 'mission';
// var_dump($results);

// header('Content-Type:application/json');
echo json_encode($results);
echo json_last_error();
