<?php

/**
 *
 */
class PresenceClientManager extends Manager {

  protected $table='portefeuille';
  protected $champs=[
    [
      'nom'=>'id',
      'PDO'=>PDO::PARAM_INT
    ],
    [
      'nom'=>'fkNoteDeFrais',
      'PDO'=>PDO::PARAM_INT
    ],
    [
      'nom'=>'fkClient',
      'PDO'=>PDO::PARAM_INT
    ]
  ];

  public function readWhereFkNoteDeFrais(NoteDeFrais $ndf){
    return $this->readWhereFk($ndf,'fkNoteDeFrais')
  }

  public function readWhereFkClient(Client $client){
    return $this->readWhereFk($client,'fkClient')
  }

  public function readWhereFk($element,$fk){
    $values=$this->readWhereValue($element->getId(),$fk);
    if ($values) {
      $tableau=[];
      foreach ($values as $value) {
        $tableau[]= new noteDeFrais($value);
      }
      return $tableau;
    }
  }
}
