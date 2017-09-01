<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Listado de equipos</title>
   </head>
   <body>
      <?php
      //Incluimos el fichero de control de datos
      include "nba_db.php";

      //Creamos el controlador;
      $nba = new Nba_db();

      //Hacemos las peticiones que deseamos al controlador
      $resultado = $nba->devolverEquiposConferencia();
      if ($resultado!=null){
          while($fila=$resultado->fetch_assoc()){
              echo "El equipo " . $fila['nombre'] . " es de la conferencia " . $fila['conferencia'] . "<br />";
          }
      }
      
    ?>
    </body>
</html>
