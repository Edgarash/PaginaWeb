<?php
    include_once('conexion.php');
    include_once('validaciones.php');

    class Articulo{
        private $ID;
        private $Nombre;
        private $Precio;
        private $Caracteristicas;
        private $Descripcion;
        private $Stock;
        private $IDSubCat;
        private $IDEmpAlta;
        private $FechaAlta;
        private $Activo;
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

        //METODOS
        private function setVacios() {
            $this->ID = ""; $this->Nombre = ""; $this->Precio = ""; $this->Caracteristicas = "";
            $this->Descripcion = ""; $this->Stock = ""; $this->IdSubCat = ""; $this->IdEmpAlta = "";
            $this->FechaAlta = ""; $this->Activo = ""; 
        }
        //PROPIEDADES
        //SETS
        public function setID($ID){
            if ($this->Val->SoloNumerosPositivos($ID)) {
                $this->ID = $ID;
            } else {
                throw new Exception("ID no válido: ".$ID, 1);
            }
        }
        public function setNombre($Nombre){
            if ($this->Val->soloLetrasUnaPalabra($Nombre)) {
                $this->Nombre = $Nombre;
            } else {
                throw new Exception("Nombre no válido: ".$Nombre, 1);
            }
        }
        public function setPrecio($Precio){
            if ($this->Val->soloNumerosPositivos($Precio)) {
                $this->Precio = $Precio;
            } else {
                throw new Exception("ID no válido: ".$Precio, 1);
            }
        }        
        public function setCaracteristicas($Caracteristicas){
            if ($this->Val->soloNumerosPositivos($Caracteristicas)) {
                $this->Caracteristicas = $Caracteristicas;
            } else {
                throw new Exception("ID no válido: ".$Caracteristicas, 1);
            }
        }
        public function setStock($Stock){
            if ($this->Val->soloNumerosPositivos($Stock)) {
                $this->Stock = $Stock;
            } else {
                throw new Exception("ID no válido: ".$Stock, 1);
            }
        }
        public function setIDSubCat($IDSubCat){
            if ($this->Val->soloNumerosPositivos($IDSubCat)) {
                $this->IDSubCat = $IDSubCat;
            } else {
                throw new Exception("ID no válido: ".$IDSubCat, 1);
            }
        }
        public function setIDEmpAlta($IDEmpAlta){
            if ($this->Val->soloNumerosPositivos($IDEmpAlta) {
                $this->IDEmpAlta = $IDEmpAlta;
            } else {
                throw new Exception("ID no válido: ".$IDEmpAlta, 1);
            }
        }
        public function setFechaAlta($FechaAlta){
            if ($this->Val->soloNumerosPositivos($FechaAlta) {
                $this->FechaAlta = $FechaAlta;
            } else {
                throw new Exception("ID no válido: ".$FechaAlta, 1);
            }
        }
        public function setActivo($Activo){
            if ($this->Val->soloNumerosPositivos($Activo) {
                $this->Activo = $Activo;
            } else {
                throw new Exception("ID no válido: ".$Activo, 1);
            }
        }                                                              
        
        public function getID() {
            return $this->ID;
        }
        public function getNombre() {
            return $this->Nombre;
        }
        public function getPrecio() {
            return $this->Precio;
        }
        public function getCaracteristicas() {
            return $this->Caracteristicas;
        }
        public function getDescripcion() {
            return $this->Descripcion;
        }
        public function getStock() {
            return $this->Stock;
        }
        public function getIDSubCat() {
            return $this->IDSubCat;
        }
        public function getIDEmpAlta() {
            return $this->IdEmpAlta;
        }
        public function getFechaAlta() {
            return $this->FechaAlta;
        }
        public function getActivo() {
            return $this->Activo;
        }
    }
?>