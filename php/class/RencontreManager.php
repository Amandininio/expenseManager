<?php

/**
 *
 */
class PortefeuilleManager extends Manager {

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

  public function readWhereFkNoteDeFrais($ndf){
    return $this->readWhereFk($ndf,'fkNoteDeFrais')
  }

  public function readWhereFkClient($client){
    return $this->readWhereFk($client,'fkClient')
  }

  public function readWhereFk($personne,$fk){
    $values=$this->readWhereValue($personne->getId(),$fk);
    if ($values) {
      $tableau=[];
      foreach ($values as $value) {
        $tableau[]= new noteDeFrais($value);
      }
      return $tableau;
    }
  }
}
