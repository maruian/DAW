<?php
   include "seguridad_sesion.php";
   $segsesion=new Seguridad_sesion();
   if ($segsesion->getOperario()==null){
      header('Location: login.php');
      exit;
   }
   include "usuario.php";
   $operario=new Usuario();
   $operario->eliminarOperarioAviso($_POST['operario'],$_POST['aviso']);
?>