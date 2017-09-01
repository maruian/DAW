<?php
/*
 * Matias Ruiz
 * 1 DAM
 *
*/

class DbNBA{
   private $host="localhost";
   private $user="root";
   private $pass="";
   private $db_name="nba";

   private $conexion;
   private $error=false;

   public function DbNBA(){
      $this->conexion=new mysqli($this->host,$this->user,$this->pass,$this->db_name);
      if ($this->conexion->connect_errno){
          $this->error=true;
      }
   }

   public function hayError(){
       return $this->error;
   }

   public function devolverEquipos(){
       if ($this->error==false){
           $resultado=$this->conexion->query("SELECT nombre,conferencia FROM equipos");
           return $resultado;
       }else{
           return null;
       }
   }

   public function devolverEquiposConf($conferencia){
       if ($this->error==false){
           $resultado=$this->conexion->query("SELECT nombre,conferencia FROM equipos WHERE conferencia='$conferencia'");
           return $resultado;
       }else{
           return null;
       }
   }

}