<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Piezas..</title>
   <link rel="stylesheet" href="estilos.css">
</head>
<body>
<?php
if (!class_exists('Db')) {
   include "db.php";
}

class Pieza extends Db {
   
   function __construct(){
      parent::__construct();
   }

   function crearPieza($idPieza, $descripcion, $codigo, $precio){
      $consulta="INSERT INTO pieza (idPieza, descripcion, codigo, precio) VALUES (NULL, '$descripcion', '$codigo', $precio)";
      $resultado=$this->realizarConsulta($consulta);
      if($resultado!=null){
          //Recogemos el ultimo aviso insertado
          $consulta="SELECT * FROM pieza ORDER BY idPieza DESC";
          $resultado=$this->realizarConsulta($consulta);
          if($resultado!=null){
             $pieza=$resultado->fetch_assoc();
             echo "<h2>Pieza creada correctamente</h2><br />";
             echo "<label>ID Pieza</label>";
             echo "<input type='text' value='" . $pieza["idPieza"] . "' readonly>";
             echo "<label>Descripcion</label>";
             echo "<input type='text' value='" . $pieza["descripcion"] . "' readonly>";
             echo "<label>Codigo / IUP</label>";
             echo "<input type='text' value='" . $pieza["codigo"] . "' readonly>";
             echo "<label>Precio</label>";
             echo "<input type='text' value='" . $pieza["precio"] . "' readonly>";
             echo "<a href='principal.php'>Volver</a>";
          } else {
            echo "<h2>Hubo un problema al crear la pieza</h2><br />";
            echo "<br />Descripción del error: " . $this->descErrorConsulta() . "<br />";
            echo "<br /><a href='principal.php'>Volver</a>";
          }
      } else {
          echo "<h2>Hubo un problema al crear la pieza</h2><br />";
          echo "<h3>Compruebe que la pieza existe</h3>";
          echo "<br />Descripción del error: " . $this->descErrorConsulta() . "<br />";
          echo "<br /><a href='principal.php'>Volver</a>";
      }
   }

   function devolverPiezas(){
      //Construimos la consulta
      $consulta="SELECT * FROM pieza";
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

   function devolverPiezasSinUbicacion(){
      //Construimos la consulta
      $consulta="SELECT * FROM pieza ";
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

   function devolverPiezaXid($idPieza){
      //Construimos la consulta
      if ($idPieza!=1){
         $consulta="SELECT * FROM pieza WHERE idPieza=$idPieza";
         //Realizamos la consulta
         $resultado=$this->realizarConsulta($consulta);
         if($resultado!=null){
            return $resultado->fetch_assoc();
         } else {
            return null;
         }
      } else {
          return null;
      }
   }

   function devolverPiezaXcodigo($codigo){
        $consulta="SELECT * FROM pieza WHERE codigo=$codigo";
        $resultado=$this->realizarConsulta($consulta);
        if($resultado!=null){
           return $resultado->fetch_assoc();
        } else {
           return null;
        }
   }
   

   function devolverPiezaXubicacion($ubicacion){
       $consulta="SELECT * FROM pieza INNER JOIN almacen ON pieza.idPieza = almacen.idPieza WHERE almacen.ubicacion='$ubicacion'";
       $resultado=$this->realizarConsulta($consulta);
       if($resultado!=null){
           return $resultado->fetch_assoc();
       } else {
           return null;
       }
   }

   function consultarUbicacion($idPieza){
       $consulta="SELECT ubicacion FROM almacen WHERE idPieza=$idPieza";
       $resultado=$this->realizarConsulta($consulta);
       if($resultado!=null) {
           $fila=$resultado->fetch_assoc();
           $ubicacion=$fila['ubicacion'];
           if ($ubicacion==null){
              $ubicacion='RECEPCION';
           }    
           return $ubicacion;
       } else {
           return null;
       }
   }

    function devolverPiezasXAviso($idAviso){
       $consulta="SELECT *, COUNT(pieza.idPieza) AS num_piezas FROM pieza INNER JOIN pieza_aviso ON pieza.idPieza=pieza_aviso.idPieza WHERE pieza_aviso.idAviso=$idAviso GROUP BY pieza.idPieza";
       $resultado=$this->realizarConsulta($consulta);
       if($resultado!=null){
           $tabla=[];
           while ($fila=$resultado->fetch_assoc()){
               $tabla[]=$fila;
           }
           return $tabla;
       } else {
           return null;
       }
    }

    function devolverPiezaAPiezaXAviso($idAviso){
        $consulta="SELECT * FROM pieza INNER JOIN pieza_aviso ON pieza.idPieza=pieza_aviso.idPieza WHERE pieza_aviso.idAviso=$idAviso";
        $resultado=$this->realizarConsulta($consulta);
        if($resultado!=null){
            $tabla=[];
            while ($fila=$resultado->fetch_assoc()){
                $tabla[]=$fila;
            }
            return $tabla;
        } else {
            return null;
        }
     }

   function altaPiezaAlmacen($idPieza, $ubicacion){
      $consulta="UPDATE almacen SET idPieza=$idPieza, modificacion=NOW() WHERE ubicacion='$ubicacion'";
      $resultado=$this->realizarConsulta($consulta);
      if($resultado!=null){
         $pieza=$this->devolverPiezaXid($idPieza);
         echo "<h2>Pieza ubicada correctamente</h2><br />";
         echo "<label>ID Pieza</label>";
         echo "<input type='text' value='" . $pieza["idPieza"] . "' readonly>";
         echo "<label>Descripcion</label>";
         echo "<input type='text' value='" . $pieza["descripcion"] . "' readonly>";
         echo "<label>Codigo / IUP</label>";
         echo "<input type='text' value='" . $pieza["codigo"] . "' readonly>";
         echo "<label>Precio</label>";
         echo "<input type='text' value='" . $pieza["precio"] . "' readonly>";
         echo "<label>Ubicacion</label>";
         echo "<input type='text' value='" . $ubicacion . "' readonly>";
         echo "<a href='principal.php'>Volver</a>";
      } else {
         echo "<h2>Hubo un problema al ubicar la pieza</h2><br />";
         echo "<br />Descripción del error: " . $this->descErrorConsulta() . "<br />";
         echo "<br /><a href='principal.php'>Volver</a>";
      }
    }

    function devolverPiezaAlmacen($idPieza, $ubicacion){
        $consulta="UPDATE almacen SET idPieza=$idPieza, modificacion=NOW() WHERE ubicacion='$ubicacion'";
        $resultado=$this->realizarConsulta($consulta);
        if($resultado!=null){
           echo "<h2>Pieza retirada correctamente</h2><br />";
        } else {
           echo "<h2>Hubo un problema al ubicar la pieza</h2><br />";
           echo "<br />Descripción del error: " . $this->descErrorConsulta() . "<br />";
        }
      }

      function borrarPiezaAviso($idPieza, $idAviso){
          $consulta="DELETE FROM pieza_aviso WHERE idPieza=$idPieza AND idAviso=$idAviso LIMIT 1";
          $resultado=$this->realizarConsulta($consulta);
          if($resultado!=NULL){
            echo "<h2>Pieza eliminada del aviso $idAviso correctamente</h2><br />";
         } else {
            echo "<h2>Hubo un problema al eliminar la pieza del aviso $idAviso</h2><br />";
         }
      }

}
?>
</body>
</html>