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
</head>
<body>
    <div>
    <h2>Confirmar elimación de cliente</h2>
<?php
   include "cliente.php";
   $registro=$_POST['eliminar'];
   $cliente=new Cliente();
   $fila=$cliente->devolverCliente($registro);
   echo "<form method='POST' action='ejecutar_confirmar_eliminar_cliente.php'>";
   echo "<label for='idCliente'>Nº Cliente</label>";
   echo "<input type='text' value='" . $fila['idCliente'] . "' name='idCliente' readonly>";
   echo "<label for='nif'>NIF</label>";
   echo "<input type='text' value='" . $fila['nif'] . "' name='nif' readonly>";
   echo "<label for='nombre'>Nombre</label>";
   echo "<input type='text' value='" . $fila['nombre'] . "' name='nombre' readonly>";
   echo "<label for='apellido1'>Primer apellido</label>";
   echo "<input type='text' value='" . $fila['apellido1'] . "' name='apellido1' readonly>";
   echo "<label for='apellido2'>Nº Cliente</label>";
   echo "<input type='text' value='" . $fila['apellido2'] . "' name='apellido2' readonly>";
   echo "<label for='telefono'>Teléfono</label>";
   echo "<input type='text' value='" . $fila['telefono'] . "' name='telefono' readonly>";
   echo "<label for='direccion'>Dirección</label>";
   echo "<input type='text' value='" . $fila['direccion'] . "' name='direccion' readonly>";
   echo "<label for='email'>Correo electrónico</label>";
   echo "<input type='text' value='" . $fila['email'] . "' name='email' readonly>";
   echo "<input type='submit' name='confirmar' value='Borrar definitivamente'>";
   echo "</form>";
?>
<a href="eliminar_cliente.php">Volver</a>
</div>
</body>
</html>
