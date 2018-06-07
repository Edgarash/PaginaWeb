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
        private $Imagenes;
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

        private function __construct10($ID, $Nombre, $Precio, $Caracteristicas,$Descripcion,
        $Stock, $IDSubCat, $IDEmpAlta,
        $FechaAlta, $Activo) {
                $this->ID = $ID; $this->Nombre = $Nombre; $this->Precio = $Precio; $this->Caracteristicas = $Caracteristicas;
                $this->Descripcion = $Descripcion; $this->Stock = $Stock; $this->IDSubCat = $IDSubCat; $this->IDEmpAlta = $IDEmpAlta;
                $this->FechaAlta = $FechaAlta; $this->Activo =$Activo;
        }

        //METODOS
        private function setVacios() {
            $this->ID = ""; $this->Nombre = ""; $this->Precio = ""; $this->Caracteristicas = "";
            $this->Descripcion = ""; $this->Stock = ""; $this->IDSubCat = ""; $this->IDEmpAlta = "";
            $this->FechaAlta = ""; $this->Activo = ""; 
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
            return $this->IDEmpAlta;
        }
        public function getFechaAlta() {
            return $this->FechaAlta;
        }
        public function getActivo() {
            return $this->Activo;
        }
        public function getImagenes() {
            $ID = $this->getID();
            return array(
                $ID.'_1',
                $ID.'_2',
                $ID.'_3',
                $ID.'_4',
            );
        }

        public function registrarArticulo() {
            try {
                $SQL = "CALL RegistrarArticulo(?,?,?,?,?,?,?,?);";
                $Conn = new Conexion();
                $Conn = $Conn->conectar();
                //Empieza transaccion
                $STMT = $Conn->prepare($SQL);
                //Inserta
                $STMT->execute(array(
                    $this->Nombre, $this->Precio,$this->Caracteristicas,$this->Descripcion,
                    $this->Stock,$this->IDSubCat,$this->IDEmpAlta,date("Y-m-d H:i:s")
                ));
                if ($fila = $STMT->fetch()) {
                    $ID = $fila['ID'];
                    if (!$ID) { 
                        throw new PDOException("Articulo no insertado: probablemente texto copiado", 1);
                        return null;
                    }
                    else
                        return $ID;
                } else {
                    throw new PDOException("Articulo no insertado", 1);
                }
                #$filas = $STMT->rowCount();
                $conex->desconectar();
            } catch (PDOException $e) {
                echo "ERROR: ".$SQL."<br>".$e->getMessage();
                return null;
            }
            $Conn = null;
            return $ID;
        }
        public function existeArticulo() {
            try {
                $SQL = "SELECT ID FROM articulo WHERE ID = :Id;";
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $STMT->bindParam(':Id', $this->ID);
                $STMT->execute();
                $Existe = $STMT->rowCount() > 0;
            } catch (PDOException $e) {
                $Existe = false;
                echo "ERROR: ".$SQL."<br>".$e->getMessage();
            }
            return $Existe;
        }
    }

    function ObtenerArticulos() {
        $Resultado = array();
        try {
            $SQL = "SELECT * FROM articulo;";
            $conex = new conexion();
            $Conn = $conex->conectar();
            $STMT = $Conn->prepare($SQL);
            $STMT->execute();
            while ($fila = $STMT->fetch()) {
                $Articulo= new Articulo(
                $fila['ID'],$fila['Nombre'],
                $fila['Precio'],$fila['Caracteristicas'],
                $fila['Descripcion'],$fila['Stock'],
                $fila['IDSubCat'],$fila['IDEmpAlta'],
                $fila['FechaAlta'],$fila['Activo']
                );
                $Resultado[] = $Articulo;
            }
        } catch (PDOExeption $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
        }
        return $Resultado;
    }

    function ObtenerUnArticulo($ID) {$Resultado = array();
        try {
            $SQL = "CALL ObtenerArticulo(:ID);";
            $conex = new conexion();
            $Conn = $conex->conectar();
            $STMT = $Conn->prepare($SQL);
            $STMT->bindParam(":ID", $ID);
            $STMT->execute();
            if ($fila = $STMT->fetch()) {
                $Articulo= new Articulo(
                $fila['ID'],$fila['Nombre'],
                $fila['Precio'],$fila['Caracteristicas'],
                $fila['Descripcion'],$fila['Stock'],
                $fila['IDSubCat'],$fila['IDEmpAlta'],
                $fila['FechaAlta'],$fila['Activo']
                );
                $Resultado = $Articulo;
            } else {
                $Resultado = null;
            }
        } catch (PDOExeption $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
        }
        return $Resultado;
    }

    function obtenerNuevos() {
        try {
            $SQL = "CALL obtenerNuevos();";
            $conex = new conexion();
            $Conn = $conex->conectar();
            $STMT = $Conn->prepare($SQL);
            $STMT->execute();
            $Resultado = null;
            while ($fila = $STMT->fetch()) {
                $Articulo= new Articulo(
                $fila['ID'],$fila['Nombre'],
                $fila['Precio'],$fila['Caracteristicas'],
                $fila['Descripcion'],$fila['Stock'],
                $fila['IDSubCat'],$fila['IDEmpAlta'],
                $fila['FechaAlta'],$fila['Activo']
                );
                $Resultado[] = $Articulo;
            }
        } catch (PDOExeption $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
        }
        return $Resultado;
    }

    function obtenerPorSubCategorias($SubCategoria) {
        try {
            if ($SubCategoria == -1) {
                return null;
            }
            $SQL = "CALL ArticulosCategoria(:Cat);";
            $conex = new conexion();
            $Conn = $conex->conectar();
            $STMT = $Conn->prepare($SQL);
            $STMT->bindParam(':Cat', $SubCategoria);
            $STMT->execute();
            $Resultado = null;
            while ($fila = $STMT->fetch()) {
                $Articulo= new Articulo(
                $fila['ID'],$fila['Nombre'],
                $fila['Precio'],$fila['Caracteristicas'],
                $fila['Descripcion'],$fila['Stock'],
                $fila['IDSubCat'],$fila['IDEmpAlta'],
                $fila['FechaAlta'],$fila['Activo']
                );
                $Resultado[] = $Articulo;
            }
        } catch (PDOExeption $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
        }
        return $Resultado;
    }
?>