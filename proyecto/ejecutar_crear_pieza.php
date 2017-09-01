<?php

include "seguridad_sesion.php";
$segsesion=new Seguridad_sesion();
if ($segsesion->getOperario()==null){
    header('Location: login.php');
    exit;
}

include "pieza.php";

$nuevaPieza=new Pieza();
$regPieza=$nuevaPieza->crearPieza(NULL, $_POST['descripcion'], $_POST['codigo'], $_POST['precio']);

?>