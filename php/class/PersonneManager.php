<?php

/**
 *
 */
abstract class PersonneManager extends Manager {

  protected $table='personnes';
  protected $champs=[
    'id',
    'nom',
    'prenom',
    'telephone',
    'email'
  ];

  protected function bindId($req,$id){
    $req->bindValue($this->valuesPDO[$this->champs[0]],$id,PDO::PARAM_INT);
  }

  protected function bindvaluesPersonne($req,$personne){
    $req->bindValue($this->values[$this->champs[1]],$personne->getNom(),PDO::PARAM_STR);
    $req->bindValue($this->values[$this->champs[2]],$personne->getPrenom(),PDO::PARAM_STR);
    $req->bindValue($this->values[$this->champs[3]],$personne->getTelephone(),PDO::PARAM_STR);
    $req->bindValue($this->values[$this->champs[4]],$personne->getEmail(),PDO::PARAM_STR);
  }
}
