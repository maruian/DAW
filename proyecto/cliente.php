<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Clientes..</title>
   <link rel="stylesheet" href="estilos.css">
</head>
<body>
<?php
if (!class_exists('Db')){
    include "db.php";
}

class Cliente extends Db {
   
   function __construct(){
      parent::__construct();
   }

   function crearCliente($nif, $nombre, $apellido1, $apellido2, $telefono, $direccion, $email, $contra){
      $consulta="INSERT INTO cliente (idCliente, nif, nombre, apellido1, apellido2, telefono, direccion, email, contra) VALUES (NULL, '$nif', '$nombre', '$apellido1', '$apellido2', '$telefono', '$direccion', '$email', '" . sha1($contra) . "')";
      $resultado=$this->realizarConsulta($consulta);
      if($resultado!=null){
          //Recogemos el ultimo aviso insertado
          $consulta="SELECT * FROM cliente ORDER BY idCliente DESC";
          $resultado=$this->realizarConsulta($consulta);
          if($resultado!=null){
             $cliente=$resultado->fetch_assoc();
             echo "<h2>Cliente creado correctamente</h2><br />";
             echo "<label>ID Cliente</label>";
             echo "<input type='text' value='" . $cliente["idCliente"] . "' readonly>";
             echo "<label>NIF</label>";
             echo "<input type='text' value='" . $cliente["nif"] . "' readonly>";
             echo "<label>Nombre cliente / empresa</label>";
             echo "<input type='text' value='" . $cliente["nombre"] . "' readonly>";
             echo "<label>Primer apellido</label>";
             echo "<input type='text' value='" . $cliente["apellido1"] . "' readonly>";
             echo "<label>Segundo apellido</label>";
             echo "<input type='text' value='" . $cliente["apellido2"] . "' readonly>";
             echo "<label>Telefono</label>";
             echo "<input type='text' value='" . $cliente["telefono"] . "' readonly>";
             echo "<label>Direccion</label>";
             echo "<input type='text' value='" . $cliente["direccion"] . "' readonly>";
             echo "<label>Correo electrónico</label>";
             echo "<input type='text' value='" . $cliente["email"] . "' readonly>";
             echo "<a href='principal.php'>Volver</a>";
          } else {
            echo "<h2>Hubo un problema al crear el cliente</h2><br />";
            echo "<br />Descripción del error: " . $this->descErrorConsulta() . "<br />";
            echo "<br /><a href='principal.php'>Volver</a>";
          }
      } else {
          echo "<h2>Hubo un problema al crear el cliente</h2><br />";
          echo "<br />Descripción del error: " . $this->descErrorConsulta() . "<br />";
          echo "<br /><a href='principal.php'>Volver</a>";
      }
   }

   function devolverClientes(){
      //Construimos la consulta
      $consulta="SELECT * FROM cliente";
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

   function devolverCliente($idCliente){
      //Construimos la consulta
      $consulta="SELECT * FROM cliente WHERE idCliente=$idCliente";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($consulta);
      if($resultado!=null){
         return $resultado->fetch_assoc();
      } else {
         return null;
      }
   }

   function borrarCliente($idCliente){
       $consulta="DELETE FROM cliente WHERE idCliente=$idCliente";
       $resultado=$this->realizarConsulta($consulta);
       if($resultado!=null){
           echo "<h2>Cliente " . $idCliente . " eliminado</h2>";
       } else {
           echo "<h2>Hubo un problema con la eliminación del cliente</h2>";
       }
   }

}
?>
</body>
</html>