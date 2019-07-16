<?php

/**
 *
 */
class Client extends Personne {

  private $fonction;

  public function getFonction(){
    return $this->fonction;
  }

  public function setFonction(string $fonction){
    $this->fonction=$fonction;
  }
}
