<?php
    include_once('conexion.php');
    include_once('validaciones.php');
    class imagen {
        private $ID;
        private $URLS;
        private $Val;

        function __construct() {
            $this->Val = new validaciones();
            $this->setVacios();
            $params = func_get_args();
            $num_params = func_num_args();
            $funcion_constructor = '__construct'.$num_params;
            if (method_exists($this, $funcion_constructor)) {
                call_user_func_array(array($this, $funcion_constructor), $params);
            }
        }

        private function __construct1($ID) {
            $this->setID($ID);
        }

        private function __construct4($Email, $Contraseña, $Nombre, $Apellidos) {
            $this->__construct2($Email, $Contraseña);
            $this->setNombre($Nombre); $this->setApellidos($Apellidos);
        }

        private function setVacios() {
            $this->URLS = new array(); $this->ID = "";
        }
        
        //GET's
        public function getID() {
            return $this->ID;
        }

        public function getURLS() {
            return $this->URLS;
        }

        //SET's
        public function setID($ID) {
            $this->ID = $ID;
        }

        public function agregarURL($URL) {
            $this->URLS[] = $URL;
        }
    }
?>