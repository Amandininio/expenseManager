<?php

/**
 *
 */
class TrajetManager extends NdfManager {

  function __construct() {
    $this->champs=array_merge(
      $this->champs,
      [
        [
          'nom'=>'distance',
          'PDO'=>PDO::PARAM_INT
        ],
        [
          'nom'=>'depTrajet',
          'PDO'=>PDO::PARAM_STR
        ],
        [
          'nom'=>'arrTrajet',
          'PDO'=>PDO::PARAM_STR
        ]
      ]
    );
    parent::__construct();
  }

  public function read(int $id){
    $values=$this->readWhereValue($id,'id');
    if ($values) {
      return new Trajet($values);
    }
  }
}
