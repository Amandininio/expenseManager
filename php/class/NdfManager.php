<?php

/**
 *
 */
abstract class NdfManager extends Manager
{
  protected $table='noteDeFrais';
  protected $champs=[
    [
      'nom'=>'id',
      'PDO'=>PDO::PARAM_INT
    ],
    [
      'nom'=>'raison',
      'PDO'=>PDO::PARAM_STR
    ],
    [
      'nom'=>'dateNDF',
      'PDO'=>PDO::PARAM_STR
    ],
    [
      'nom'=>'comCommercial',
      'PDO'=>PDO::PARAM_STR
    ],
    [
      'nom'=>'remboursement',
      'PDO'=>PDO::PARAM_INT
    ],
    [
      'nom'=>'comComptable',
      'PDO'=>PDO::PARAM_STR
    ],
    [
      'nom'=>'fkMission',
      'PDO'=>PDO::PARAM_INT
    ]
  ];

  public static function readWhereFkMission($Mission){
    parent::__construct();
    $values=parent::readWhereValue($Mission->getId(), 'fkMission');
    if ($values) {
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
}
