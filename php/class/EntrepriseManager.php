<?php

/**
 *
 */
class EntrepriseManager extends Manager
{

  protected $table='entreprise';
  protected $champs=[
    [
      'nom'=>'id',
      'PDO'=> PDO::PARAM_INT
    ],
    [
      'nom'=>'siret',
      'PDO'=> PDO::PARAM_STR
    ],
    [
      'nom'=>'raisonSociale',
      'PDO'=> PDO::PARAM_STR
    ],
    [
      'nom'=>'adresse',
      'PDO'=> PDO::PARAM_STR
    ],
    [
      'nom'=>'codePostal',
      'PDO'=> PDO::PARAM_INT
    ],
    [
      'nom'=>'ville',
      'PDO'=> PDO::PARAM_STR
    ],
  ];

  public function read(int $id){
    $values=$this->readWhereValue($id,'id');
    return new Entreprise($values);
  }

  public function readAll(){
    $values=parent::readAll();
    if ($values) {
      $tableau=[];
      foreach ($values as $value) {
        $tableau[]= new Entreprise($value);
      }
      return $tableau;
    }
  }
}
