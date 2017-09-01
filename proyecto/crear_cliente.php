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
   <title>Crear cliente</title>
   <link rel="stylesheet" href="estilos.css">
</head>
<body>
   <div>
   <h2>Crear cliente</h2>
   <form method="POST" action="ejecutar_crear_cliente.php">
      <label for="NIF">NIF</label>
      <input type="text" id="nif" name="nif" placeholder="NIF..">
      <br />
      <br />

      <label for="nombre">Nombre cliente / Empresa</label>
      <input type="text" id="nombre" name="nombre" placeholder="Nombre..">
      <br />
      <br />

      <label for="apellido1">Primer apellido</label>
      <input type="text" id="apellido1" name="apellido1" placeholder="Primer apellido..">
      <br />
      <br />

      <label for="apellido2">Segundo apellido</label>
      <input type="text" id="apellido2" name="apellido2" placeholder="Segundo apellido..">
      <br />
      <br />

      <label for="telefono">Telefono</label>
      <input type="text" id="telefono" name="telefono" placeholder="Telefono..">
      <br />
      <br />

      <label for="direccion">Direccion</label>
      <input type="text" id="direccion" name="direccion" placeholder="Direccion..">
      <br />
      <br />

      <label for="email">Correo electrónico</label>
      <input type="text" id="email" name="email" placeholder="Correo electrónico..">
      <br />
      <br />

      <label for="pass0">Contraseña</label>
      <input type="password" id="pass0" name="pass0" placeholder="Escribe la contraseña..">
      <br />
      <br />

      <label for="pass1">Repite la contraseña</label>
      <input type="password" id="pass1" name="pass1" placeholder="Escribe otra vez la contraseña..">
      <br />
      <br />

      <input type="hidden" name="accion" value="crear_cliente">

      <input type="submit" value="Crear cliente">

   </form>
   <br />
   <a href="principal.php">Volver</a>
   </div>
</body>
</html>
