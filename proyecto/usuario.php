<?php
if (!class_exists('Db')){
include "db.php";
}

class Usuario extends Db {

   function Usuario(){
       parent::__construct();
   }

   function insertarUsuario($dni,$nombre,$apellido1,$apellido2,$direccion,$telefono,$email, $admin=false, $contra){
      //Construimos la consulta
      $consulta="INSERT INTO operario (idOperario, dni, nombre, apellido1, apellido2, direccion, telefono, email, admin, contra) VALUES (NULL, '$dni', '$nombre', '$apellido1', '$apellido2', '$direccion', '$telefono', '$email', '$admin', '" . sha1($contra) . "')";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($consulta);
      if($resultado!=null){
          //Recogemos el ultimo usuario insertado
          $consulta="SELECT * FROM operario ORDER BY idOperario DESC";
          $resultado=$this->realizarConsulta($consulta);
          if($resultado!=false){
             return $resultado->fetch_assoc();
          } else {
             return null;
          }
      } else {
          return null;
      }
  }

  function buscarUsuario($usuario){
     $consulta="SELECT * FROM operario WHERE dni='$usuario'";
     $resultado=$this->realizarConsulta($consulta);
     if ($resultado!=null){
         return $resultado->fetch_assoc();
     } else {
         return null;
     }
  }

  function devolverUsuarios(){
      $consulta="SELECT * FROM operario";
      $resultado=$this->realizarConsulta($consulta);
      $tabla=[];
      if ($resultado!=null){
         while($fila=$resultado->fetch_assoc()){
            $tabla[]=$fila;
         }
         return $tabla;
      } else {
          return null;
      }
  }

  function devolverOperariosNoAsignadosAviso($idAviso){
    $consulta="SELECT * FROM operario INNER JOIN operario_aviso ON operario.idOperario=operario_aviso.idOperario WHERE operario.idOperario NOT IN (SELECT idOperario FROM operario_aviso WHERE idAviso=$idAviso) GROUP BY operario.idOperario";
    $resultado=$this->realizarConsulta($consulta);
    $tabla=[];
    if ($resultado!=null){
       while($fila=$resultado->fetch_assoc()){
          $tabla[]=$fila;
       }
       return $tabla;
    } else {
        return null;
    }
}

function devolverOperariosAsignadosAviso($idAviso){
    $consulta="SELECT * FROM operario_aviso INNER JOIN operario ON operario_aviso.idOperario=operario.idOperario WHERE operario_aviso.idAviso=$idAviso";
    $resultado=$this->realizarConsulta($consulta);
    $tabla=[];
    if ($resultado!=null){
       while($fila=$resultado->fetch_assoc()){
          $tabla[]=$fila;
       }
       return $tabla;
    } else {
        return null;
    }
}

  function asignarOperarioAviso($idOperario, $idAviso){
      $consulta="INSERT INTO operario_aviso (idOperario, idAviso) VALUES ($idOperario, $idAviso)";
         if($this->realizarConsulta($consulta)){
               echo "<div>";
               echo "<h2>Operario " . $idOperario . " asignado correctamente al aviso $idAviso</h2><br />";
               echo "</div>";
               echo "<a href='principal.php'>Volver</a>";
            } else {
               echo "<h2>Hubo un problema al asignar al operario</h2><br />";
               echo "<h3>Comprueba que el operario no esté ya en este aviso.</h3>";
               echo "<br />Descripción del error: " . $this->descErrorConsulta() . "<br />";
               echo "<br /><a href='principal.php'>Volver</a>";
               echo "</div>";
            }
   }

   function eliminarOperarioAviso($idOperario,$idAviso){
       $consulta="DELETE FROM operario_aviso WHERE idOperario=$idOperario AND idAviso=$idAviso";
       if ($this->realizarConsulta($consulta)){
           echo "<div>";
           echo "<h2>Operario " . $idOperario . " eliminado del aviso $idAviso</h2><br />";
           echo "</div>";
           echo "<a href='principal.php'>Volver</a>";
       } else {
          echo "<h2>Hubo un problema al asignar al operario</h2><br />";
          echo "<br />Descripción del error: " . $this->descErrorConsulta() . "<br />";
          echo "<br /><a href='principal.php'>Volver</a>";
          echo "</div>"; 
       }
   }
}

