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

}
