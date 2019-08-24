<?php

/**
 *
 */
class PresenceClientManager extends Manager {

  protected $table='presenceclient';
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
    if (array_key_exists('id',$values)) {
      return new NoteDeFrais($values);
    } else {
      $tableau=[];
      foreach ($values as $value) {
        $tableau[]= new NoteDeFrais($value);
      }
      return $tableau;
    }
  }
}
