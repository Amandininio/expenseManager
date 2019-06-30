<?php

/**
 *
 */
class PortefeuilleManager extends Manager {

  protected $table='portefeuille';
  protected $champs=[
    'id',
    'fkCommercial',
    'fkClient'
  ];

  $paramPDO=[
    PDO::PARAM_INT,
    PDO::PARAM_INT,
    PDO::PARAM_INT
  ];

  public function readAllFkCommercial($Commercial){
    $values=parent::readAllFk($Commercial,'fkCommercial');
    $tableau=[];
    foreach ($values as $value) {
      $tableau[]= $value['fkClient'];
    }
    return $tableau;
  }
}
