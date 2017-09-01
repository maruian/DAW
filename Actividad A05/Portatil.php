<?php
/*
 * Matias Ruiz
 * 1 DAM
 */
class Portatil {
   public $memoria=0;
   public $disco=0;
   public $procesador='';
   public $pantalla=0;

   public function Portatil(){
       echo "<h1>Creando un portátil</h1>";
       echo "<hr>";
   }

   public function setMemoria($memoria){
       $this->memoria=$memoria;
   }

   public function setDisco($disco){
       $this->disco=$disco;
   }

   public function setProcesador($procesador){
       $this->procesador=$procesador;
   }

   public function setPantalla($pantalla){
       $this->pantalla=$pantalla;
   }

   public function getMemoria(){
       return $this->memoria;
   }

   public function getDisco(){
       return $this->disco;
   }

   public function getProcesador(){
       return $this->procesador;
   }

   public function getPantalla(){
       return $this->pantalla;
   }


}

?>
