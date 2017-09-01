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
   <title>Listado de clientes</title>
   <link rel='stylesheet' href='estilos.css'>
</head>
<body>
   <?php
   include "almacen.php";
   $piezas=new Almacen();
   echo "<div>";
   echo "<h2>Listado de piezas en el almacen</h2>" . "\n";
   echo "<h3>Seleccione la pieza que desea dar de baja en el almacén</h3>" . "\n";
   echo "<table>" . "\n";
   echo "<tr>" . "\n";
   echo "<th>ID Pieza</th>" . "\n";
   echo "<th>Descripción</th>" . "\n";
   echo "<th>Código</th>" . "\n";
   echo "<th>Precio</th>" . "\n";
   echo "<th>Ubicación</th>" . "\n";
   echo "</tr>\n";
   echo "<form action='ejecutar_baja_pieza_almacen.php' method='POST'>";
   foreach ($piezas->devolverPiezasAlmacen() as $fila){
       echo "<tr>\n";
       echo "<td>" . $fila['idPieza'] . "</td>\n";
       echo "<td>" . $fila['descripcion'] . "</td>\n";
       echo "<td>" . $fila['codigo'] . "</td>\n";
       echo "<td>" . $fila['precio'] . "</td>\n";
       echo "<td><input type='submit' value='" . $fila['ubicacion'] . "' name='ubicacion'></td>\n";
       echo "</tr>\n";
   }
   echo "</table>\n";
   echo "</form>";
   echo "</div>";
   ?>
<a href="principal.php">Volver</a>
</body>
</html>