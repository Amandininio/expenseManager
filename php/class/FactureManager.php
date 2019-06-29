<?php

/**
 *
 */
class FactureManager extends NdfManager {

  function __construct(){
    $this->champs+=[
      'photo',
      'montant'
    ];
    parent::__construct();
  }

  public function read(int $id){
    $values=parent::read($id);
    return new Facture($values);
  }

  protected function bindvaluesPDO($req,$facture){
    $this->bindvaluesNdf($req,$facture);
    $req->bindValue($this->values[count($this->champs)],$facture->getPhoto(),PDO::PARAM_INT);
    $req->bindValue($this->values[count($this->champs)+1],$facture->getMontant(),PDO::PARAM_STR);
  }
}
