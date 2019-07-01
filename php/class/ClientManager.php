<?php

/**
 *
 */
class ClientManager extends PersonneManager {

  public function __construct(){
    $this->champs+=[
      [
        'nom'=>'fkEntreprise',
        'PDO'=>PDO::PARAM_INT
      ],
      [
        'nom'=>'fonction'
        'PDO'=>PDO::PARAM_STR
      ],
    ];
    parent::__construct();
  }

  public function create($client){
    $user=$this->readWhereEmail($user->getEmail());
    if ($user==null) {
      parent::create($client);
    } else {
      if ($user['fkEntreprise']==null) {
        $client->setId($user->getId());
        $this->update($client);
      }
    }
  }

  public function read(int $id){
    $values=$this->readWhereValue($id,'id');
    if ($values) {
      return new Trajet($values);
    }
  }
}
