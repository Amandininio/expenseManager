<?php

/**
 * Classe ClientManager
 *
 * Possède les propriétés et méthodes des classes PersonneManager et Manager
 */
class ClientManager extends PersonneManager {

  /**
   * Constructeur
   *
   * Ajout des données fonction et fkEntreprise au tableau champs et appel au constructeur de Manager
   *
   * @param void
   *
   * @return void
   */
  public function __construct(){
    $this->champs=array_merge(
      $this->champs,
      [
        [
          'nom'=>'fkEntreprise',
          'PDO'=>PDO::PARAM_INT
        ],
        [
          'nom'=>'fonction',
          'PDO'=>PDO::PARAM_STR
        ]
      ]
    );
    parent::__construct();
  }

  /**
   * fonction public : Create
   *
   * Ajout d'un client dans la base de données après avoir vérifié que l'adresse mail ne soit pas présente dans la base.
   *
   * @param Client objet possédant toutes les informations d'un client.
   *
   * @return void
   */
  public function create($client){

    // fonction readWhereEmail de PersonneManager
    $user=$this->readWhereEmail($client->getEmail());

    if ($user==null) {
      parent::create($client);
    } else {
      if ($user['fkEntreprise']==null) {
        $client->setId($user->getId());
        $this->update($client);
      }
    }
  }

  /**
   * fonction public : read
   *
   * lecture d'un client
   *
   * @param integer id d'un client.
   *
   * @return Client objet possédant toutes les informations d'un client.
   */
  public function read(int $id){

    //fonction readWhereValue de Manager
    $values=$this->readWhereValue($id,'id');

    if ($values) {
      return new Client($values);
    }
  }

  /**
   * fonction public : update
   *
   * mise à jour des données d'un client. Après vérification que l'email ne soit pas déjà présent dans la base de données. /!\ Principe à revoir.
   *
   * @param Client objet possédant toutes les informations d'un client.
   *
   * @return void
   */
  public function update($client){

    $email=$client->getEmail();
    $user;

    if ($email) {
      //fonction readWhereEmail de Manager
      $user=$this->readWhereEmail($email);
    }

    if ($user) {
      $id=$user['id'];
      if ($id=$client->getId()){
        parent::update($client);
      } else {
        $this->updateDataClient(PortefeuilleManager,$client,$id);
        $this->updateDataClient(RencontreManager,$client,$id);
        $this->delete($client);
        $client->setId($id);  //ENORME FAILLE A REVOIR
        parent::update($client);
      }
    } else {
      parent::update($client);
    }
  }

  /**
   * fonction private : updateDataClient
   *
   * mise à jour des données liées à un client dans une autre table de la base de données.
   *
   * @param Manager objet permettant l'édition d'une table de la base de données.
   * @param Client objet possédant toutes les informations d'un client.
   * @param integer nouveau id du client.
   *
   * @return void
   */
  private function updateDataClient(Manager $Manager,Client $oldClient,int $newId){
    $manData=new $Manager();

    //fonction readWhereFkClient de PersonneManager
    $data=$manData->readWhereFkClient($oldClient);
    foreach ($data as $value) {
      $value->setFkClient($newId);
      $manData->update($value);
    }
  }
}
