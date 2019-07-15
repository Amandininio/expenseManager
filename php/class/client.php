<?php

/**
 *
 */
class Client extends Personne {

  private $fonction, $fkEntreprise;

  public function getFonction(){
    return $this->fonction;
  }

  public function getFkEntreprise(){
    return $this->fkEntreprise;
  }

  public function setFonction(string $fonction){
    $this->fonction=$fonction;
  }

  protected function setFkEntreprise(int $fk){
    $this->fkEntreprise=$fk;
  }

  public function getEntreprise(){
    $manUser=new EntrepriseManager();
    $entreprise=$manUser->read($this->fkEntreprise);
    if ($entreprise) {
      return $entreprise;
    }
  }

  public function setEntreprise(Entreprise $entreprise){
    $fk=$entreprise->getId();
    $this->setFkEntreprise($fk);
  }
}
