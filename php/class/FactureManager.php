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
    $paramPDO+=[
      PDO::PARAM_LOB,
      PDO::PARAM_INT
    ];
    parent::__construct();
  }

  public function read(int $id){
    $values=parent::read($id);
    return new Facture($values);
  }
}
