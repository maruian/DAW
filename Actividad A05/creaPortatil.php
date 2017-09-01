<!-- Matias Ruiz 1 DAM -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Creando ordenadores...</title>
</head>
<body>
<?php
// Creamos un nuevo portátil
include "Portatil.php";
$portatil = new Portatil();

//Vamos a especificar una serie de características para este portatil
echo "Configurando memoria...<br />";
$portatil->setMemoria(8);

echo "Configurando disco...<br />";
$portatil->setDisco(256);

echo "Configurando procesador...<br />";
$portatil->setProcesador('i5');

echo "Configurando pantalla...<br />";
$portatil->setPantalla(15);

//Vamos a mostrar la configuración del portátil
echo "<hr>";
echo "El ordenador que hemos creado tiene las siguientes especificaciones:<br>";
echo "<br />";
echo "<ul type='square'>";
echo "<li> Memoria RAM: " . $portatil->getMemoria() . " GB </li>";
echo "<li> Disco Duro: " . $portatil->getDisco() . " GB </li>";
echo "<li> Procesador: " . $portatil->getProcesador() . " </li>";
echo "<li> Pantalla: " . $portatil->getPantalla() . " pulgadas </li>";
echo "</ul>";
echo "<br />";
echo "<hr>";

?>

</body>
</html>
