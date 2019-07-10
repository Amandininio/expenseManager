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
    if (in_array($statut,$this->statutPossible)) {
      $this->statut=$statut;
    } else {
      $this->statut=$this->statutPossible[0];
    }
  }

  public function setFkCommercial(int $fkCommercial){
    $manUser=new UserManager();
    $user=$manUser->read($fkCommercial);
    var_dump($user);
    if ($user && ($user->getType()=='commercial')) {
      $this->fkCommercial=$fkCommercial;
    }
  }
}
