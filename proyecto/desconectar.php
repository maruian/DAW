<?php
include "seguridad_sesion.php";
$segsesion=new Seguridad_sesion();
$segsesion->logOut();
header('Location: login.php');
?>