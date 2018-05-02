<?php
    class validaciones {
        private $Mensaje;

        public function soloNumerosPositivos($Numero)
        {
            if (preg_match("/^[0-9]+$/", $Numero) != 0) {
                return true;
            } else {
                $Mensaje = "Número no válido: ".$Numero;
                return false;
            }
        }

        public function validarCorreo($Correo)
        {
            if (filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else { 
                $Mensaje = "Correo no válido: ".$Correo;
                return false;
            }
        }

        public function soloLetrasUnaPalabra($Cadena) {
            if (preg_match("/^([A-ZÑÁÉÍÓÚa-zñáéíóú]+[\s]*)+$/", $Cadena)) {
                return true;
            } else {
                $Mensaje = "Cadena no válida: ".$Cadena;
                return false;
            }
        }

        public function validarContraseña($Contraseña) {
            if (preg_match("/(?:[A-Za-z0-9])+(?:[A-Za-z0-9]|[#$%&!]){7,16}$/", $Contraseña)) {
                return true;
            } else {
                $Mensaje = "Contraseña no válida".$Contraseña;
                return false;
            }
        }

        public function getMensaje()
        {
            return $this->Mensaje;
        }
    }
?>