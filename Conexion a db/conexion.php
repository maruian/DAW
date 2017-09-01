<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Conexion a jugadores</title>
   </head>
   <body>
      <?php
      
      //Creamos el objeto de conexion
      @$mysqli=new mysqli("localhost", "root", "", "equipobaloncesto");
      
      //Comprobamos que se realiza la conexion adecuadamente
      if ($mysqli->connect_errno) {
          echo "Fallo al conectar a MySQL. Error número: "  . $mysqli->connect_errno . "<br />";
          echo "Descripción del error: <br />" . $mysqli->connect_error;
      } else {
          echo "Conexion establecida";
          echo "<br />";
          echo "<hr>";
          
          // Como en este punto todo es correcto ya podemos
          // lanzar consultas a la base de datos
          $resultado = $mysqli->query("SELECT * FROM jugadores");

          //$resultado es un objeto del tipo resultset
          //del que podemos obtener el numero de filas
          //a traves de su propiedad num_rows
          echo "El número de jugadores es: " . $resultado->num_rows . "<br />";

          //Para recorrer el resulset podemos utilizar 
          //for conjuntamente a la funcion fetch_assoc
          for ($i=0;$i<$resultado->num_rows;$i++){
              $fila=$resultado->fetch_assoc();
              echo "El jugador " . $fila['id'] . " se llama: " . $fila['nombre'] . "<br />";
          }

      }


      ?>
   </body>
</html>