<?php
    include_once('conexion.php');
    include_once('validaciones.php');
    class SubCategoria{
        private $ID;
        Private $Nombre;
        Private $IDCat;
        Private $Activo;
        Private $IDEmpMod;

        function __construct() {
            $this->setVacios();
            $params = func_get_args();
            $num_params = func_num_args();
            $funcion_constructor = '__construct'.$num_params;
            if (method_exists($this, $funcion_constructor)) {
                call_user_func_array(array($this, $funcion_constructor), $params);
            }
        }
        function __construct5($ID,$Nombre,$IDCat,$Activo,$IDEmpMod){
            $this->ID = $ID;
            $this->Nombre = $Nombre;
            $this->IDCat = $IDCat;
            $this->Activo = $Activo;
            $this->IDEmpMod = $IDEmpMod;
        }
        public function getID() {
            return $this->ID;
        }
        public function getNombre() {
            return $this->Nombre;
        }
        public function getIDCat() {
            return $this->IDCat;
        }
        public function getActivo() {
            return $this->Activo;
        }
        public function getIDEmpMod() {
            return $this->IDEmpMod;
        }

        private function setVacios() {
            $this->ID = ""; 
            $this->Nombre = ""; 
            $this-> IDCat = ""; 
            $this-> Activo= "";    
            $this-> IDEmpMod= "";    
        }
    }

    function ObtenerSubCategorias() {
        $Resultado = array();
        try {
            $SQL = "SELECT * FROM SubCategoria;";
            $conex = new conexion();
            $Conn = $conex->conectar();
            $STMT = $Conn->prepare($SQL);
            $STMT->execute();
            while ($fila = $STMT->fetch()) {
                $cat = new SubCategoria(
                    $fila['ID'], 
                    $fila['Nombre'],
                    $fila['IDCat'],
                    $fila['Activo'],
                    $fila['IDEmpMod']
                );
                $Resultado[] = $cat;
            }
        } catch (PDOExeption $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
        }
        return $Resultado;
    }
?>