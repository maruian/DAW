<?php
/**
 * Matias Ruiz
 * 1 DAM
 */
   
  class Animal {
    
     public $tipo="perro";
     public $patas=4;
    
     public function Animal(){
         echo "<h2>Estamos creando un animal</h2>";
     }
     public function getTipo(){
        return $this->tipo;
     }

     public function getPatas(){
        return $this->patas;
     }

     public function setTipo($tipo){
        $this->tipo=$tipo;
     }

     public function setPatas($patas){
        $this->patas=$patas;
     }
  
  }

?>
