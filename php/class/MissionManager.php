<?php

/**
 *
 */
class MissionManager extends Manager
{

  protected $table='mission';
  protected $champs=[
    [
      'nom'=>'id',
      'PDO'=>PDO::PARAM_INT
    ],
    [
      'nom'=>'nom',
      'PDO'=>PDO::PARAM_STR
    ],
    [
      'nom'=>'statut',
      'PDO'=>PDO::PARAM_STR
    ],
    [
      'nom'=>'fkCommercial',
      'PDO'=>PDO::PARAM_INT
    ]
  ];

  public function read(int $id){
    $values=parent::readWhereValue($id,'id');
    if ($values) {
      return new Mission($values);
    }
  }

  public function readAll(){
    $values=parent::readAll();
    if ($values) {
      return $this->buildTableau($values);
    }
  }

  public function readWhereFkCommercial($Commercial){
    $values=$this->readWhereValue($Commercial->getId(), 'fkCommercial');
    if ($values) {
      return $this->buildTableau($values);
    }
  }

  public function buildTableau($values){
    $tableau=[];
    foreach ($values as $value) {
      $tableau[]= new Mission($value);
    }
    return $tableau;
  }
}
