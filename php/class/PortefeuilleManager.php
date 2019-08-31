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
      'nom'=>'fkCommercial',
      'PDO'=>PDO::PARAM_INT
    ],
    [
      'nom'=>'fkClient',
      'PDO'=>PDO::PARAM_INT
    ]
  ];

  public function readWhereFkCommercial(Commercial $commercial){
    $values=$this->readWhereValue($commercial,'fkCommercial');
    if (array_key_exists('id',$values)) {
      return new Portefeuille($values);
    } else {
      $tableau=[];
      foreach ($values as $value) {
        $tableau[]= new Portefeuille($value);
      }
      return $tableau;
    }
  }
}
