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
   <title>Crear pieza</title>
   <link rel="stylesheet" href="estilos.css">
</head>
<body>
   <div>
   <h2>Crear pieza</h2>
   <form method="POST" action="ejecutar_crear_pieza.php">
      <label for="descripcion">Descripción de la pieza</label>
      <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion..">
      <br />
      <br />

      <label for="codigo">Código</label>
      <input type="text" id="codigo" name="codigo" placeholder="Código..">
      <br />
      <br />

      <label for="precio">Precio</label>
      <input type="text" id="precio" name="precio" placeholder="Precio..">
      <br />
      <br />

      <input type="hidden" name="accion" value="crear_pieza">

      <input type="submit" value="Crear pieza">

   </form>
   <br />
   <a href="principal.php">Volver</a>
   </div>
</body>
</html>
