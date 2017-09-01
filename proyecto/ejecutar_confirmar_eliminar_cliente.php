<?php
   include "seguridad_sesion.php";
   $segsesion=new Seguridad_sesion();
   if ($segsesion->getOperario()==null){
      header('Location: login.php');
      exit;
   }
   include "cliente.php";
   $cliente=new Cliente();
   $cliente->borrarCliente($_POST['idCliente']);
   echo "<a href='principal.php'>Volver</a>";
?>