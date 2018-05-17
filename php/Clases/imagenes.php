<?php
    include_once('conexion.php');
    include_once('validaciones.php');
    class imagen {
        private $ID;
        private $Nombre;
        private $URL;
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

        private function __construct2($ID, $URL) {
            $this->__construct1($ID); $this->setURL($URL);
        }

        private function __construct3($ID, $Nombre, $URL) {
            $this->__construct2($ID, $URL);
            $this->setNombre($Nombre);
        }

        private function __construct4($ID, $Nombre, $URL, $IDEmp) {
            $this->__construct3($ID, $Nombre, $URL);
            $this->setIDEmp($IDEmp);
        }

        private function setVacios() {
            $this->URLS = ""; $this->ID = "";
        }
        
        //GET's
        public function getID() {
            return $this->ID;
        }

        public function getURL() {
            return $this->URL;
        }

        public function getNombre() {
            return $this->Nombre;
        }

        public function getIDEmp() {
            return $this->IDEmp;
        }

        //SET's
        public function setID($ID) {
            $this->ID = $ID;
        }

        public function setURL($URL) {
            $this->URL = $URL;
        }

        public function setNombre($Nombre) {
            $this->Nombre = $Nombre;
        }

        public function setIDEmp($IDEmp) {
            $this->IDEmp = $IDEmp;
        }
    }

    function ObtenerPrincipales() {
        $Resultdo = array();
        try {
            $SQL = "SELECT * FROM imgPrincipal;";
            $conex = new Conexion();
            $Conn = $conex->conectar();
            $STMT = $Conn->prepare($SQL);
            $STMT->execute();
            while ($fila = $STMT->fetch()) {
                $img = new Imagen(
                    $fila['ID'],
                    $fila['Nombre'],
                    $fila['URL']
                );
                $Resultdo[] = $img;
            }
        } catch (PDOException $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
        }
        return $Resultdo;
    }
?>