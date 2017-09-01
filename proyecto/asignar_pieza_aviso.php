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
   <title>Listado de piezas a ubicar</title>
   <link rel='stylesheet' href='estilos.css'>
</head>
<body>
   <?php
   include "almacen.php";
   include "aviso.php";
   $almacen=new Almacen();
   if($almacen->devolverPiezasAlmacen()!=null){
      $aviso=new Aviso();
      if ($aviso->devolverAvisosAbiertos()!=null){
         echo "<h2>Asignación de piezas</h2>";
         echo "<div>";
         echo "<h3>Selecciona la pieza:</h3>" . "\n";
         echo "<form action='ejecutar_asignar_pieza_aviso.php' method='POST'>";
         echo "<select name='ubicacion'>";
         foreach ($almacen->devolverPiezasAlmacen() as $fila){
            echo "<option value='" . $fila['ubicacion'] . "'>" . $fila['ubicacion'] . " " . $fila['codigo'] . " " . $fila['descripcion'] . " " . $fila['precio'] . "€</option>\n";
         }
         echo "</select>";
         echo "<br />";
         echo "<br />";
         echo "<h3>Selecciona el aviso:</h3>" . "\n";
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
       echo "<h3>No hay avisos en curso.</h3>";
       echo "</div>";
       echo "<a href='principal.php'>Volver</a>";
      }
   } else {
       echo "<div>";
       echo "<h3>No quedan piezas en el almacén</h3>";
       echo "</div>";
       echo "<a href='principal.php'>Volver</a>";
   }
   ?>
</body>
</html>