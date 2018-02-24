<?php
/**
* Clase carrito de la compra
* @author Pablo Leon Alcaide
* @version 1.0
*/
    include ('Producto.php');
    class Carrito{
        public $productos = array();

    public function __construct(){

    }

    /* añadimos un producto al carrito */
    public function anadirProducto($product){
        $exist = false;
        foreach ($this->productos as $value){
            if($value->getNombre()==$product->getNombre()){
                $exist=true;
                $value->setCantidad($value->getCantidad()+1);
            }
        }
        if(!$exist){
            $this->productos[] = $product;
        }

    }
    /* eliminamos todos los productos del carrito */
    public function vaciarCarrito(){
        foreach ($this->productos as $value) {
                unset($this->productos[$value]);
        }
    }
    /* elimina un producto existente en el array */
    public function eliminarProducto($product){
        if(in_array($product,$this->productos)){
            unset($this->productos[$product]);
            return true;
        }else
            return false;
    }
    /*calcula el total de la compra */
    public function calcularTotal(){
        $sumatorio=0;
        foreach ($this->productos as $value) {
            $valor = ($value->getPrecioFinal())*($value->getCantidad());
            $sumatorio += $valor;
    }
    return $sumatorio;
}
    public function cargarFactura(){
        echo '<table style="border:1px solid black; border-collapse:collapse;">
        <tr><th>Producto</th><th>Precio Un.</th><th>Cantidad</th></tr>';
        foreach ($this->productos as $value) {
            echo'<tr style="border:1px solid black"><td>'.$value->getNombre().'</td>
            <td>'.$value->getPrecioFinal().' Euros</td>
            <td>'.$value->getCantidad().'</td>';
        }
        echo'</tr></table>';
    }
}
 ?>
