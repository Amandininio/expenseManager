<?php

/**
 *
 */
class User extends Personne {

  private $mdp,$type;
  private $typePossible=[
    'commercial',
    'comptable'
  ];

  public function getMdp(){
    return $this->$mdp;
  }

  public function getType(){
    return $this->type;
  }

  public function setMdp(string $mdp){
    $this->mdp=$mdp;
  }

  public function setType(string $type){
    if (in_array($type,$this->typePossible)) {
      $this->type=$type;
    } else {
      $this->type=$this->typePossible[0];
    }
  }

}
