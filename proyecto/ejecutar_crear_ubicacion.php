<?php

include "seguridad_sesion.php";
$segsesion=new Seguridad_sesion();
if ($segsesion->getOperario()==null){
    header('Location: login.php');
    exit;
}

include "almacen.php";

$ubicacion=new Almacen();
$regUbicacion=$ubicacion->crearUbicacion($_POST['ubicacion']);

?>