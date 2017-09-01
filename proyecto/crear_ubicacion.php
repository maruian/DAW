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
   <title>Crear ubicación</title>
   <link rel="stylesheet" href="estilos.css">
</head>
<body>
   <div>
   <h2>Crear ubicación en almacén</h2>
   <form method="POST" action="ejecutar_crear_ubicacion.php">
      <label for="ubicacion">Nombre ubicación</label>
      <input type="text" id="ubicacion" name="ubicacion" placeholder="Ubicación..">
      <br />
      <br />
      <input type="hidden" name="accion" value="crear_ubicacion">

      <input type="submit" value="Crear ubicación">

   </form>
   <br />
   <a href="principal.php">Volver</a>
   </div>
</body>
</html>