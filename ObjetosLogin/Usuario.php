<?php
/**
* Clase Usuario para Login con Objetos
* @author Pablo Leon
* @version 1.0
*/

class Usuario{
    /* variables */
    private $user = '';
    private $pass = '';
    private $loged = false;

/* constructor */
    public function __construct($newUser,$newPass){
        $this->user = $newUser;
        $this->pass = $newPass;
    }
/* getter and setter */
    public function setUser($usario){
        $this->user = $usuario;
    }
    public function getUser(){
        return $this->user;
    }
    public function setPass($password){
        $this->pass = $password;
    }
    public function getPass(){
        return $this->pass;
    }
    public function setLoged($bool){
        $this->loged = $bool;
    }
    public function isLoged(){
        return $this->loged;
    }
    
}
?>
