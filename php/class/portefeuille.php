<?php

/**
 *
 */
class Portefeuille extends Entity {

  private $fkCommercial,$fkClient;

  public function getFkCommercial(){
    return $this->fkCommercial;
  }

  public function getFkClient(){
    return $this->fkClient;
  }

  protected function setFkCommercial(int $fkCommercial){
    $this->$fkCommercial=$fkCommercial;
  }

  protected function setFkClient(int $fkClient){
    $this->$fkClient=$fkClient;
  }

  public function setFkCommercial(Commercial $commercial){
      $fk=$commercial->getId();
      $this->setFkCommercial($fk);
  }

  public function setClient(Client $client){
    $fk=$client->getId();
    $this->setFkClient($fk);
  }
}
