<?php

/**
 *
 */
class ClientManager extends PersonneManager {

  public function __construct(){
    $champs+=[
      'fkEntreprise',
      'fonction'
    ];
    $paramPDO+=[
      PDO::PARAM_INT,
      PDO::PARAM_STR
    ];
    parent::__construct();
  }

  public function read(int $id){
    $values=parent::read($id);
    return new Trajet($values);
  }
}
