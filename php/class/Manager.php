<?php

/**
 *
 */
abstract class Manager {

  private $dbInfo = 'mysql:host=localhost;dbname=expense_manager;charset=utf8';
  private $dbUser = 'root';
  private $dbMdp = '';
  private $dbOption = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
  protected $db, $table,$champs,$valuesPDO;

  protected function connectDB(){
    $this->db=new PDO($this->dbInfo,$this->dbUser,$this->dbMdp,$this->dbOption);
  }

  protected function valuesPDO(){
    foreach ($this->champs as $value) {
      $this->valuesPDO[$value]=':'.$value;
    }
  }

  public function create(Entity $entity){

    $champs=$this->strWithoutIdChamps();
    $valuesPDO=$this->strWithoutIdValuesPDO();

    $sql = 'INSERT INTO '.$this->table." ($champs) VALUES ($valuesPDO)";

    $req=$this->db->prepare($sql);
    $this->bindvaluesPDO($req,$entity);
    $req->execute();

    $id = $this->db->lastInsertId();
    $entity->setId($id);
  }

  public function read(int $id){

    $sql = 'SELECT * FROM '.$this->table.' WHERE '.$this->conditionId();

    $req=$this->db->prepare($sql);
    $this->bindId($req,$id);
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC);
  }

  public function readAll(){

    $sql = 'SELECT * FROM '.$this->table;

    $req=$this->db->prepare($sql);
    $req->execute();
    return $req->fetchALL(PDO::FETCH_ASSOC);
  }

  public function readAllFk(int $id){

    $sql='SELECT * FROM'.$this->table.'WHERE'.$this->conditionFk();

    $req=$this->db->prepare($sql);
    $this->bindFkMission($req,$id);
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
  }

  public function update(Entity $entity){

    $update=$this->lierChampsValuesPDO();

    $sql = 'UPDATE '.$this->table." SET $update WHERE ".$this->conditionId();

    $req=$this->db->prepare($sql);
    $this->bindId($req,$entity->getId());
    $this->bindvaluesPDO($req,$entity);
    $req->execute();
  }

  public function delete(Entity $entity){

    $sql = 'DELETE FROM '.$this->table.' WHERE '.$this->conditionId();

    $req=$this->db->prepare($sql);
    $this->bindId($req,$id);
    $req->execute();
  }

  private function strWithoutIdChamps(){
    $champs=array_slice($this->champs,1);
    return implode(',',$champs);
  }

  private function strWithoutIdValuesPDO(){
    $valuesPDO=array_slice($this->valuesPDO,1);
    return implode(',',$valuesPDO);
  }

  private function conditionId(){
    return $this->champs[0].'='.$this->valuesPDO[$this->champs[0]];
  }

  private function lierChampsValuesPDO(){
    $return='';
    foreach ($this->champs as $champ) {
      $return.=$champ.'='.$this->valuesPDO[$champ].',';
    }
    return substr($return,0,-1);
  }

}



?>
