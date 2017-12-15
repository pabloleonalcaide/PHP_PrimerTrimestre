 <?php
    /**
    * Funciones necesarias para el script usuarios.php
    * @author Pablo Leon Alcaide
    * @version 1.0
     */

    /** Limpia los espacios y caracteres extraños */
    function limpiarDatos($dato)
    {
        $dato = trim($dato);
        $dato = stripslashes($dato);
        $dato = htmlspecialchars($dato);
        return $dato;
    }

    /** Limpia la cadena de espacios y caracteres especiales  */
    function preparaNombre($cadena){
        $cadena = strtolower($cadena);
        $especial = array( 'á', 'é', 'í', 'ó', 'ú' );
        $normal = array( 'a', 'e', 'i', 'o', 'u' );
        $cadena = str_replace($especial,$normal,$cadena);
        $cadena = trim($cadena);
        $cadena = utf8_decode($cadena);
        $cadena = strtr($cadena, utf8_decode($especiales), $normales);
        $cadena = utf8_encode($cadena);
        return $cadena;
    }

    /** Extrae las iniciales de la cadena */
    function obtenerIniciales($cadena) {
        $iniciales = '';
        $conectores = Array('del', 'de', 'la', 'los');
        $palabras = explode(' ', preparaNombre($cadena));
        for ($i=0; $i < count($palabras); $i++) {
            if (!in_array($palabras[$i], $conectores)) {
                $iniciales .= substr($palabras[$i], 0, 2);
            }
        }
        return $iniciales;
    }
?>
