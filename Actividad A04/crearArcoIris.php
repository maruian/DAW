<!DOCTYPE html>
<!-- Matias Ruiz 1 DAM -->
<html>
<head>
<title>Arco Iris de colores</title>
</head>
<body>
<?php
   include "ArcoIris.php";
   $arcoiris = new ArcoIris();
   echo $arcoiris->muestraVerde();
   echo $arcoiris->muestraRojo();
   echo $arcoiris->muestraAzul();
?>
</body>
