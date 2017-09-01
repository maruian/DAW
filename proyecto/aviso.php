<?php

if (!class_exists('Db')){
   include "db.php";
}

class Aviso extends Db {
   
   function __construct(){
      parent::__construct();
   }

   function crearAviso($descripcion){
      $consulta="INSERT INTO aviso (idAviso, fechaApertura, horaApertura, fechaInicio, fechaFin, horaInicio, horaFin, descripcion) VALUES (NULL, NOW(), NOW(), NULL, 0, NULL, NULL, '$descripcion')";
      $resultado=$this->realizarConsulta($consulta);
      echo "<!DOCTYPE html>";
      echo "<html>";
      echo "<head>";
      echo "<meta charset='utf-8'>";
      echo "<title>Avisos...</title>";
      echo "<link rel='stylesheet' href='estilos.css'>";
      echo "</head>";
      echo "<body>";      
      if($resultado!=false){
          //Recogemos el ultimo aviso insertado
          $consulta="SELECT * FROM aviso ORDER BY idAviso DESC";
          $resultado=$this->realizarConsulta($consulta);
          if($resultado!=false){
             $aviso=$resultado->fetch_assoc();
             echo "<h2>Aviso creado correctamente</h2><br />";
             echo "<label>ID Aviso</label>";
             echo "<input type='text' value='" . $aviso["idAviso"] . "' readonly>";
             echo "<label>Descripción</label>";
             echo "<input type='text' value='" . $aviso["descripcion"] . "' readonly>";
             echo "<label>Fecha de alta</label>";
             echo "<input type='text' value='" . $aviso["fechaApertura"] . "' readonly>";
             echo "<label>Hora de alta</label>";
             echo "<input type='text' value='" . $aviso["horaApertura"] ."' readonly>";
             echo "<a href='principal.php'>Volver</a>";
          } else {
            echo "<h2>Hubo un problema al crear el aviso</h2><br />";
            echo "<br />Descripción del error: " . $this->descErrorConsulta() . "<br />";
            echo "<a href='principal.php'>Volver</a>";
          }
      } else {
          echo "<h2>Hubo un problema al crear el aviso</h2><br />";
          echo "<br />Descripción del error: " . $this->descErrorConsulta() . "<br />";
          echo "<a href='principal.php'>Volver</a>";
      }
      echo "</body>";
      echo "</html>";

   }       

   function devolverAvisos(){
      //Construimos la consulta
      $consulta="SELECT * FROM aviso ORDER BY fechaFin ASC";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($consulta);
      if($resultado!=null){
          $tabla=[];
         while($fila=$resultado->fetch_assoc()){
            $tabla[]=$fila;
         }
         return $tabla;
      } else {
         return null;
      }
   }

    function devolverOperariosXAviso($idAviso){
      //Construimos la consulta
      $consulta="SELECT * FROM operario INNER JOIN operario_aviso ON operario.idOperario=operario_aviso.idOperario WHERE idAviso=$idAviso";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($consulta);
      if($resultado!=null){
        $tabla=[];
        while($fila=$resultado->fetch_assoc()){
           $tabla[]=$fila;
        }
        return $tabla;
      } else {
        return null;
      }
   }

   function devolverAvisosAbiertos(){
      $consulta="SELECT * FROM aviso WHERE fechaFin=0 OR fechaFin=NULL";
      $resultado=$this->realizarConsulta($consulta);
      if($resultado!=null){
         $tabla=[];
         while($fila=$resultado->fetch_assoc()){
            $tabla[]=$fila;
         }
         return $tabla;
      } else {
         return null;
      }
   }

   function devolverAviso($idAviso){
      $consulta="SELECT * FROM aviso WHERE idAviso=$idAviso";
      $resultado=$this->realizarConsulta($consulta);
      if($resultado!=null){
         return $resultado->fetch_assoc();
      } else {
         return null;
      }
   }

    function borrarAviso($idAviso){
       $consulta="DELETE FROM aviso WHERE idAviso=$idAviso";
       $resultado=$this->realizarConsulta($consulta);
       if($resultado!=null){
           echo "<h2>Aviso " . $idAviso . " eliminado</h2>";
       } else {
           echo "<h2>Hubo un problema con la eliminación del aviso</h2>";
           echo "<h3>Comprueba que este aviso no tenga asignado algún operario y/o piezas.</h3>";
           echo $this->descErrorConsulta();
       }
   }

   function devolverClienteXaviso($idAviso){
       $consulta="SELECT * FROM cliente INNER JOIN aviso ON cliente.idCliente=aviso.idCliente WHERE aviso.idAviso=$idAviso";
       $resultado=$this->realizarConsulta($consulta);
       return $resultado->fetch_assoc();
   }

   function asignarClienteAviso($idCliente, $idAviso){
       $consulta="UPDATE aviso SET idCliente=$idCliente WHERE idAviso=$idAviso";
       $resultado=$this->realizarConsulta($consulta);
       if($resultado!=0){
           return true;
       } else {
           return false;
       }
   }

}
?>
