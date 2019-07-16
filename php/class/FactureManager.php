<?php

/**
 *
 */
class FactureManager extends NdfManager {

  function __construct(){
    $this->champs=array_merge(
      $this->champs,
      [
        [
          'nom'=>'photo',
          'PDO'=>PDO::PARAM_LOB
        ],
        [
          'nom'=>'montant',
          'PDO'=>PDO::PARAM_INT
        ]
      ]
    );
    parent::__construct();
  }

  public function read(int $id){
    $values=$this->readWhereValue($id,'id');
    if ($values) {
      return new Facture($values);
    }
  }
}
