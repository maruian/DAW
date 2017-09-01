<!DOCTYPE html>
<html>
<head>
<title>Resultado configuración</title>
<meta charset="utf-8">
<style>
   table {
       border: 1px solid;
   }
   tr {
       text-align: center;
   }
</style>
</head>
<body>
<h1>El ordenador configurador es:</h1>
<hr>
<?php
   /*
    * Matias Ruiz
    * 1 DAM
   */
   include "calculador.php";
   $calculador=new Calculador();
   
   //si la variable enviar esta definida
   if (isset($_POST['enviar'])){
      
      //definimos las variables 
      $modulos=$_POST['modulos'];
      $discos=$_POST['discos'];
      $monitores=$_POST['monitores'];
      $combo=$_POST['combo'];
      
      //definimos los atributos del ordenador y calculamos su precio
      $calculador->setMemoria($modulos);
      $calculador->setDiscos($discos);
      $calculador->setMonitor($monitores);
      $calculador->setCombo($combo);
      $calculador->calcularPrecio();

      //Imprimimos la configuración del ordenador y los precios
      echo "<table>";
      echo "<tr>";
      echo "<th>Componentes</th><th>Precio unitario</th>";
      echo "</tr>";
      echo "<tr><td>Memoria: " . $calculador->getMemoria() . "</td>";
      echo "<td> " . $calculador->getPrecioMemoria() . "</td></tr>";
      echo "<tr><td>Discos duros: " . $calculador->getDiscos() . "</td>";
      echo "<td> " . $calculador->getPrecioDisco() . "</td><tr>";
      echo "<tr><td>Monitor: " . $calculador->getMonitor() . "</td>";
      echo "<td> " . $calculador->getPrecioMonitor() . "</td><tr>";
      echo "<tr><td>Teclado y raton: " . $calculador->getCombo() . "</td>";
      echo "<td> " . $calculador->getPrecioCombo() . "</td><tr>";
      echo "<tr><td><strong>Total:</strong></td><td><strong>" . $calculador->getPrecio() . "</strong></td></tr>";
      echo "</table>";  
   }
?>
<hr>
<a href="configurador.php">Volver a configurar ordenador</a>
</body>
</html>