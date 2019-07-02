<?php

/**
 *
 */
class Personne extends Entity {

  private $nom,$prenom,$telephone,$email;

  public function getNom(){
    return $this->nom;
  }

  public function getPrenom(){
    return $this->prenom;
  }

  public function getTelephone(){
    return $this->telephone;
  }

  public function getEmail(){
    return $this->email;
  }

  public function setNom(string $nom){
    if (preg_match('/^(\w|\s)*$/',$nom)){
      $this->nom = strtoupper($nom);
    }
  }

  public function setPrenom(string $prenom){
    if (preg_match('/^(\w|\s)*$/',$email)){
      $this->prenom = ucfirst(strtolower($prenom));
    }
  }

  public function setTelephone(string $telephone){
    if (preg_match('/^(0\d)(\s\d\d){4}$/',$telephone)){
      $this->telephone=$telephone;
    }
  }

  public function setEmail(string $email){
    if (preg_match('/^.+\@.+\..{2,3}$/',$email)){
      $this->email=$email;
    }
  }
}
