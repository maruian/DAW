<?php
class Mesa {
    public $patas=4;
    public $color="Gris";

    public function Mesa(){
        echo "<h1>Creando una mesa</h1><br />";
    }

    public function getPatas(){
        return $this->patas;
    }

    public function getColor(){
        return $this->color;
    }

    public function setPatas($patas){
        $this->patas=$patas;
    }

    public function setColor($color){
        $this->color=$color;
    }
}

?>