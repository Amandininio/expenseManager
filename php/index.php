<?php

require_once ('functions.php');


$entrepriseManager = new EntrepriseManager();
$en=new UserManager();
$e=new ClientManager();
$ent= new Entreprise;
$ent->setRaisonSociale('sugar');
$ent->setAdresse('999 place daddy');
$ent->setCodePostal('56320');
$ent->setVille('candyland');
$ent->setSiret('464 636 426 9569');
$ent->setId(11);
var_dump($entrepriseManager->read(2));
echo 'ok';
$entrepriseManager->update($ent);
var_dump($entrepriseManager->readAll());

// var_dump($ent);
