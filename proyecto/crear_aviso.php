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
   <title>Crear aviso</title>
   <link rel="stylesheet" href="estilos.css">
</head>
<body>
   <div>
   <h2>Crear aviso</h2>
   <form method="POST" action="ejecutar_crear_aviso.php">
      <label for="descripcion">Descripción del aviso</label>
      <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion..">
      <br />
      <br />
      <input type="hidden" name="accion" value="crear_aviso">
      <input type="submit" value="Crear aviso">
   </form>
   <br />
   <a href="principal.php">Volver</a>
   </div>
</body>
</html>
