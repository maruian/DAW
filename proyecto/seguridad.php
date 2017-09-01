<?php
   include "usuario.php";
   include "seguridad_sesion.php";
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Fichero de control de seguridad</title>
      <link rel="stylesheet" href="estilos.css">
   </head>
   <body>
   <div>
   <?php
      
      //Control de las acciones a realizar
      if (isset($_POST["accion"])){
          $usuario=new Usuario();
          $segsesion=new Seguridad_sesion();
          //Registro de usuario
          if($_POST["accion"]=="registro"){
             if($_POST["pass0"]==$_POST["pass1"]){
                 if (isset($_POST["admin"])){
                     $admin = true;
                 } else {
                     $admin = false;
                 }
                 $usuarioReg=$usuario->insertarUsuario($_POST["dni"],$_POST["nombre"],$_POST["apellido1"],$_POST["apellido2"],$_POST["direccion"],$_POST["telefono"],$_POST["email"], $admin, $_POST["pass0"]);
                
                 if ($usuarioReg!=null){
                     if (($admin)==true){
                         $administrador="Si";
                     } else {
                         $administrador="No";
                     }
                     echo "<h2>Operario registrado correctamente</h2><br />";
                     echo "<label>DNI</label>";
                     echo "<input type='text' value='" . $usuarioReg["dni"] . "' readonly>";
                     echo "<label>Nombre</label>";
                     echo "<input type='text' value='" . $usuarioReg["nombre"] . "' readonly>";
                     echo "<label>Apellidos</label>";
                     echo "<input type='text' value='" . $usuarioReg["apellido1"] . " " . $usuarioReg["apellido2"] . "' readonly>";
                     echo "<label>Direccion</label>";
                     echo "<input type='text' value='" . $usuarioReg["direccion"] . "' readonly>";
                     echo "<label>Telefono</label>";
                     echo "<input type='text' value='" . $usuarioReg["telefono"] . "' readonly>";
                     echo "<label>Correo electrónico</label>";
                     echo "<input type='text' value='" . $usuarioReg["email"] . "' readonly>";
                     echo "<label>Administrador</label>";
                     echo "<input type='text' value='" . $administrador . "' readonly>";
                     echo "<br /><center><a href=login.php>Ir al login</a></center>";
                 } else {
                     echo "<h2>El usuario no se ha insertado correctamente. Revisa los datos</h2><br />";
                     echo "<a href=registro.php>Volver al formulario de registro</a>";
                 }
             } else {
                 //Contraseñas diferentes
                 echo "<h2>Las contraseñas no son iguales</h2><br />";
                 echo "<a href=registro.php>Volver al formulario de registro</a>";
             }
          } elseif ($_POST["accion"]=="login") {
              $usuarioReg=$usuario->buscarUsuario($_POST["operario"]);
              if($usuarioReg!=null){
                  if($usuarioReg["contra"]==sha1($_POST["pass0"])){
                      $segsesion->addOperario($usuarioReg["dni"]);
                      header('Location: principal.php');
                  } else {
                      echo "<h2>Usuario o contraseña invalido</h2>";
                      echo "<a href=login.php>Volver al formulario de login</a>";
                  }
              } else {
                  echo "<h2>Usuario o contraseña invalido</h2><br />";
                  echo "<a href=login.php>Volver al formulario de login</a>";
              }
          } 
      }
?>
    </div>
    </body>
</html>