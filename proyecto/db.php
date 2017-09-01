<?php
/**
 * Permitir la conexion contra la base de datos
 */

class Db {

// Atributos necesarios para la conexion
   private $host="localhost";
   private $user="root";
   private $pass="";
   private $db_name="avisos";

// Conector
   private $conexion;

// Propiedades para controlar errores
   private $error=false;
   private $error_msj="";

   function __construct(){
       $this->conexion=new mysqli($this->host, $this->user, $this->pass, $this->db_name);
       if ($this->conexion->connect_errno) {
           $this->error=true;
           $this->error_msj="No se ha podido realizar la conexion a la BBDD. Revisa la base de datos o los parametros de conexion";
       }
   }

   //Funcion para saber si hay error en la conexion
   public function hayError(){
       return $this->error;
   }

   //Funcion que devuelve mensaje de error
   public function msjError(){
       return $this->error_msj;
   }

   //Metodo para la realizacion de consultas a la bd
   public function realizarConsulta($consulta){
       if($this->error==false){
           $resultado=$this->conexion->query($consulta);
           return $resultado;
       }else{
           $this->error_msj ="Imposible realizar la consulta: " . $consulta;
           return null;
       }
   }

   public function descErrorConsulta(){
       return $this->conexion->error;
   }

   
   public function errorConsulta(){
       return $this->conexion->errno;
   }

}

?>