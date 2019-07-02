<?php

/**
 *
 */
class Mission extends Entity {

  private $nom,$commentaire,$statut,$fkCommercial;
  private $statutPossible[
    'brouillon',
    'envoyé',
    'en cours de traitement',
    'cloturé'
  ];

  public function getNom(){
    return $this->nom;
  }

  public function getCommentaire(){
    return $this->commentaire;
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

  public function setCommentaire(string $commentaire){
    $this->commentaire=$commentaire;
  }

  public function setStatut(string $statut){
    if (in_array($statut,$statutPossible)) {
      $this->statut=$statut;
    }
  }

  public function setFkCommercial(int $fkCommercial){
    $this->fkCommercial=$fkCommercial;
  }
}
