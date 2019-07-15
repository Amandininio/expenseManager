<?php

/**
 *
 */
abstract class Manager {

  private $dbInfo = 'mysql:host=localhost;dbname=expense_manager;charset=utf8';
  private $dbUser = 'root';
  private $dbMdp = '';
  private $dbOption = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
  protected $db, $table, $champs;

  public function __construct(){
    $this->db = new PDO($this->dbInfo,$this->dbUser,$this->dbMdp,$this->dbOption);
  }

  public function create(Entity $entity){

    $champs=$this->strWithoutIdChamps();
    $noms=$champs['noms'];
    $values=$champs['values'];

    $sql = 'INSERT INTO '.$this->table." ($noms) VALUES ($values)";
    var_dump($sql);
    $req=$this->db->prepare($sql);
    $this->bindvaluesPDO($req,$entity);
    $req->execute();

    $id = $this->db->lastInsertId();
    $entity->setId($id);
  }

  public function readWhereValue($value, string $champ){

    $sql='SELECT * FROM '.$this->table.' WHERE '.$this->condition($champ);

    $req=$this->db->prepare($sql);
    $this->bindValue($req,$value,$champ);
    $req->execute();
    $values=$req->fetchAll(PDO::FETCH_ASSOC);
    if (sizeof($values)==1) {
      return $values[0];
    } else {
      return $values;
    }
  }

  public function readAll(){

    $sql = 'SELECT * FROM '.$this->table;

    $req=$this->db->prepare($sql);
    $req->execute();
    return $req->fetchALL(PDO::FETCH_ASSOC);
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
    $noms=[];
    $values=[];
    foreach ($champs as $champ) {
      $noms[]=$champ['nom'];
      $values[]=':'.$champ['nom'];
    }
    return [
      'noms' => implode(',',$noms),
      'values' => implode(',',$values)
    ];
  }

  private function condition($champ){
    return $champ.'=:'.$champ;
  }

  private function lierChampsValuesPDO(){
    $return='';
    foreach ($this->champs as $champ) {
      $return.=$champ['nom'].'=:'.$champ['nom'].',';
    }
    return substr($return,0,-1);
  }

  protected function bindValue($req,$value,$type){
    foreach ($this->champs as $key => $champ) {
      if ($champ['nom']==$type) {
        $req->bindValue(':'.$champ['nom'],$value,$champ['PDO']);
      }
    }
  }

  protected function bindvaluesPDO($req,Entity $entity){
    $champs=array_slice($this->champs,1);
    foreach ($champs as  $champ) {
      $methodName = 'get'.ucfirst($champ['nom']);
      if(method_exists($entity, $methodName)){
        $req->bindValue(':'.$champ['nom'],$entity->$methodName(),$champ['PDO']);
      }
    }
  }
}



?>
