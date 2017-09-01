<!-- Matias Ruiz 1 DAM -->
<!DOCTYPE html>
<html>
   <head>
      <title>Estamos creando coches</title>
      <meta charset="utf-8">
   </head>
   <body>
      <h1>Estamos creando coches</h1>
      <hr>
      <?php
         include "Coche.php";
         
         //Creamos el primer coche
         $coche1=new Coche();

         //Definimos sus propiedades
         $coche1->setMarca("BMW");
         $coche1->setPotencia(1300);

         //Mostramos por pantalla
         echo "El primer coche es de la marca " . $coche1->getMarca() . "<br />";
         echo "El primer coche tiene una potencia de " . $coche1->getPotencia() . "<br />";

         echo "<hr>";

         //Creamos el segundo coche
         $coche2=new Coche();

         //Definimos las propiedades del segundo coche
         $coche2->setMarca("Mercedes");
         $coche2->setPotencia(100);

         //Mostramos por pantalla
         echo "El segundo coche es de la marca " . $coche2->getMarca() . "<br />";
         echo "El segundo coche tiene una potencia de " . $coche2->getPotencia() . "<br />";
      ?>
    </body>
</html>


         
