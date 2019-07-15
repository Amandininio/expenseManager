<?php

abstract class Entity {

  protected $id;

  function __construct($values=null){
    if($values){
      $this->hydrate($values);
    }
  }

  protected function hydrate(array $values){
    foreach ($values as $key => $value){
        $methodName = 'set'.ucfirst($key);
      if(method_exists($this,$methodName)){
        $this->$methodName($value);
      }
    }
  }

  public function getId(){
    return $this->id;
  }

  public function setId(int $id){
    $this->id=$id;
  }
}
