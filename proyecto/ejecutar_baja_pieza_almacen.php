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
   <title>Ubicaciones..</title>
   <link rel="stylesheet" href="estilos.css">
</head>
<body>
   <div>
   <h2>Confirmar baja de pieza en almacén</h2>
<?php
   include "almacen.php";
   $almacen=new Almacen();
   $fila=$almacen->devolverPiezaAlmacenXUbicacion($_POST['ubicacion']);
   echo "<form method='POST' action='ejecutar_confirmar_baja_pieza_almacen.php'>";
   echo "<br />";
   echo "<label for='idPieza'>ID Pieza</label>";
   echo "<input type='text' value='" . $fila['idPieza'] . "' name='idPieza' readonly>";
   echo "<label for='descripción'>Descripción</label>";
   echo "<input type='text' value='" . $fila['descripcion'] . "' name='descripcion' readonly>";
   echo "<label for='codigo'>Código</label>";
   echo "<input type='text' value='" . $fila['codigo'] . "' name='codigo' readonly>";
   echo "<label for='precio'>Precio</label>";
   echo "<input type='text' value='" . $fila['precio'] . "' name='precio' readonly>";
   echo "<label for='ubicacion'>Ubicación</label>";
   echo "<input type='text' value='" . $fila['ubicacion'] . "' name='ubicacion' readonly>";
   echo "<label for='telefono'>Ultima modificación</label>";
   echo "<input type='text' value='" . $fila['modificacion'] . "' name='modificacion' readonly>";
   echo "<input type='submit' name='confirmar' value='Dar de baja'>";
   echo "</form>";
?>
   </div>
   <a href="principal.php">Volver</a>
</body>
</html>