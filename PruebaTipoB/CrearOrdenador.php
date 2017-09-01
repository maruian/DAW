<!DOCTYPE html>
<!-- Matias Ruiz 1 DAM -->
<html>
   <head>
   <title>Estamos creando ordenadores</title>
   <meta charset="utf-8">
   </head>
   <body>
      <h1>
      <?php
         include "Ordenador.php";

        echo "<h1>Vamos a crear ordenadores</h1>";

         //Creamos el primer ordenador
         $ordenador1=new Ordenador();
         $ordenador1->setMarca("Apple");
         $ordenador1->setMemoria(8);
         
         //Mostramos por pantalla
         echo "El primer ordenador es un modelo de " . $ordenador1->getMarca() . "<br />";
         echo "El primer ordenador tiene " . $ordenador1->getMemoria() . " GB de RAM<br />";

         echo "<hr>";
         //Creamos el segundo ordenador
         $ordenador2=new Ordenador();
         $ordenador2->setMarca("Asus");
         $ordenador2->setMemoria(16);

         //Mostramos por pantalla
         echo "El segundo ordenador es un modelo de " . $ordenador2->getMarca() . "<br />";
         echo "El segundo ordenador tiene " . $ordenador2->getMemoria() . " GB de RAM<br /> ";

       ?>
    </body>
</html>
      
