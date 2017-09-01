<?php
   include "seguridad_sesion.php";
   $segsesion=new Seguridad_sesion();
   if ($segsesion->getOperario()==null){
      header('Location: login.php');
      exit;
   }
   include "pieza.php";
   $pieza=new Pieza();
   $pieza->ubicarPiezaAviso($_POST['pieza'],$_POST['aviso']);
?>