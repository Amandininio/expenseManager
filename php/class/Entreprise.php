<?php

/**
 * Classe Entreprise
 *
 * Possède les propriétés et les méthodes de la classe Entity
 */
class Entreprise extends Entity {

  private $siret,$raisonSociale,$adresse,$codePostal,$ville;

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

  public function setSiret($siret){
    if (preg_match('/^\d{3}\s\d{3}\s\d{3}\s\d{5}$/',$siret)){
      $this->siret=$siret;
    }
  }

  public function setRaisonSociale(string $raisonSociale){
    $this->raisonSociale=$raisonSociale;
  }

  public function setAdresse(string $adresse){
    $this->adresse=$adresse;
  }

  public function setCodePostal(int $codePostal){
    if (preg_match('/^\d{5}$/',$codePostal)){
      $this->codePostal=$codePostal;
    }
  }

  public function setVille(string $ville){
    $this->ville=$ville;
  }
}
