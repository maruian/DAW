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
   include "aviso.php";
   $avisos=new Aviso();
   echo "<div>";
   echo "<h2>Listado de todos los avisos</h2>" . "\n";
   echo "<h3>Seleccion el nº de aviso a eliminar</h3>" . "\n";
   echo "<table>" . "\n";
   echo "<tr>" . "\n";
   echo "<th>Nº Aviso</th>\n";
   echo "<th>Fecha de apertura</th>\n";
   echo "<th>Hora de apertura</th>\n";
   echo "<th>Fecha de inicio</th>\n";
   echo "<th>Hora de inicio</th>\n";
   echo "<th>Fecha de finalización</th>\n";
   echo "<th>Hora de finalización</th>\n";
   echo "<th>Descripción</th>\n";
   echo "<th>Estado</th>\n";
   echo "</tr>\n";
   echo "<form action='ejecutar_eliminar_aviso.php' method='POST'>";
   foreach ($avisos->devolverAvisos() as $fila){
       if ($fila['fechaFin']==0){
           $estado='ABIERTO';
       } else {
           $estado='CERRADO';
       }
       echo "<tr>\n";
       echo "<td><input type='submit' value='" . $fila['idAviso'] . "' name='eliminar'></td>\n";
       echo "<td>" . $fila['fechaApertura'] . "</td>\n";
       echo "<td>" . $fila['horaApertura'] . "</td>\n";

       if (($estado=='ABIERTO')&&($fechaInicio=0)){
          echo "<td>-</td>\n";
          echo "<td>-</td>\n";
       } else {
          echo "<td>" . $fila['fechaInicio'] . "</td>\n";
          echo "<td>" . $fila['horaInicio'] . "</td>\n";
       }   
       
       if ($estado=='ABIERTO'){
          echo "<td>-</td>\n";
          echo "<td>-</td>\n";
       } else {         
          echo "<td>" . $fila['fechaFin'] . "</td>\n";
          echo "<td>" . $fila['horaFin'] . "</td>\n";
       }       
       echo "<td>" . $fila['descripcion'] . "</td>\n";
       echo "<td>" . $estado . "</td>\n";
       echo "</tr>\n";
   }
   echo "</table>\n";
   echo "</form>";
   echo "</div>";
   ?>
<a href="principal.php">Volver</a>
</body>
</html>