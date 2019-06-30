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
    $paramPDO+=[
      PDO::PARAM_INT,
      PDO::PARAM_STR,
      PDO::PARAM_STR
    ];
    parent::__construct();
  }

  public function read(int $id){
    $values=parent::read($id);
    return new Trajet($values);
  }
}
