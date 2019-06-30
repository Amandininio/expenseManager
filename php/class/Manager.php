<?php

/**
 *
 */
abstract class Manager {

  private $dbInfo = 'mysql:host=localhost;dbname=expense_manager;charset=utf8';
  private $dbUser = 'root';
  private $dbMdp = '';
  private $dbOption = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
  protected $db, $table, $champs, $valuesPDO, $paramPDO;

  public function __construct(){
    $this->connectDB();
    $this->valuesPDO();
  }

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

    $sql = 'SELECT * FROM '.$this->table.' WHERE '.$this->condition('id');

    $req=$this->db->prepare($sql);
    $this->bindValue($req,$id,'id');
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC);
  }

  public function readAll(){

    $sql = 'SELECT * FROM '.$this->table;

    $req=$this->db->prepare($sql);
    $req->execute();
    return $req->fetchALL(PDO::FETCH_ASSOC);
  }

  public function readAllFk(Entity $entity, string $fk){

    $sql='SELECT * FROM'.$this->table.'WHERE'.$this->condition($fk);

    $req=$this->db->prepare($sql);
    $this->bindValue($req,$entity->getId(),$fk);
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
  }

  public function update(Entity $entity){

    $update=$this->lierChampsValuesPDO();

    $sql = 'UPDATE '.$this->table." SET $update WHERE ".$this->condition('id');

    $req=$this->db->prepare($sql);
    $this->bindValue($req,$entity->getId(),'id');
    $this->bindvaluesPDO($req,$entity);
    $req->execute();
  }

  public function delete(Entity $entity){

    $sql = 'DELETE FROM '.$this->table.' WHERE '.$this->condition('id');

    $req=$this->db->prepare($sql);
    $this->bindValue($req,$entity->getId(),'id');
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

  private function condition($champ){
    return $champ.'=:'.$champ;
  }

  private function lierChampsValuesPDO(){
    $return='';
    foreach ($this->champs as $champ) {
      $return.=$champ.'='.$this->valuesPDO[$champ].',';
    }
    return substr($return,0,-1);
  }

  protected function bindValue($req,$value,$type){
    foreach ($this->champs as $key => $champ) {
      if ($champ==$type) {
        $req->bindValue($this->valuesPDO[$champ],$value,$this->paramPDO[$key]);
      }
    }
  }

  protected function bindvaluesPDO($req,Entity $entity){
    $champs=array_slice($this->champs,1);
    $paramPDO=array_slice($this->paramPDO,1);
    foreach ($champs as $key => $champ) {
      $methodName = 'get'.ucfirst($champ);
      var_dump([$key]);
      if(method_exists($entity, $methodName)){
        var_dump($methodName);
        $req->bindValue($this->valuesPDO[$champ],$entity->$methodName(),$paramPDO[$key]);
      }
    }
  }
}



?>
