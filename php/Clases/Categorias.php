<?php
    include_once('conexion.php');
    include_once('validaciones.php');
    class Categoria{
        private $ID;
        Private $Nombre;
        Private $IDEmpAlta;
        Private $Activo;
        function __construct() {
            $this->setVacios();
            $params = func_get_args();
            $num_params = func_num_args();
            $funcion_constructor = '__construct'.$num_params;
            if (method_exists($this, $funcion_constructor)) {
                call_user_func_array(array($this, $funcion_constructor), $params);
            }
        }
        function __construct4($ID,$Nombre,$IDEmpAlta,$Activo){
            $this->ID = $ID;
            $this->Nombre = $Nombre;
            $this->IDEmpAlta = $IDEmpAlta;
            $this->Activo = $Activo;
        }
        public function getID() {
            return $this->ID;
        }
        public function getNombre() {
            return $this->Nombre;
        }
        public function getIDEmpAlta() {
            return $this->IDEmpAlta;
        }
        public function getActivo() {
            return $this->Activo;
        }

        private function setVacios() {
            $this->ID = ""; 
            $this->Nombre = ""; 
            $this-> IDEmpAlta = ""; 
            $this-> Activo= "";    
        }
    }

    function ObtenerCategorias() {
        $Resultado = array();
        try {
            $SQL = "SELECT * FROM Categoria;";
            $conex = new conexion();
            $Conn = $conex->conectar();
            $STMT = $Conn->prepare($SQL);
            $STMT->execute();
            while ($fila = $STMT->fetch()) {
                $cat = new Categoria(
                    $fila['ID'], 
                    $fila['Nombre'],
                    $fila['IDEmpAlta'],
                    $fila['Activo']
                );
                $Resultado[] = $cat;
            }
        } catch (PDOExeption $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
        }
        return $Resultado;
    }
?>