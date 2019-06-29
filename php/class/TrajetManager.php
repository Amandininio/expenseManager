<?php

/**
 *
 */
class TrajetManager extends NdfManager {

  function __construct() {
    $this->champs+=[
      'distance',
      'depTrajet',
      'arrTrajet'
    ];
    parent::__construct();
  }

  public function read(int $id){
    $values=parent::read($id);
    return new Trajet($values);
  }

  protected function bindvaluesPDO($req,$trajet){
    $this->bindvaluesNdf($req,$trajet);
    $req->bindValue($this->values[count($this->champs)],$trajet->getDistance(),PDO::PARAM_INT);
    $req->bindValue($this->values[count($this->champs)+1],$trajet->getDepTrajet(),PDO::PARAM_STR);
    $req->bindValue($this->values[count($this->champs)+2],$trajet->getArrTrajet(),PDO::PARAM_STR);
  }
}
