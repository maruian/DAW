<!-- Matias Ruiz 1 DAM -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Listado de equipos por conferencia</title>
</head>
<body>
<?php
   include "DbNBA.php";
   //Creamos el objeto de conexion
   $nba=new DbNBA();
   if (isset($_POST["conferencia"])){
      $conferencia=$_POST["conferencia"];
      $resultado=$nba->devolverEquiposConf($conferencia);
      echo "<table>";
      echo "<tr>";
      echo "<th>Nombre</th>";
      echo "<th>Conferencia</th>";
      echo "</tr>";
      while ($fila=$resultado->fetch_assoc()){
         echo "<tr>";
         echo "<td>" . $fila['nombre'] . "</td>";
         echo "<td>" . $fila['conferencia'] ."</td>";
         echo "</tr>";
      }
   }
   
?>
</table>
<br />
<a href="index.php">Volver</a>
</body>
</html>