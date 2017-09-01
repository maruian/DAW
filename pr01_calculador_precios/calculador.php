<?php
/* Matias Ruiz
 * 1 DAM
 */

class Calculador {
    private $memoria=1;
    private $discos=1;
    private $monitor=0;
    private $combo=0;
    private $precioTotal=0;
    private $precioMemoria=56.1;
    private $precioCombo=29.9;
    private $precioMonitor=103;
    private $precioDisco=49.5;

    public function setMemoria($modulos){
        if (($modulos>0)&&($modulos<3)){
           $this->memoria=$modulos;
        } 
    }

    public function setDiscos($discos){
        if (($discos>0)&&($discos<3)){
           $this->discos=$discos;
        }
    }

    public function setMonitor($monitor){
        if (($monitor>=0)&&($monitor<2)){
            $this->monitor=$monitor;
        }
    }

    public function setCombo($combo){
        if (($combo>=0)&&($combo<2)){
           $this->combo=$combo;
        }
    }

    public function getPrecioDisco(){
        return $this->precioDisco;
    }

    public function getPrecioMonitor(){
        return $this->precioMonitor;
    }

    public function getPrecioCombo(){
        return $this->precioCombo;
    }

    public function getPrecioMemoria(){
        return $this->precioMemoria;
    }

    public function getDiscos(){
        return $this->discos;
    }

    public function getMonitor(){
        return $this->monitor;
    }

    public function getCombo(){
        return $this->combo;
    }

    public function getMemoria(){
        return $this->memoria;
    }

    public function calcularPrecio(){
        $precioDiscos=$this->discos*$this->precioDisco;
        $precioMonitor=$this->monitor*$this->precioMonitor;
        $precioCombo=$this->combo*$this->precioCombo;
        $precioMemoria=$this->memoria*$this->precioMemoria;
        $this->precioTotal=$precioDiscos+$precioMonitor+$precioCombo+$precioMemoria;
    }

    public function getPrecio(){
        return $this->precioTotal;
    }
}

?>