<?php

/**
 * Classe EntrepriseManager
 *
 * Possède les propriétés et méthodes de la classe Manager
 */
class EntrepriseManager extends Manager {
  /**
   * Propriété protected string : table
   *
   * Nom de la table dans la base de données
   */
  protected $table='entreprise';

  /**
   * Proriété protected array<array<string,integer>> : $champs
   *
   * Nom des champs dans la base de données. Ainsi que leur type
   */
  protected $champs=[
    [
      'nom'=>'id',
      'PDO'=> PDO::PARAM_INT
    ],
    [
      'nom'=>'siret',
      'PDO'=> PDO::PARAM_STR
    ],
    [
      'nom'=>'raisonSociale',
      'PDO'=> PDO::PARAM_STR
    ],
    [
      'nom'=>'adresse',
      'PDO'=> PDO::PARAM_STR
    ],
    [
      'nom'=>'codePostal',
      'PDO'=> PDO::PARAM_INT
    ],
    [
      'nom'=>'ville',
      'PDO'=> PDO::PARAM_STR
    ],
  ];

  /**
   * fonction public : read
   *
   * lecture d'une Entreprise
   *
   * @param integer id d'une Entreprise.
   *
   * @return Entreprise objet possédant toutes les informations d'une Entreprise.
   */
  public function read(int $id){

    //fonction readWhereValue de Manager
    $values=$this->readWhereValue($id,'id');
    return new Entreprise($values);
  }

  /**
   * fonction public : readAll
   *
   * Redéfinition de la fonctionn readAll du Manager pour la lecture de toutes les entreprises.
   *
   * @param void.
   *
   * @return array<Entreprise> objet possédant toutes les informations d'une Entreprise.
   */
  public function readAll(){
    $values=parent::readAll();
    if (array_key_exists('id',$values)) {
      return new Entreprise($values);
    } else {
      $tableau=[];
      foreach ($values as $value) {
        $tableau[]= new Entreprise($value);
      }
      return $tableau;
    }
  }
}
