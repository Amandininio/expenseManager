<?php

/**
 *
 */
class MissionManager extends Manager
{

  protected $table='mission';
  protected $champs=[
    'id',
    'nom',
    'commentaire',
    'statut',
    'fkCommercial'
  ];

  protected $paramPDO=[
    PDO::PARAM_INT,
    PDO::PARAM_STR,
    PDO::PARAM_STR,
    PDO::PARAM_STR,
    PDO::PARAM_INT
  ];

  public function read(int $id){
    $values=parent::read($id);
    return new Mission($values);
  }

  public function readAll(){
    $values=parent::readAll();
    return $this->buildTableau($values);
  }

  public function readAllFkCommercial($Commercial){
    $values=$this->readAllFk($Commercial, 'fkCommercial');
    return $this->buildTableau($values);
  }

  public function buildTableau($values){
    $tableau=[];
    foreach ($values as $value) {
      $tableau[]= new Mission($value);
    }
    return $tableau;
  }
}
