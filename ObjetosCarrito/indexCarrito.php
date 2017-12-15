<?php
ob_start();
include('Carrito.php');
include('../verCodigo.php');
session_start();
/**
* Carrito de la compra
* @author Pablo Leon Alcaide
* @version 1.0
*/
//include('Producto.php');
    //Instanciación de objetos
$cesta = new Carrito();
$iphone = new Producto("iphone",200,1);
$samsung = new Producto("samsung",100,1);
$nokia = new Producto("nokia",30,1);
$gadgetozapato = new Producto("gadgetoZapato",1000,1);
?>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
<?php
if(!isset($_SESSION['carro'])){
    $_SESSION['carro']= $cesta;
}

    if(isset($_POST['compra'])){
            $cesta = $_SESSION['carro'];
            echo 'Factura<br />';
            echo $cesta->cargarFactura();
            limpiarCesta();
            echo'<a style="color:white;" href=indexCarrito.php>Volver</a>';
    }else{
        if(!empty($cesta->productos))
            ?>
            <div style="width:40%; margin:0 auto;">
                <form action="indexCarrito.php" method="post">
                    <fieldset><legend>Productos</legend>
                    <label>Iphone X </label>
                    <input type="submit" value="add" name="iphone"/><br />
                    <label>Samsung GS4 </label>
                    <input type="submit" value="add" name="samsung"/><br />
                    <label>Nokia 3330 </label>
                    <input type="submit" value="add" name="nokia"/><br />
                    <label>GadgetoZapato </label>
                    <input type="submit" value="add" name="gadget" /><br />
                    </fieldset>
                    <input type="submit" value="comprar" name="compra"/>
                    <input type="submit" value="vaciar" name="vacia"/>
                </form>
            </div>
            <?php
    }
    if(isset($_POST['vacia'])){
            limpiarCesta();
    }
    if(isset($_POST['iphone'])){
        $cesta = $_SESSION['carro'];
        $cesta->anadirProducto($iphone);
        $_SESSION['carro']=$cesta;
        }
    if(isset($_POST['samsung'])){
        $cesta = $_SESSION['carro'];
        $cesta->anadirProducto($samsung);
        $_SESSION['carro']=$cesta;
    }
    if(isset($_POST['nokia'])){
        $cesta = $_SESSION['carro'];
        $cesta->anadirProducto($nokia);
        $_SESSION['carro']=$cesta;
        }
    if(isset($_POST['gadget'])){
        $cesta = $_SESSION['carro'];
        $cesta->anadirProducto($gadgetozapato);
        $_SESSION['carro']=$cesta;
        }
?>
    <div style="border: 1px solid gray;">
        <img src="./ObjetosCarrito/carrito.svg" width=20px; height=20px;/><span>Total:<?php echo calcularTotal() ?> Euros</span>
    </div>
    <br /><a href="../index.php">Volver</a><br />
<?php
    /** Devuelve el total de la compra */
    function calcularTotal(){
        $cesta = $_SESSION['carro'];
        if(!empty($cesta->productos)){
            return $cesta->calcularTotal();
        }else{
            return 0;
        }
    }
    /** Vacía la cesta de la compra */
    function limpiarCesta(){
        $cesta = new Carrito();
        $_SESSION['carro']= $cesta;
    }
    if(isset($_POST['ver_codigo'])){
      verCodigo(__FILE__);
    }
botonVer();

include('../ultimaVisitaCookie.php');
?>
</body>
</html>
<?php
ob_end_flush();
?>
