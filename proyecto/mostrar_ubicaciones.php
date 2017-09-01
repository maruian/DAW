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
   <title>Listado de avisos</title>
   <link rel='stylesheet' href='estilos.css'>
</head>
<body>
   <?php
   include "ubicacion.php";
   $ubicacion=new Ubicacion();
   echo "<h2>Listado de todasa las ubicaciones</h2>" . "\n";
   echo "<table>" . "\n";
   echo "<tr>" . "\n";
   echo "<th>Ubicación</th>" . "\n";
   echo "</tr>\n";
   foreach ($ubicacion->devolverUbicaciones() as $fila){
       echo "<tr>\n";
       echo "<td>" . $fila['ubicacion'] . "</td>\n";
       echo "</tr>\n";
   }
   echo "</table>\n";
   ?>
<a href="principal.php">Volver</a>
</body>
</html>
