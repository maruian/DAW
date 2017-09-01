<?php
include "seguridad_sesion.php";
$segsesion=new Seguridad_sesion();
if ($segsesion->getOperario()==null){
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Asigne un cliente a un aviso abierto</title>
   <link rel='stylesheet' href='estilos.css'>
</head>
<body>
   <?php
   include "aviso.php";
   include "cliente.php";

   $aviso=new Aviso();
   if($aviso->devolverAvisosAbiertos()!=null){
      $cliente=new Cliente();
      if ($cliente->devolverClientes()!=null){
         echo "<h2>Asignación de aviso a cliente</h2>";
         echo "<div>";
         echo "<h3>Selecciona el aviso:</h3>\n";
         echo "<form action='ejecutar_asignar_cliente_aviso.php' method='POST'>";
         echo "<select name='cliente'>";
         foreach ($cliente->devolverClientes() as $fila){
            echo "<option value='" . $fila['idCliente'] . "'>" . $fila['idCliente'] . " " . $fila['nombre'] . " " . $fila['apellido1'] . " " . $fila['apellido2'] . "</option>\n";
         }
         echo "</select>";
         echo "<br />";
         echo "<br />";
         echo "<h3>Selecciona un aviso abierto:</h3>\n";
         echo "<select name='aviso'>";
         foreach ($aviso->devolverAvisosAbiertos() as $fila){
            echo "<option value='" . $fila['idAviso'] . "'>" . $fila['idAviso'] . " " . $fila['descripcion'] . "</option>\n";
         }
         echo "</select>";
         echo "<br />";
         echo "<br />";
         echo "<input type='submit' name='submit'>";
         echo "</form>";
         echo "<br />";
         echo "<br />";
         echo "</div>";
         echo "<a href='principal.php'>Volver</a>";
      } else {
         echo "<div>";
         echo "<h3>No hay ningún cliente dado de alta.</h3>";
         echo "</div>";
         echo "<a href='principal.php'>Volver</a>";
      }
   } else {
       echo "<div>";
       echo "<h3>No hay ningún aviso en curso.</h3>";
       echo "</div>";
       echo "<a href='principal.php'>Volver</a>";
   }
   ?>
</body>
</html>