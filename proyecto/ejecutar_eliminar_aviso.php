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
    <title>Confirmar eliminacion</title>
    <meta charset="utf-8">
    <link rel='stylesheet' href='estilos.css'>
</head>
<body>
    <div>
    <h2>Confirmar elimación de aviso</h2>
<?php
   include "aviso.php";
   $registro=$_POST['eliminar'];
   $aviso=new Aviso();
   $fila=$aviso->devolverAviso($registro);
   echo "<form method='POST' action='ejecutar_confirmar_eliminar_aviso.php'>";
   echo "<label for='idAviso'>Nº Aviso</label>";
   echo "<input type='text' value='" . $fila['idAviso'] . "' name='idAviso' readonly>";
   echo "<label for='descripcion'>Descripción</label>";
   echo "<input type='text' value='" . $fila['descripcion'] . "' name='descripcion' readonly>";
   echo "<label for='fechaApertura'>Fecha de apertura</label>";
   echo "<input type='text' value='" . $fila['fechaApertura'] . "' name='fechaApertura' readonly>";
   echo "<label for='horaApertura'>Hora de apertura</label>";
   echo "<input type='text' value='" . $fila['horaApertura'] . "' name='horaApertura' readonly>";
   if ($fila['fechaInicio']==0){
      echo "<label for='fechaInicio'>Fecha de inicio</label>";
      echo "<input type='text' value='EN CURSO' name='fechaInicio' readonly>";
      echo "<label for='horaInicio'>Hora de inicio</label>";
      echo "<input type='text' value='EN CURSO' name='horaInicio' readonly>";
      echo "<label for='fechaFin'>Fecha de finalización</label>";
      echo "<input type='text' value='EN CURSO' name='fechaFin' readonly>";
      echo "<label for='horaFin'>Hora de finalización</label>";
      echo "<input type='text' value='EN CURSO' name='horaFin' readonly>";
   } else {
      echo "<label for='fechaInicio'>Fecha de inicio</label>";
      echo "<input type='text' value='" . $fila['fechaInicio'] . "' name='fechaInicio' readonly>";      
      echo "<label for='horaInicio'>Hora de inicio</label>";
      echo "<input type='text' value='" . $fila['horaInicio'] . "' name='horaInicio' readonly>";
      echo "<label for='fechaFin'>Fecha de finalización</label>";
      echo "<input type='text' value='" . $fila['fechaFin'] . "' name='fechaFin' readonly>";
      echo "<label for='horaFin'>Hora de finalización</label>";
      echo "<input type='text' value='" . $fila['horaFin'] . "' name='horaFin' readonly>";
   }
   echo "<input type='submit' name='confirmar' value='Borrar definitivamente'>";
   echo "</form>";
?>
<br />
<a href="eliminar_aviso.php">Volver</a>
</div>
</body>
</html>