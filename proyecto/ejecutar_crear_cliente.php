<?php

include "seguridad_sesion.php";
$segsesion=new Seguridad_sesion();
if ($segsesion->getOperario()==null){
    header('Location: login.php');
    exit;
}

include "cliente.php";

$nuevoCliente=new Cliente();
if ($_POST['pass0']==$_POST['pass1']){
   $regCliente=$nuevoCliente->crearCliente($_POST['nif'], $_POST['nombre'], $_POST['apellido1'], $_POST['apellido2'], $_POST['telefono'], $_POST['direccion'], $_POST['email'], $_POST['pass0']);
} else {
    echo "<h2>Las contraseñas deben coincidir</h2>";
    echo "<a href='principal.php'>Volver</a>";
}

?>