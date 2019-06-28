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

  public function __construct(){
    $this->connectDB();
    $this->valuesPDO();
  }

  public function read(int $id){
    $values=parent::read($id);
    return new Mission($values);
  }

  public function readAll(){
    $values=parent::readAll();
    return $this->buildTableau($values);
  }

  public function readAllFk(int $idCommercial){
    $values=parent::readAllFk($idCommercial);
    return $this->buildTableau($values);
  }

  public function buildTableau($values){
    $tableau=[];
    foreach ($values as $value) {
      $tableau[]= new Mission($value);
    }
    return $tableau;
  }

  private conditionFk(){
    return $this->champs[4].'=:'.$this->champs[4];
  }

  protected function bindId($req,$id){
    $req->bindValue($this->valuesPDO[$this->champs[0]],$id,PDO::PARAM_INT);
  }

  protected function bindFk($req,$fk){
    $req->bindValue($this->values[$this->champs[4]],$fk,PDO::PARAM_INT);
  }

  protected function bindvaluesPDO($req,$mission){
    $req->bindValue($this->values[$this->champs[1]],$mission->getnom(),PDO::PARAM_STR);
    $req->bindValue($this->values[$this->champs[2]],$mission->getcommentaire(),PDO::PARAM_STR);
    $req->bindValue($this->values[$this->champs[3]],$mission->getStatut(),PDO::PARAM_STR);
    $this->bindFk($req,$mission->getFkCommercial());
  }
}
