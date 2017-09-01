<?php
/**
 * Matias Ruiz
 * 1 DAM
 */
class DbUsuarios {
   //Atributos necesarios para la conexion
   private $host="localhost";
   private $user="root";
   private $pass="";
   private $db_name="usuarios";

   //Conexion
   private $conexion;

   //Propiedades para controlar errores
   private $error=false;

   public function DbUsuarios(){
       $this->conexion=new mysqli($this->host, $this->user, $this->pass, $this->db_name);
       if ($this->conexion->connect_errno){
           $this->error=true;
       }
   }

   public function insertarUsuarios($nombre,$apellidos,$edad){
       if($this->error==false){
          $insercion="INSERT INTO usuario (id, nombre, apellidos, edad) VALUES (NULL, '$nombre', '$apellidos', $edad)";
          if (!$this->conexion->query($insercion)){
              echo "Falló la inserción <br />";
              echo "Error número: " . $this->conexion->errno . "<br />";
              echo "Descripción del error: " . $this->conexion->error;
              return false;
          }
          return true;
       } else {
          return false;
       }
   }
}