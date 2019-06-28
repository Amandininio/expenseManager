<?php

/**
 *
 */
class TrajetManager extends NdfManager {

  function __construct()
  {
    $this->connectDB();
    $this->champs+=[
      'distance',
      'depTrajet',
      'arrTrajet'
    ];
    $this->valuesPDO();
  }

  public function read(int $id){
    $values=parent::read($id);
    return new Trajet($values);
  }

  public function readAll(){
    $values=parent::readAll();
    $tableau=[];
    foreach ($values as $value) {
      $tableau[]= new Trajet($value);
    }
    return $tableau;
  }

  protected function bindvaluesPDO($req,$trajet){
    $this->bindvaluesNdfPDO($req,$trajet);
    $req->bindValue($this->values[count($this->champs)],$trajet->getDistance(),PDO::PARAM_INT);
    $req->bindValue($this->values[count($this->champs)+1],$trajet->getDepTrajet(),PDO::PARAM_STR);
    $req->bindValue($this->values[count($this->champs)+2],$trajet->getArrTrajet(),PDO::PARAM_STR);
  }
}
