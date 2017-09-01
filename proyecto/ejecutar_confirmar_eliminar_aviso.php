<?php
   include "seguridad_sesion.php";
   $segsesion=new Seguridad_sesion();
   if ($segsesion->getOperario()==null){
      header('Location: login.php');
      exit;
   }
   include "aviso.php";
   $aviso=new Aviso();
   $aviso->borrarAviso($_POST['idAviso']);
   echo "<br /><br /><a href='principal.php'>Volver</a>";
?>