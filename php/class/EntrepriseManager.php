<?php

/**
 *
 */
class EntrepriseManager extends Manager
{

  protected $table='entreprise';
  protected $champs=[
    'id',
    'siret',
    'raisonSociale',
    'adresse',
    'codePostal',
    'ville',
  ];

  public function read(int $id){
    $values=parent::read($id);
    return new Entreprise($values);
  }

  public function readAll(){
    $values=parent::readAll();
    $tableau=[];
    foreach ($values as $value) {
      $tableau[]= new Entreprise($value);
    }
    return $tableau;
  }

  protected function bindId($req,$id){
    $req->bindValue($this->valuesPDO[$this->champs[0]],$id,PDO::PARAM_INT);
  }

  protected function bindvaluesPDO($req,$entreprise){
    $req->bindValue($this->valuesPDO[$this->champs[1]],$entreprise->getSiret(),PDO::PARAM_STR);
    $req->bindValue($this->valuesPDO[$this->champs[2]],$entreprise->getRaisonSociale(),PDO::PARAM_STR);
    $req->bindValue($this->valuesPDO[$this->champs[3]],$entreprise->getAdresse(),PDO::PARAM_STR);
    $req->bindValue($this->valuesPDO[$this->champs[4]],$entreprise->getCodePostal(),PDO::PARAM_INT);
    $req->bindValue($this->valuesPDO[$this->champs[5]],$entreprise->getVille(),PDO::PARAM_STR);
  }
}