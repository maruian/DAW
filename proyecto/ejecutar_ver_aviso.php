<?php
include "seguridad_sesion.php";
$segsesion=new Seguridad_sesion();
if ($segsesion->getOperario()==null){
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="estilos.css">
   <title>Detalle aviso</title>
</head>
<body>
<?php
   include "aviso.php";
   include "pieza.php";
   $aviso=new Aviso();
   $pieza=new Pieza();
   $cliente=$aviso->devolverClienteXaviso($_POST['idAviso']);
   $detalleAviso=$aviso->devolverAviso($_POST['idAviso']);
   if (($detalleAviso['fechaFin']==NULL)||($detalleAviso['fechaFin']==0)){
       $trabajoTerminado=false;
   } else {
       $trabajoTerminado=true;
   }
   $operarios=$aviso->devolverOperariosXAviso($_POST['idAviso']);
   $piezas=$pieza->devolverPiezasXAviso($_POST['idAviso']);
   echo "<form method='POST' action='accion_aviso.php'>";
   echo "<input type='hidden' name='idAviso' value='" . $detalleAviso['idAviso'] . "'>";
   echo "<div>";
   echo "<h2>Detalle aviso</h2>";
   echo "<table>";
   echo "<td><strong>Cliente Nº " . $cliente['idCliente'] . "<br />Nombre: " . $cliente['nombre'] . "</strong></td>";
   echo "<td><strong>Aviso Nº . " .$detalleAviso['idAviso'] . "<br />Fecha:" . $detalleAviso['fechaApertura'] . "</strong></td>";
   echo "</tr>";
   echo "<tr>";
   echo "<td colspan='2'>Descripción del aviso: " . $detalleAviso['descripcion'] . "</td>";
   echo "</tr>";
   echo "<tr>";
   echo "<td colspan='2'>";
   echo "Operarios: <br />";
   foreach ($operarios as $operario){
     echo "ID: " . $operario['idOperario'] . " " . $operario['nombre'] . " " . $operario['apellido1'] . "<br/>";
   }
   if (!$trabajoTerminado){
      echo "<input type='submit' name='anadir_operario' value='Añadir operario'><br />";
      echo "<input type='submit' name='quitar_operario' value='Quitar operario'><br />";
   }
   echo "</td>";
   echo "</tr>";
   echo "<td colspan='2'>";
   echo "Piezas:<br />\n";
   foreach ($piezas as $detallePieza){
       echo "ID: " . $detallePieza['idPieza'] . " DESCRIPCION: " . $detallePieza['descripcion'] . " CODIGO: " . $detallePieza['codigo'] . " CANTIDAD: " . $detallePieza['num_piezas'] . "<br />";
   }
   if (!$trabajoTerminado){
      echo "<input type='submit' name='anadir_pieza' value='Añadir pieza'><br />";
      echo "<input type='submit' name='quitar_pieza' value='Quitar pieza'><br />";
   }
   echo "</td>";
   echo "</tr>";
   echo "<tr>";
   echo "<td colspan='2'>Tiempos</td>";
   echo "</tr>";
   echo "<tr>";
   if ($detalleAviso['fechaFin']==0){
      echo "<td>Fecha Inicio: " . $detalleAviso['fechaInicio'] . " <br />Fecha Fin:</td>";
      echo "<td>Hora inicio:" . $detalleAviso['horaInicio'] . "<br />Hora fin: " . $detalleAviso['horaFin'] . "</td>";
        
   } else { 
      echo "<td>Fecha Inicio: " . $detalleAviso['fechaInicio'] . " <br />Fecha Fin: " . $detalleAviso['fechaFin'] . "</td>";
      echo "<td>Hora inicio:" . $detalleAviso['horaInicio'] . "<br />Hora fin: " . $detalleAviso['horaFin'] . "</td>";
   }
   echo "</table>";
   echo "<input type='hidden' name='idAviso' value='" . $detalleAviso['idAviso']  . "'>";  
   if (!$trabajoTerminado){
     if (($detalleAviso['fechaInicio']==NULL)||($detalleAviso['fechaInicio'])==0){
        echo "<input type='submit' name='empezar_trabajo' value='Empezar trabajo'><br />";
      } else {
        echo "<input type='submit' name='terminar_trabajo' value='Terminar trabajo'><br />";
      }
   } else {
       echo "<strong>Trabajo terminado</strong><br />";
       echo "<input type='submit' name='facturar_trabajo' value='Facturar'><br />";
   }
   echo "</form>";

   echo "</div>";
   echo "<a href='ver_aviso.php'>Volver</a>";
?>
</body>
</html> 