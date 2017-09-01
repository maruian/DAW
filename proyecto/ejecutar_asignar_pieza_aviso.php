<?php
   include "seguridad_sesion.php";
   $segsesion=new Seguridad_sesion();
   if ($segsesion->getOperario()==null){
      header('Location: login.php');
      exit;
   }
   include "almacen.php";
   $almacen=new Almacen();
   $almacen->ubicarPiezaAviso($_POST['ubicacion'],$_POST['aviso']);
?>