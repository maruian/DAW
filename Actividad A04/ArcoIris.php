<?php
/**
 *
 * Matias Ruiz
 * 1 DAM
 *
 */
   class ArcoIris {
	  public $verde="Verde";
	  public $rojo="Rojo";
	  public $azul="Azul";

	  public function ArcoIris(){
		  echo "<h1>Este es el constructor de la clase ArcoIris.php</h1>";
	  }

	  public function muestraVerde(){
	     echo "Este es el color " . $this->verde ."<br />";	   
	  }

	  public function muestraRojo(){
	     echo "Este es el color " . $this->rojo . "<br />";
	  }

	  public function muestraAzul(){
	     echo "Este es el color " . $this->azul . "<br />";
	  }

   }
?>
