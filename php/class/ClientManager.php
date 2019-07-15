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
        'nom'=>'fonction',
        'PDO'=>PDO::PARAM_STR
      ]
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

  public function update($client){
    $email=$client->getEmail();
    $user;
    if ($email) {
      $user=$this->readWhereEmail($email);
    }
    if ($user) {
      $id=$user['id'];
      if ($id=$client->getId()) {
        parent::update($client);
      } else {
        $this->updateDataClient(PortefeuilleManager,$client,$id);
        $this->updateDataClient(RencontreManager,$client,$id);
        $this->delete($client);
        $client->setId($id);  //ENORME FAILLE DE SECURITE A REVOIR
        parent::update($client);
      }
    } else {
      parent::update($client);
    }
  }

  private function updateDataClient(Manager $Manager,Client $oldClient,int $newId){
    $manData=new $Manager();
    $data=$manData->readWhereFkClient($oldClient);
    foreach ($data as $value) {
      $value->setFkClient($newId);
      $manData->update($value);
    }
  }
}
