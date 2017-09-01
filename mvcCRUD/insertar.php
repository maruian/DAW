<!-- Matias Ruiz 1 DAM -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insertar Usuario</title>
</head>
<body>
<?php 
   //Incluimos la clase
   include "DbUsuarios.php";
   $usuario=new DbUsuarios();
   $usuario->insertarUsuarios($_POST['nombre'], $_POST['apellidos'], $_POST['edad']);
   
?>
</body>
</html>