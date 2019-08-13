<?php

/**
 * Classe Client
 *
 * Possède les propriétés et les méthodes des classes Personne et Entity
 */
class Client extends Personne {

/**
 * Propriété private string : fonction
 *
 * fonction du client dans son entreprise
 */
  private $fonction;

/**
 * fonction public : getFonction
 *
 * la fonction get de la propriété fonction
 *
 * @param void
 *
 * @return string fonction du client
 */
  public function getFonction(){
    return $this->fonction;
  }

/**
 * fonction public : setFonction
 *
 * la fonction set de la propriété fonction
 *
 * @param string fonction du client
 *
 * @return void
 */
  public function setFonction(string $fonction){
    $this->fonction=$fonction;
  }
}
