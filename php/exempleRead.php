<?php

require_once ('functions.php');

$dataManager = new MissionManager();
$userMan = new UserManager();

//URL : http://localhost/expenseManager/php/testread.php?id='value'

$id=$_GET['id'];

$user = $userMan->read($id);
$results=$dataManager->readAll();
// echo 'mission';
// var_dump($results);

// header('Content-Type:application/json');
var_dump($results);
