<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Listado de equipos</title>
   </head>
   <body>
      <?php
      //Creamos el objeto de la conexion
      @$conexion = new mysqli("localhost", "root", "", "nba");
      if ($conexion->connect_errno){
          //Si ha habido un error en la creacion del objeto $conexion lo notificaremos al usuario 
          echo "Se ha producido un error al conectar a la base de datos: <br />";
          echo "Número de error: " . $conexio->connect_errno . "<br />";
          echo "Descripción del error: <br />";
          echo $conexion->connect_error;
      } else {
          //Si todo va bien 
          echo "Conexion realizada <br />";

          //Lanzamos las consultas
          $resultado = $conexion->query("SELECT nombre,conferencia FROM equipos");

          //Comprobamos las filas que nos devuelve la consulta
          while($fila=$resultado->fetch_assoc()){
              echo "El equipo es " . $fila['nombre'] . " de la conferencia " . $fila['conferencia'] . "<br />";
          }
      }
    ?>
    </body>
</html>
