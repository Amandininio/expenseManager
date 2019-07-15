<?php

abstract class Entity {
  protected function hydrate(array $values){
    foreach ($values as $key => $value){
        $methodName = 'set'.ucfirst($key);
      if(method_exists($this,$methodName)){
        $this->$methodName($value);
      }
    }
  }

}
