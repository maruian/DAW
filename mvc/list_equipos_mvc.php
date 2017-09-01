<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Listado de equipos con MVC</title>
   </head>
   <body>
      <?php
      //Aqui incluimos el fichero que controla los datos
      include "nba_db.php";
      
      //Creamos el controlador
      $nba=new Nba_db();

      $resultado = $nba->devolverEquipos();
      if($resultado!=null){
          //Comprobamos las filas que nos devuelve la consulta
          while($fila=$resultado->fetch_assoc()){
              echo "El equipo " . $fila['nombre'] . "<br />";
          }
      }
    ?>
    </body>
</html>
