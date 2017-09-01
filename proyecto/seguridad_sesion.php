<?php

/**
 * Clase encargada del control de seguridad de la app
 */

class Seguridad_sesion {

   private $operario=null;

   function __construct(){
       //Arrancamos la sesion
       session_start();
       if(isset($_SESSION["operario"])){
           $this->operario=$_SESSION["operario"];
       }
   }

   public function getOperario(){
       return $this->operario;
   }

   public function addOperario($operario){
       $_SESSION["operario"]=$operario;
       $this->operario=$operario;
   }
   
   public function logOut(){
       $_SESSION=[];
       session_destroy();
   }

}

?>