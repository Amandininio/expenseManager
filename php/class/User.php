<?php

/**
 *
 */
abstract class User extends Personne {

  protected $mdp,$type;

  public function getMdp(){
    return $this->mdp;
  }

  public function getType(){
    return $this->type;
  }

  public function setMdp(string $mdp){
    $this->mdp=$mdp;
  }

  protected function setType(string $type){
    $this->type=$type;
  }
}
