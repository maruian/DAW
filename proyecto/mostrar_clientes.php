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
   <title>Listado de clientes</title>
   <link rel='stylesheet' href='estilos.css'>
</head>
<body>
   <?php
   include "cliente.php";
   $clientes=new Cliente();
   echo "<h2>Listado de todos los clientes</h2>" . "\n";
   echo "<table>" . "\n";
   echo "<tr>" . "\n";
   echo "<th>Nº Cliente</th>" . "\n";
   echo "<th>NIF</th>" . "\n";
   echo "<th>Nombre</th>" . "\n";
   echo "<th>Primer apellido</th>" . "\n";
   echo "<th>Segundo apellido</th>" . "\n";
   echo "<th>Teléfono</th>" . "\n";
   echo "<th>Dirección</th>" . "\n";
   echo "<th>Correo electrónico</th>" . "\n";
   echo "</tr>\n";
   foreach ($clientes->devolverClientes() as $fila){
       echo "<tr>\n";
       echo "<td>" . $fila['idCliente'] . "</td>\n";
       echo "<td>" . $fila['nif'] . "</td>\n";
       echo "<td>" . $fila['nombre'] . "</td>\n";
       echo "<td>" . $fila['apellido1'] . "</td>\n";
       echo "<td>" . $fila['apellido2'] . "</td>\n";
       echo "<td>" . $fila['telefono'] . "</td>\n";
       echo "<td>" . $fila['direccion'] . "</td>\n";
       echo "<td>" . $fila['email'] . "</td>\n";
       echo "</tr>\n";
   }
   echo "</table>\n";
   ?>
<a href="principal.php">Volver</a>
</body>
</html>

