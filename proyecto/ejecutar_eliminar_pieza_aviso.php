<?php
   include "seguridad_sesion.php";
   $segsesion=new Seguridad_sesion();
   if ($segsesion->getOperario()==null){
      header('Location: login.php');
      exit;
   }
   include "almacen.php";
   $almacen=new Almacen();
   if ($almacen->devolverUbicacionesLibres()!=NULL){
       echo "<div>";
       echo "<h2>Debes devolver la pieza a una ubicación libre del almacén:</h2>";
       echo "<form method='POST' action='ejecutar_devolver_pieza_almacen.php'>";
       echo "<select name='ubicacion'>";
       foreach ($almacen->devolverUbicacionesLibres() as $fila){
          echo "<option value='" . $fila['ubicacion'] ."'>" . $fila['ubicacion'];
       }
       echo "</select>";
       echo "<input type='hidden' name='idPieza' value='" . $_POST['pieza'] . "'>";
       echo "<input type='hidden' name='idAviso' value='" . $_POST['aviso'] . "'>";
       echo "<input type='submit' name='submit' value='Devolver al almacen'>";
       echo "</form>";
       echo "<a href='principal.php'>Volver</a>";
       echo "</div>";
    } else {
        echo "<div>";
        echo "<h3>No puedes devolver la pieza al almacén</h3>";
        echo "<h3>No quedan ubicaciones libres";
        echo "</div>";
        echo "<a href='principal.php'>Volver</a>";
    }

?>