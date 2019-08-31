<?php

/**
 *
 */
class Mission extends Entity {

  private $nom,$statut,$fkCommercial;
  private $statutPossible=[
    'brouillon',
    'envoyé',
    'en cours de traitement',
    'cloturé'
  ];

  public function getNom(){
    return $this->nom;
  }

  public function getStatut(){
    return $this->statut;
  }

  public function getFkCommercial(){
    return $this->fkCommercial;
  }

  public function setNom(string $nom){
    $this->nom=$nom;
  }

  public function setStatut(string $statut){
    if (in_array($statut,$this->statutPossible)){
      $this->statut=$statut;
    } else {
      $this->statut=$this->statutPossible[0];
    }
  }

  protected function setFkCommercial(int $fkCommercial){
    $this->fkCommercial=$fkCommercial;
  }

  public function getCommercial(){
    $manUser=new UserManager();
    $commercial=$manUser->read($this->fkCommercial);
    if ($commercial && ($commercial->getType()=='commercial')) {
      return $commercial;
    }
  }

  public function setCommercial(Commercial $commercial){
    $fk=$commercial->getId();
    $this->setFkCommercial($fk);
  }
}
