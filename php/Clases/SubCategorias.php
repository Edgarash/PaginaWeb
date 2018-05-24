<?php
    include_once('conexion.php');
    include_once('validaciones.php');
    class SubCategoria{
        private $ID;
        Private $Nombre;
        Private $IDCat;
        Private $Activo;
        Private $IDEmpMod;
        private $Error;

        function __construct() {
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
        public function getError() {
            return $this->Error;
        }

        private function setVacios() {
            $this->ID = ""; 
            $this->Nombre = ""; 
            $this-> IDCat = ""; 
            $this-> Activo= "";    
            $this-> IDEmpMod= "";    
        }
        public function RegistrarSubCategoria(){
            try{
            $SQL = "call RegistrarSubCategoria(:nombre,:IdCat,:IDEmpMod)";
            $conex = new conexion();
            $Conn = $conex->conectar();
            $STMT = $Conn->prepare($SQL);
            $STMT->bindParam(':nombre', $this->Nombre);
            $STMT->bindParam(':IdCat', $this->IDCat);
            $STMT->bindParam(':IDEmpMod', $this->IDEmpMod);
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
                $SQL = "UPDATE SubCategoria SET Activo = 0 WHERE ID = :ID;";
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $STMT->bindParam(':ID', $this->ID);
                $STMT->execute();
                
            } catch (PDOException $e) {
                $this->Error = true;
                #echo "ERROR: ".$SQL."<br>".$e->getMessage();
            }
        }

        public function ActualizarSubCategoria() {
            try {
                $temp = ($this->Activo == 'true' ? 1 : 0);
                $cat = $this->getIDCat();
                $SQL = "UPDATE SubCategoria SET 
                Nombre = :Nombre, Activo = $temp, IDCat = :IDCat
                WHERE SubCategoria.ID = :ID;";
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $STMT->bindParam(':Nombre', $this->Nombre);
                $STMT->bindParam(':ID', $this->ID);
                $STMT->bindParam(':IDCat', $this->IDCat);
                $STMT->execute();
                return 'Modificacion Lograda';
            } catch (PDOException $e) {
                $this->Error = true;
                echo "ERROR: ".$SQL."<br>".$e->getMessage();
                echo 'false';
            }
        }

        public function llenarTabla(){
            try {
                $SQL = "call DesplegarCategorias();";
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $temp ->$STMT->execute();
                return $temp;
            } catch (PDOException $e) {
                $this->Error = true;
                echo "ERROR: ".$SQL."<br>".$e->getMessage();
                echo 'false';
            }
        }
        
    }

    function ObtenerSubCategorias() {
        $Resultado = array();
        try {
            $SQL = "SELECT
            `SubCategoria`.*, `Categoria`.`Nombre` AS 'NombreCategoria', `Usuario`.`Usuario` AS 'NombreUsuario'
          FROM
            `SubCategoria`,
            `Categoria`,
            `Usuario`
          WHERE
            `Categoria`.`ID` = `SubCategoria`.`IDCat` AND `SubCategoria`.`IDEmpMod` = `Usuario`.`ID`;";
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
                $cat->NombreCategoria = $fila['NombreCategoria'];
                $cat->NombreUsuario = $fila['NombreUsuario'];
                $Resultado[] = $cat;
            }
        } catch (PDOExeption $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
        }
        return $Resultado;
    }
?>