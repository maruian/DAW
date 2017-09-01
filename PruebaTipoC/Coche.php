<?php
/* Matias Ruiz
 * 1 DAM
 *
 */
   
   class Coche {
       public $marca="ford";
       public $potencia=1200;

       public function Coche(){
           echo "<h2>Estoy creando un coche</h2>";
       }

       public function setMarca($marca){
           $this->marca=$marca;
       }

       public function setPotencia($potencia){
           $this->potencia=$potencia;
       }

       public function getMarca(){
           return $this->marca;
       }

       public function getPotencia(){
           return $this->potencia;
       }

   }
?>
