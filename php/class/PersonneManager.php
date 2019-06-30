<?php

/**
 *
 */
abstract class PersonneManager extends Manager {

  protected $table='personnes';
  protected $champs=[
    'id',
    'nom',
    'prenom',
    'telephone',
    'email'
  ];

  protected $paramPDO=[
    PDO::PARAM_INT,
    PDO::PARAM_STR,
    PDO::PARAM_STR,
    PDO::PARAM_INT,
    PDO::PARAM_STR
  ];
}
