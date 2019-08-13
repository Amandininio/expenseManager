<?php

require_once ('functions.php');


$dataManager = new UserManager();
$Manager = new UserManager();

$data= new Commercial;
$data->setNom('poneys');
$data->setPrenom('walker');
$data->setEmail('renarda@polochon.com');
$data->setId(13);
var_dump([0,1,3]+[1,1]);

var_dump($dataManager->read(1));
echo 'donut/';
// $dataManager->create($data);
echo 'tanga/';
$dataManager->update($data);
echo 'licorne/';
// $dataManager->delete($data);
echo'culotte/';
var_dump($dataManager->readAll());


// var_dump($data);
