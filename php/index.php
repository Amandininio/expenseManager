<?php

require_once ('functions.php');


$entrepriseManager = new EntrepriseManager();
$en=new TrajetManager();
$ent= new Entreprise;
$ent->setRaisonSociale('trilili');
$ent->setAdresse('62 rue delpi');
$ent->setCodePostal('64450');
$ent->setVille('new haven');
var_dump($entrepriseManager->readAll());

// var_dump($ent);
