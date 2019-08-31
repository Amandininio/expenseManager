<?php

/**
 * Classe FactureManager
 *
 * Possède les propriétés et méthodes des classes NdfManager et Manager
 */
class FactureManager extends NdfManager {

  /**
   * Constructeur
   *
   * instanciation du manager des factures. Ajout des données photo et montant au tableau champs
   *
   * @param void
   *
   * @return void
   */
  function __construct(){
    $this->champs=array_merge(
      $this->champs,
      [
        [
          'nom'=>'photo',
          'PDO'=>PDO::PARAM_LOB
        ],
        [
          'nom'=>'montant',
          'PDO'=>PDO::PARAM_INT
        ]
      ]
    );
    parent::__construct();
  }

  /**
   * fonction public : read
   *
   * lecture d'une Facture
   *
   * @param integer id d'une Facture.
   *
   * @return Facture objet possédant toutes les informations d'une Facture.
   */
  public function read(int $id){

    // fonction readWhereValue de Manager
    $values=$this->readWhereValue($id,'id');
    if ($values) {
      return new Facture($values);
    }
  }
}
