<!DOCTYPE html>
<!--Matias Ruiz 1 DAM-->
<html>
<head>
<title>Multiplicar</title>
<meta charset="utf-8">
</head>
<body>
<?php
   $tablas=array("primera"=>5, "segunda"=>13, "tercera"=>11);
   foreach ($tablas as $clave=>$valor){
       echo "<h1>Clave: $clave </h1><br />";
       for ($i=1; $i<11; $i++){
           echo "$valor x $i = " . $valor*$i . " <br />";
       }
       echo "<hr>";
   }

?>
</body>
</html>