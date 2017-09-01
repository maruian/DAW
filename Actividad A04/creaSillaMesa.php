<!DOCTYPE html>
<html>
<head>
<title>Esto es una silla y una mesa</title>
</head>
<body>
<h1>Creando objetos...</h1>
<?php
    include "Mesa.php";
    include "Silla.php";
    
    // Creamos el objeto mesa
    $estoesunamesa = new Mesa();
    echo "La mesa tiene " . $estoesunamesa->getPatas() . " patas <br />";
    echo "La mesa es de color " . $estoesunamesa->getColor() . " <br />";
    echo "<br />";
    
    // Utilizamos el metodo setter de la mesa para cambiar un atributo
    echo "<strong>Cambiando patas de la mesa...</strong><br />";
    $estoesunamesa->setPatas(6);
    
    // Utilizamos el metodo setter de la mesa para cambiar el segundo atributo
    echo "<strong>Cambiando color de la mesa...</strong><br />";
    $estoesunamesa->setColor("Verde");

    echo "<strong>Comprobando los nuevos atributos de la mesa:</strong><br />";
    echo "La mesa tiene " . $estoesunamesa->getPatas() . " patas <br />";
    echo "La mesa es de color " . $estoesunamesa->getColor() . " <br />";
    
    $estoesunasilla = new Silla();
    echo "La silla tiene $estoesunasilla->patas patas <br />";
    echo "La silla es de color $estoesunasilla->color <br />";
    echo "<br />";

?>
</body>
</html>
