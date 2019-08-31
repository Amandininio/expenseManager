<?php

/**
 *
 */
abstract class NdfManager extends Manager
{
  protected $table='notedefrais';
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

  public static function readWhereFkMission(Mission $Mission){
    parent::__construct();
    $values=$this->readWhereValue($Mission->getId(), 'fkMission');
    if (array_key_exists('id',$values)) {
      if($values['raison']=='trajet'){
        return new Trajet($values);
      } else {
        return new Facture($values);
      }
    } else {
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
