<?php

include "seguridad_sesion.php";
$segsesion=new Seguridad_sesion();
if ($segsesion->getOperario()==null){
    header('Location: login.php');
    exit;
}

include "aviso.php";

$nuevoAviso=new Aviso();
$regAviso=$nuevoAviso->crearAviso($_POST['descripcion']);

?>