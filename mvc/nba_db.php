<?php

   class Nba_db {
      //Atributos necesarios para la conexion
      private $host="localhost";
      private $user="root";
      private $pass="";
      private $db_name="nba";

      private $conexion;
      private $error=false;

      public function Nba_db(){
         $this->conexion=new mysqli($this->host, $this->user, $this->pass, $this->db_name);
            if ($this->conexion->connect_errno) {
               $this->error=true;
               echo "Se ha producido un erro en la conexion a la base de datos <br />";
               echo "Error número: " . $this->conexion->connect_errno . "<br />";
               echo "Descripción del error: " . $this->conexion->connect_error . "<br />";
            }
        }  
      
      public function devolverEquipos(){
         if($this->error==false){
             $resultado=$this->conexion->query("SELECT nombre FROM equipos");
             return $resultado;
         } else {
             return null;
         }
      }
     
      public function devolverEquiposConferencia(){
          if($this->error==false){
              $resultado=$this->conexion->query("SELECT nombre, conferencia FROM equipos");
              return $resultado;
          } else {
              return null;
          }
      }
    }
   

?>