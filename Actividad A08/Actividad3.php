<!DOCTYPE html>
<!-- Matias Ruiz 1 DAM -->
<html>
<head>
<title>Actividad 3</title>
<meta charset="utf-8">
<body>
<?php

   $equipos['Valencia'] = array(
            'nombre'=>'Valencia C.F.',
            'numJugadores'=>22,
            'posicionEnLaTabla'=>1
       );
   $equipos['Barcelona'] = array(
            'nombre'=>'Barcelona C.F.',
            'numJugadores'=>32,
            'posicionEnLaTabla'=>2
       );

   echo "El {$equipos['Valencia']['nombre']} tiene {$equipos['Valencia']['numJugadores']} jugadores <br />";
   echo "y ocupa la posición número {$equipos['Valencia']['posicionEnLaTabla']}";
   echo "<br />";
   echo "<hr>";

   echo "El {$equipos['Barcelona']['nombre']} tiene {$equipos['Barcelona']['numJugadores']} jugadores <br />";
   echo "y ocupa la posición número {$equipos['Barcelona']['posicionEnLaTabla']}";

?>
</body>
</html>
