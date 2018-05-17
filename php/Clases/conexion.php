<?php
    //Incluir validaciones
    class Conexion
    {
        private $Servidor = "localhost";
        private $Usuario = "Tecno";
        private $Contraseña = "TecnoCompra#123";
        private $BD = "TecnoCompra";

        //Conectar a la Base de Datos
        public function Conectar()
        {
            try {
                if (!($link = new PDO("mysql:host=$this->Servidor;dbname=$this->BD;", $this->Usuario, $this->Contraseña))) {
                    echo "Error al intentar conectar con la base de datos";
                    exit();
                }
            } catch (PDOException $e) {
                echo "ERROR: ".$e->getMessage();
            }
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $link;
        }

        public function Desconectar()
        {
            $link = null;
        }

        public function Ejecutar($Query)
        {
            $link=Conectar();
            if($link->query) {
                Desconectar($link);
                return true;
            }
            else {
                Desconectar($link);
                return false;
            }
            return $resultado;
        }
    }
?>