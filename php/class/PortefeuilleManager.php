<?php

/**
 *
 */
class PortefeuilleManager extends Manager {

  protected $table='portefeuille';
  protected $champs=[
    'id',
    'fkCommercial',
    'fkClient'
  ];

  public function __construct(){
    $this->connectDB();
    $this->valuesPDO();
  }

  public function read(int $id){
    $values=parent::read($id);
    return new Portefeuille($values);
  }

  public function readAll(){
    $values=parent::readAll();
    $tableau=[];
    foreach ($values as $value) {
      $tableau[]= new Portefeuille($value);
    }
    return $tableau;
  }

  private function bindId($req,$id){
    $req->bindValue($this->valuesPDO[$this->champs[0]],$id,PDO::PARAM_INT);
  }

  private function bindvaluesPDO($req,$portefeuille){
    $req->bindValue($this->values[$this->champs[1]],$portefeuille->getFKCommercial(),PDO::PARAM_STR);
    $req->bindValue($this->values[$this->champs[2]],$portefeuille->getFkClient(),PDO::PARAM_STR);
  }
}
