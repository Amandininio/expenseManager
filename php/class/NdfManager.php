<?php

/**
 *
 */
abstract class NdfManager extends Manager
{
  protected $table='noteDeFrais';
  protected $champs=[
    'id',
    'raison',
    'dateNDF',
    'comCommercial',
    'remboursement',
    'comComptable',
    'fkMission'
  ];


  protected function bindId($req,$id){
    $req->bindValue($this->valuesPDO[$this->champs[0]],$id,PDO::PARAM_INT);
  }

  protected conditionFk(){
    return $this->champs[6].'=:'.$this->champs[6];
  }

  protected function bindFk($req,$fk){
    $req->bindValue($this->values[$this->champs[6]],$fk,PDO::PARAM_INT);
  }



  protected function bindvaluesNdfPDO($req,$ndf){
    $req->bindValue($this->values[$this->champs[1]],$ndf->getRaison(),PDO::PARAM_STR);
    $req->bindValue($this->values[$this->champs[2]],$ndf->getDateNDF(),PDO::PARAM_STR);
    $req->bindValue($this->values[$this->champs[3]],$ndf->getComCommercial(),PDO::PARAM_STR);
    $req->bindValue($this->values[$this->champs[4]],$ndf->getremboursement(),PDO::PARAM_INT);
    $req->bindValue($this->values[$this->champs[3]],$ndf->getComComptable(),PDO::PARAM_STR);
    $this->bindFkMission($req,$this->getFkMission());
  }
}
