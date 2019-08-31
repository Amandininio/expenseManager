<?php
/**
 *
 */
class PresenceClient extends Entity {

  private $fkNoteDeFrais, $fkClient;

  public function getFkNoteDeFrais(){
    return $this->$fkNoteDeFrais;
  }

  public function getFkClient(){
    return $this->$fkClient;
  }

  protected function setFkNoteDeFrais(int $fk){
    $this->fkNoteDeFrais=$fk
  }

  protected function setFkClient(int $fk){
    $this->fkClient=$fk;
  }

  public function getClient(){
    $manClient=new ClientManager();
    $client=$manClient->read($this->fkClient);
    if ($client) {
      return $client;
    }
  }

  public function setClient(Client $client){
    $fk=$client->getId();
    $this->setFkClient($fk);
  }

  public function setNoteDeFrais(NoteDeFrais $ndf){
    $fk=$ndf->getId();
    $this->setFkNoteDeFrais($fk);
  }
}
