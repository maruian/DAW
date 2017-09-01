<?php
/*
 * Matias Ruiz
 * 1 DAM
 */

class Ordenador {
   public $marca="hp";
   public $memoria=4;

   public function Ordenador(){
       echo "<h2>Estamos creando un ordenador</h2>";
   }

   public function setMarca($marca){
       $this->marca=$marca;
   }

   public function setMemoria($memoria){
       $this->memoria=$memoria;
   }

   public function getMarca(){
       return $this->marca;
   }

   public function getMemoria(){
       return $this->memoria;
   }
}

?>
