<?php
    class Menu{
        public $tag = '';
        public $header = '';

        public function __construct($usuario){
            $this->tag = strtolower($usuario->getUser());
            $this->header = strtoupper($usuario->getUser());
        }

        public function createMenu(){
            return '<h2>BIENVENIDO '.$this->header.'</h2><ul><li>Opcion 1 '.
            $this->tag.'</li><li>Opcion 2 '.$this->tag.'</li>
            <li>Opcion 3 '.$this->tag.'</li></ul>';
        }
    }
?>
