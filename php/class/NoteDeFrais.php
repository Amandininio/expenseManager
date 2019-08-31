<?php
/**
 *
 */
class NoteDeFrais extends Entity {

  private $raison, $dateNDF, $comCommercial, $remboursement, $comComptable, $fkMission;
  private $raisonPossible=[];

  public function getRaison(){
    return $this->raison;
  }

  public function getDateNDF(){
    return $this->dateNDF;
  }

  public function getComCommercial(){
    return $this->comCommercial;
  }

  public function getRemboursement(){
    return $this->remboursement;
  }

  public function getComComptable(){
    return $this->comComptable;
  }

  public function getFkMission(){
    return $this->fkMission;
  }

  public function setRaison(string $raison){
    if (in_array($statut,$this->raisonPossible)) {
      $this->raison=$raison;
    }
  }

  public function setDateNDF(string $dateNDF){
    try{
      $dateNdf = New DateTime($dateNDF);
    }catch (Exception $e){}

    if(isset($dateNdf)){
      $this->dateNDF = $dateNdf;
    }
  }
}
