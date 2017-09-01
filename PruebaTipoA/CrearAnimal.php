<!DOCTYPE html>
<!-- Matias Ruiz 1 DAM -->
<html>
   <head>
      <title>Estamos creando animales</title>
      <meta charset="utf-8">
   </head>
   <body>
      <h1>Estamos creando animales</h1>
      <hr>
      <?php 
         include "Animal.php";

         //Creamos el primer animal
         echo "<h1>Creamos el primer animal</h1>";
         $animal1=new Animal();
         $animal1->setTipo("Cienpies");
         $animal1->setPatas(100);
         echo "El primer animal es un " . $animal1->getTipo() . "<br/>";
         echo "El primer animal tiene " . $animal1->getPatas() . " patas<br/>";

         echo "<hr>";
         //Creamos el segundo animal
         echo "<h1>Creamos el segunda animal</h1>";
         $animal2=new Animal();
         $animal2->setTipo("Araña");
         $animal2->setPatas(8);
         echo "El segundo animal es un " . $animal2->getTipo() . "<br/>";
         echo "El segunda animal tiene " . $animal2->getPatas() . "patas<br />";
      ?>
    </body>
</html>
      


