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
   <title>Asigne un operario a un aviso abierto</title>
   <link rel='stylesheet' href='estilos.css'>
</head>
<body>
   <?php
   include "aviso.php";
   include "usuario.php";

   $aviso=new Aviso();
   if($aviso->devolverAvisosAbiertos()!=null){
      $usuario=new Usuario();
      echo "<h2>Asignación de operario</h2>";
      echo "<div>";
      echo "<h3>Selecciona el aviso:</h3>" . "\n";
      echo "<form action='ejecutar_asignar_operario_aviso.php' method='POST'>";
      echo "<select name='operario'>";
      foreach ($usuario->devolverUsuarios() as $fila){
         echo "<option value='" . $fila['idOperario'] . "'>" . $fila['idOperario'] . " " . $fila['nombre'] . " " . $fila['apellido1'] . "</option>\n";
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
       echo "<h3>No hay ningún aviso en curso.</h3>";
       echo "</div>";
       echo "<a href='principal.php'>Volver</a>";
   }
   ?>
</body>
</html>