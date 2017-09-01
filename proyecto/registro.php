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
   <title>Registro de usuario</title>
   <link rel="stylesheet" href="estilos.css">
</head>
<body>
   <div>
   <h2>Formulario de registro</h2>
   <form method="POST" action="seguridad.php">
      <label for="fname">Nombre</label>
      <input type="text" id="fname" name="nombre" placeholder="Nombre..">

      <label for="lname">Primer apellido</label>
      <input type="text" id="lname1" name="apellido1" placeholder="Primer apellido..">

      <label for="lname">Segundo apellido</label>
      <input type="text" id="lname1" name="apellido2" placeholder="Segundo apellido..">

      <label for="dni">DNI</label>
      <input type="text" id="dni" name="dni" placeholde="DNI..">

      <label for="direccion">Direccion</label>
      <input type="text" id="direccion" name="direccion" placeholder="Direccion..">

      <label for="telefono">Telefono</label>
      <input type="text" id="telefono" name="telefono" placeholder="Telefono..">

      <label for="email">Correo electrónico</label>
      <input type="text" id="email" name="email" placeholder="ejemplo@dominio.com">

      <label for="pass0">Contraseña</label>
      <input type="password" id="pass0" name="pass0" placeholder="Contraseña..">

      <label for="pass1">Repite Contraseña</label>
      <input type="password" id="pass1" name="pass1" placeholder="Contraseña..">
      
      <label for="admin">Administrador</label>
      <input type="checkbox" id="admin" name="admin" value="Admininistrador">

      <input type="hidden" name="accion" value="registro">

      <input type="submit" value="Registrar">
   </form>
   <a href='principal.php'>Volver</a>
   </div>
</body>
</html>