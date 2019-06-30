<?php

/**
 *
 */
class Entreprise extends Entity {

  private $id,$siret,$raisonSociale,$adresse,$codePostal,$ville;

  function __construct($values=null){
    if($values){
      $this->hydrate($values);
    }
  }

  public function getId(){
    return $this->id;
  }

  public function getSiret(){
    return $this->siret;
  }

  public function getRaisonSociale(){
    return $this->raisonSociale;
  }

  public function getAdresse(){
    return $this->adresse;
  }

  public function getCodePostal(){
    return $this->codePostal;
  }

  public function getVille(){
    return $this->ville;
  }

  public function setId($id){
    $this->id=$id;
  }

  public function setSiret($siret){
    $this->siret=$siret;
  }

  public function setRaisonSociale($raisonSociale){
    $this->raisonSociale=$raisonSociale;
  }

  public function setAdresse($adresse){
    $this->adresse=$adresse;
  }

  public function setCodePostal($codePostal){
    $this->codePostal=$codePostal;
  }

  public function setVille($ville){
    $this->ville=$ville;
  }
}
