<!DOCTYPE html>
<html>
<head>
<title>Devolver pieza</title>
<meta charset="utf-8">
<link rel="stylesheet" href="estilos.css">
<body>
<div>
<?php
   include "seguridad_sesion.php";
   $segsesion=new Seguridad_sesion();
   if ($segsesion->getOperario()==null){
      header('Location: login.php');
      exit;
   }
   include "pieza.php";
   $pieza=new Pieza();
   
   $pieza->devolverPiezaAlmacen($_POST['idPieza'], $_POST['ubicacion']);
   $pieza->borrarPiezaAviso($_POST['idPieza'], $_POST['idAviso']);
?>
</div>
<a href="principal.php">Volver</a>
</body>
</html>