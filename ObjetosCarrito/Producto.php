<?php
/**
* Class Producto
* @author Pablo Leon Alcaide
* @version 1.0
*/
    class Producto{
        private $precioBase = 0;
        private $cantidad = 1;
        private $precioFinal = 0;
        private $nombre = '';
        private $iva = 0.16;

        public function __construct($name,$price,$cant){
            $this->precioBase = $price;
            $this->nombre = $name;
            $this->cantidad = $cant;
        }
        /* establece un precio positivo al producto */
        public function setPrecioBase($precio){
            if($precio>=0)
                $this->precioBase = $precio;
            else {
                $this->precioBase = 1;
            }
        }
        public function getPrecioBase(){
            return $this->precioBase;
        }
        public function setCantidad($cant){
            $this->cantidad = $cant;
        }
        public function getCantidad(){
            return $this->cantidad;
        }

        /* añade un sólo producto */
        public function anadirUno(){
            $this->setCantidad($this->getCantidad()+1);
        }
        /*elimina 1 producto si hay 0 o más */
        public function eliminarUno(){
            if($this->getCantidad()>0)
                $this->setCantidad($this->getCantidad()-1);
        }
        /* calcula el precio del producto con IVA */
        public function calcularPrecioFinal(){
            if($this->iva >0){
                $this->precioFinal = (($this->precioBase)*($this->iva)) + $this->precioBase;
            }else{
                $this->precioFinal = $this->precioBase;
            }
        }
        public function getPrecioFinal(){
            $this->calcularPrecioFinal();
            return $this->precioFinal;
        }
        public function setIva($impuesto){
            $this->iva = $impuesto;
        }
        public function getIva(){
            return $this->iva;
        }
        public function setNombre($name){
            $this->nombre = $name;
        }
        public function getNombre(){
            return $this->nombre;
        }
    }

?>
