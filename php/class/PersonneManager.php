<?php

/**
 *
 */
abstract class PersonneManager extends Manager {

  protected $table='personnes';
  protected $champs=[
    [
      'nom'=>'id',
      'PDO'=> PDO::PARAM_INT
    ],
    [
      'nom'=>'nom',
      'PDO'=>PDO::PARAM_STR
    ],
    [
      'nom'=>'prenom',
      'PDO'=>PDO::PARAM_STR
    ],
    [
      'nom'=>'telephone',
      'PDO'=>PDO::PARAM_STR
    ],
    [
      'nom'=>'email',
      'PDO'=>PDO::PARAM_STR
    ]
  ];

  public function readWhereEmail($email){
    return $this->readWhereValue($email,'email');
  }
}
