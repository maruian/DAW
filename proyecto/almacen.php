<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Almacen</title>
   <link rel='stylesheet' href='estilos.css'>
</head>
<body>

<?php
if (!class_exists('Db')){
include "db.php";
}

class Almacen extends Db {
   
   function __construct(){
      parent::__construct();
   }

   function crearUbicacion($ubicacion){
      $consulta="INSERT INTO almacen (ubicacion, modificacion) VALUES ('$ubicacion', NOW())";
      $resultado=$this->realizarConsulta($consulta);
      if($resultado!=null){
         echo "<h2>Ubicacion creada correctamente</h2><br />";
         echo "<label>Ubicacion</label>";
         echo "<input type='text' value='" . $ubicacion . "' readonly>";
         echo "<a href='principal.php'>Volver</a>";
      } else {
         echo "<h2>Hubo un problema al crear la ubicación</h2><br />";
         echo "<h3>Compruebe si la ubicación ya existe.</h3>";
         echo "<br />Descripción del error: " . $this->descErrorConsulta() . "<br />";
         echo "<br /><a href='principal.php'>Volver</a>";
      }
   }

   function devolverUbicaciones(){
      //Construimos la consulta
      $consulta="SELECT * FROM almacen";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($consulta);
      if($resultado!=null){
         //Montamos la tabla de resultados
         $tabla=[];
         while($fila=$resultado->fetch_assoc()){
            $tabla[]=$fila;
         }
         return $tabla;
      } else {
         return null;
      }
   }

   function devolverUbicacionesLibres(){
      //Construimos la consulta
      $consulta="SELECT * FROM almacen WHERE idPieza IS NULL";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($consulta);
      if($resultado!=null){
         //Montamos la tabla de resultados
         $tabla=[];
         while($fila=$resultado->fetch_assoc()){
            $tabla[]=$fila;
         }
         return $tabla;
      } else {
         return null;
      }
   }

   function bajaPiezaAlmacen($ubicacion){
       $consulta="UPDATE almacen SET idPieza=NULL WHERE ubicacion='$ubicacion'";
       $resultado=$this->realizarConsulta($consulta);
       if($resultado!=null){
           return true;
       }else{
           return false;
       }
   }

   function devolverPiezaAlmacenXUbicacion($ubicacion){
       $consulta="SELECT * FROM pieza INNER JOIN almacen ON pieza.idPieza=almacen.idPieza WHERE almacen.ubicacion='$ubicacion'";
       $resultado=$this->realizarConsulta($consulta);
       if($resultado!=null){
           return $resultado->fetch_assoc();
       }else{
           return null;
       }
   }

   function devolverPiezasAlmacen(){
       $consulta="SELECT * FROM almacen INNER JOIN pieza ON almacen.idPieza = pieza.idPieza";
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

function stockPieza($idPieza){
   $consulta="SELECT COUNT(idPieza) AS num_piezas FROM almacen WHERE idPieza='$idPieza' GROUP BY idPieza";
   $resultado=$this->realizarConsulta($consulta);
      if ($resultado!=null){
         $stock=$resultado->fetch_assoc();
         return $stock['num_piezas'];
      } else {
         return null;
      }
}

function ubicarPiezaAviso($ubicacion, $idAviso){
      $pieza=$this->devolverPiezaAlmacenXUbicacion($ubicacion);
      $stock=($this->stockPieza($pieza['idPieza']))-1;
      if ($pieza!=null){
         $consulta="INSERT INTO pieza_aviso (idPieza, idAviso) VALUES (" . $pieza['idPieza'] . ", $idAviso)";
         if($this->realizarConsulta($consulta)){
               echo "<div>";
               echo "<h2>Pieza " . $pieza['idPieza'] . " asignada correctamente al aviso $idAviso</h2><br />";
               echo "<label>ID Pieza</label>";
               echo "<input type='text' value='" . $pieza["idPieza"] . "' readonly>";
               echo "<label>Descripcion</label>";
               echo "<input type='text' value='" . $pieza["descripcion"] . "' readonly>";
               echo "<label>Codigo / IUP</label>";
               echo "<input type='text' value='" . $pieza["codigo"] . "' readonly>";
               echo "<label>Precio</label>";
               echo "<input type='text' value='" . $pieza["precio"] . "' readonly>";
               echo "<label>Stock</label>";
               echo "<input type='text' value='" . $stock . "' readonly>";
               $pieza=$this->bajaPiezaAlmacen($ubicacion);
               echo "<a href='principal.php'>Volver</a>";
            } else {
               echo "<h2>Hubo un problema al ubicar la pieza</h2><br />";
               echo "<br />Descripción del error: " . $this->descErrorConsulta() . "<br />";
               echo "<br /><a href='principal.php'>Volver</a>";
            }
      } else {
          echo "<h2>Hubo un problema al retirar la pieza del almacén</h2><br />";
          echo "<br /><a href='principal.php'>Volver</a>";
      }
      echo "</div>";
   }

}
?>
</body>
</html>