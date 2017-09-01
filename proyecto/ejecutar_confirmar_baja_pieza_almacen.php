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
<title>Eliminado pieza..</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<div>
<?php
   include "almacen.php";
   $almacen=new Almacen();

   if($almacen->bajaPiezaAlmacen($_POST['ubicacion'])){
      echo "<div>";
      echo "<h3>Pieza dada de baja del almacen correctamente</h3>";
      echo "</div>";
   } else {
      echo "<div>";
      echo "<h3>Hubo un problema al dar de baja la pieza del almacen</h3>";
      echo "</div>";
   }
   echo "<a href='principal.php'>Volver</a>";
?>
</div>
</body>
</html>