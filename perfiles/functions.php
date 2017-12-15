<?php
    /**
     * @author Pablo Leon Alcaide
     * @version 1.0
     */

    function validar($user, $pass)
    {
        foreach ($_SESSION['listaUsuarios'] as $value) {
           if ($value['usuario'] == $user and $value['password'] == $pass) {
               return true;
           }
        }
        return false;
    }

    function identificar($name){
        foreach ($_SESSION['listaUsuarios'] as $value) {
           if ($value['usuario'] == $name) {
               return $value['perfil'];
           }
        }
    }

    function showInfo($perfil){
            echo "<h3>Has accedido a esta web como $perfil \n haga un uso responsable</h3>";
            echo '<a href="sesionCerrada.php">Desconectar</a>';

    }

    function showMenu($perfil){
        if ($perfil != "invitado") {
            echo "<ul>";
            if ($perfil == "administrador") {
                echo "<li><a href='#'>Añadir usuarios</a></li>";
                echo "<li><a href='#'>Borrar usuarios</a></li>";
                echo "<li><a href='#'>Ver estado</a></li>";
            }
            else if ($perfil == "usuario") {
                echo "<li><a href='#'>Editar mi usuario</a></li>";
                echo "<li><a href='#'>Borrar mi usuario</a></li>";
                echo "<li><a href='#'>Ver estado</a></li>";

            }
            echo "</ul>";
        }
    }

    function limpiarDatos($dato)
    {
        $dato = trim($dato);
        $dato = stripslashes($dato);
        $dato = htmlspecialchars($dato);
        return $dato;
    }

?>
