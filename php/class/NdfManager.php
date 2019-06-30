<?php

/**
 *
 */
abstract class NdfManager extends Manager
{
  protected $table='noteDeFrais';
  protected $champs=[
    'id',
    'raison',
    'dateNDF',
    'comCommercial',
    'remboursement',
    'comComptable',
    'fkMission'
  ];

  protected $paramPDO=[
    PDO::PARAM_INT,
    PDO::PARAM_STR,
    PDO::PARAM_STR,
    PDO::PARAM_STR,
    PDO::PARAM_STR,
    PDO::PARAM_STR,
    PDO::PARAM_INT
  ];

  public static function readAllFkMission($Mission){
    parent::__construct();
    $values=parent::readAllFk($Mission, 'fkMission');
    $tableau=[];
    foreach ($values as $value) {
      if($value['raison']=='trajet'){
        $tableau[]= new Trajet($value);
      } else {
        $tableau[]= new Facture($value);
      }
    }
    return $tableau;
  }
}
