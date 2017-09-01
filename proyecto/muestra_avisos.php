<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Mostramos avisos</title>
   </head>
   <body>
      <?php
      include "avisos.php";

      //Nuevo objeto de avisos
      $avisos=new Avisos();

      //Presentamos la tabla de avisos
      ?>
      
         <?php
            $tabla=$avisos->devolverAvisos();
            if ($tabla!=null) {
         ?>
            <table>
            <tr>
               <td>ID </td>
               <td>Fecha Inicio</td>
               <td>Fecha Fin</td>
               <td>Hora Inicio</td>
               <td>Hora Fin</td>
               <td>Descripcion</td>
            </tr>
         <?php
               foreach ($tabla as $fila){
         ?>
               <tr>
                  <td><?=$fila["idAviso"]?></a></td>
                  <td><?=$fila["fechaInicio"]?></td>
                  <td><?=$fila["fechaFin"]?></td>
                  <td><?=$fila["horaInicio"]?></td>
                  <td><?=$fila["horaFin"]?></td>
                  <td><?=$fila["descripcion"]?></td>
               </tr>
          <?php
            }
            } else {
               echo "No se han generado avisos";
           }
         ?>
      </table>
      