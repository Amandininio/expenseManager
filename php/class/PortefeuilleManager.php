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

  public function readWhereFkCommercial($Commercial){
    $values=$this->readWhereValue($Commercial->getId(),'fkCommercial');
    if ($values) {
      $tableau=[];
      foreach ($values as $value) {
        $tableau[]= new portefeuille($value);
      }
      return $tableau;
    }
  }
}
