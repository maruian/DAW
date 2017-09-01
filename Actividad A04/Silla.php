<?php
   class Silla {
       public $patas=4;
       public $color="Marron";
   
   public function Silla(){
       echo "<h1>Creando una silla</h1><br />";
   }

   public function getPatas(){
       return $this->patas;
   }

   public function getColor(){
       return $this->color;
   }

   public function setPatas($patas){
       $this->patas=$patas;
   }

   public function setColor(){
       $this->color=$color;
   }
   
   }

?>