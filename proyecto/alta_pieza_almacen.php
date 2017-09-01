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
   <title>Alta piezas en almacen</title>
   <link rel='stylesheet' href='estilos.css'>
</head>
<body>
   <?php
   include "pieza.php";
   include "almacen.php";

   $pieza=new Pieza();
   $ubicaciones=new Almacen();

   if ($pieza->devolverPiezas()==null){
         echo "<div>";
         echo "<h3>No tienes piezas en el sistema. Crea primero alguna pieza.</h3>" . "\n";
         echo "</div>";
         echo "<a href='principal.php'>Volver</a>";
   } elseif ($ubicaciones->devolverUbicacionesLibres()==null) {
         echo "<div>";
         echo "<h3>No tienes ubicaciones libres. Libera alguna ubicación o crea alguna nueva.</h3>";
         echo "</div>";
         echo "<a href='principal.php'>Volver</a>";
   } else {
      echo "<div>";
      echo "<h3>Selecciona la pieza:</h2>" . "\n";
      echo "<form action='ejecutar_alta_pieza_almacen.php' method='POST'>";
      echo "<select name='pieza'>";
      foreach ($pieza->devolverPiezas() as $fila){
         echo "<option value='" . $fila['idPieza'] . "'>" . $fila['codigo'] . " " . $fila['descripcion'] . "</option>\n";
      }
      echo "</select>";
      echo "<br />";
      echo "<br />";
      echo "<h3>Selecciona ubicación:</h2>" . "\n";
      echo "<select name='ubicacion'>";
      foreach ($ubicaciones->devolverUbicacionesLibres() as $fila){
         echo "<option value='" . $fila['ubicacion'] . "'>" . $fila['ubicacion'] . "</option>\n";
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
   }
   ?>
</body>
</html>