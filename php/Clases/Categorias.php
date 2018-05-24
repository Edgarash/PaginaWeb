<?php
    include_once('conexion.php');
    include_once('validaciones.php');
    class Categoria{
        private $ID;
        Private $Nombre;
        Private $IDEmpAlta;
        Private $Activo;
        private $Val;
        private $Error;

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
        function __construct1($ID) {
            $this->ID = $ID;
        }
        function __construct4($ID,$Nombre,$IDEmpAlta,$Activo){
            $this->ID = $ID;
            $this->Nombre = $Nombre;
            $this->IDEmpAlta = $IDEmpAlta;
            $this->Activo = $Activo;
        }

        public function RegistrarCategoria(){
            try{
            $SQL = "Call RegistrarCatalogo(:nombre, :IDEmpAlta);";
            $conex = new conexion();
            $STMT = $Conn->prepare($SQL);
            $STMT->bindParam(':nombre', $this->Nombre);
            $STMT->bindParam(':IDEmpAlta', $this->IDEmpAlta);
            $STMT->execute();
            $filas = $STMT->rowCount();
            $conex->desconectar();
            }catch(PDOException $e){
                $this->Error = true;
            }
        }
        public function EliminarCategoria() {
            try {
                #$SQL = "DELETE FROM Categoria WHERE ID = :ID";
                $SQL = "UPDATE Categoria SET Activo = 0 WHERE ID = :ID;";
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $STMT->bindParam(':ID', $this->ID);
                $STMT->execute();
                'Eliminacion Lograda';
            } catch (PDOException $e) {
                $this->Error = true;
                #echo "ERROR: ".$SQL."<br>".$e->getMessage();
            }
        }

        public function ActualizarCategoria() {
            try {
                $temp = ($this->Activo == 'true' ? 1 : 0);
                $SQL = "UPDATE Categoria SET ".
                "Nombre = :Nombre, Activo = $temp".
                ' WHERE Categoria.ID = :ID;';
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $STMT->bindParam(':Nombre', $this->Nombre);
                $STMT->bindParam(':ID', $this->ID);
                $STMT->execute();
                return 'Modificacion Lograda';
            } catch (PDOException $e) {
                $this->Error = true;
                echo "ERROR: ".$SQL."<br>".$e->getMessage();
                echo 'false';
            }
        }

        public function getError() {
            return $this->Error;
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
            $SQL = "SELECT
            `Categoria`.*, `Usuario`.`Usuario` AS 'NombreUsuario'
          FROM
            `Categoria`,
            `Usuario`
          WHERE
            `Categoria`.`IDEmpAlta` = `Usuario`.`ID`;";
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
                $cat->NombreUsuario = $fila['NombreUsuario'];
                $Resultado[] = $cat;
            }
        } catch (PDOExeption $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
        }
        return $Resultado;
    }
?>