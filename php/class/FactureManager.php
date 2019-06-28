<?php

/**
 *
 */
class FactureManager extends NdfManager {

  function __construct()
  {
    $this->connectDB();
    $this->champs+=[
      'photo',
      'montant'
    ];
    $this->valuesPDO();
  }

  public function read(int $id){
    $values=parent::read($id);
    return new Facture($values);
  }

  public function readAll(){
    $values=parent::readAll();
    $tableau=[];
    foreach ($values as $value) {
      $tableau[]= new Facture($value);
    }
    return $tableau;
  }

  protected function bindvaluesPDO($req,$facture){
    $this->bindvaluesNdfPDO($req,$facture);
    $req->bindValue($this->values[count($this->champs)],$facture->getPhoto(),PDO::PARAM_INT);
    $req->bindValue($this->values[count($this->champs)+1],$facture->getMontant(),PDO::PARAM_STR);
  }
}
