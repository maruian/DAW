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
   <link rel="stypesheel" href="estilos.css">
   <title>Asignando cliente a aviso</title>
</head>
<body>
<?php
   include "aviso.php";
   $aviso=new Aviso();
   if($aviso->asignarClienteAviso($_POST['cliente'],$_POST['aviso'])){
       echo "<div>";
       echo "<h3>El aviso " . $_POST['aviso'] . " ahora pertenece al cliente " . $_POST['cliente'] . "</h3>";       
       echo "</div>";
       echo "<a href='principal.php'>Volver</a>";
   } else {
       echo "<div>";
       echo "<h3>Hubo un problema con la asignacion del aviso " . $_POST['aviso'] . " al cliente " . $_POST['cliente'] . "</h3>";
       echo "</div>";
       echo "<a href='principal.php'>Volver</a>";
   }
?>
</body>
</html>