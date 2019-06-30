<?php

/**
 *
 */
class EntrepriseManager extends Manager
{

  protected $table='entreprise';
  protected $champs=[
    'id',
    'siret',
    'raisonSociale',
    'adresse',
    'codePostal',
    'ville',
  ];

  protected $paramPDO=[
    PDO::PARAM_INT,
    PDO::PARAM_STR,
    PDO::PARAM_STR,
    PDO::PARAM_STR,
    PDO::PARAM_INT,
    PDO::PARAM_STR
  ];

  public function read(int $id){
    $values=parent::read($id);
    return new Entreprise($values);
  }

  public function readAll(){
    $values=parent::readAll();
    $tableau=[];
    foreach ($values as $value) {
      $tableau[]= new Entreprise($value);
    }
    return $tableau;
  }
}
