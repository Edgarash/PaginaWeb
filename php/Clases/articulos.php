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

        private function __construct10($ID, $Nombre, $Precio, $Caracteristicas,$Descripcion, $Stock, $IDSubCat, $IDEmpAlta,
                                       $FechaAlta, $Activo) {
                $this->ID = $ID; $this->Nombre = $Nombre; $this->Precio = $Precio; $this->Caracteristicas = $Caracteristicas;
                $this->Descripcion = $Descripcion; $this->Stock = $Stock; $this->IdSubCat = $IDSubCat; $this->IdEmpAlta = $IDEmpAlta;
                $this->FechaAlta = $FechaAlta; $this->Activo =$Activo; 
        }

        //METODOS
        private function setVacios() {
            $this->ID = ""; $this->Nombre = ""; $this->Precio = ""; $this->Caracteristicas = "";
            $this->Descripcion = ""; $this->Stock = ""; $this->IdSubCat = ""; $this->IdEmpAlta = "";
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
            return $this->IdEmpAlta;
        }
        public function getFechaAlta() {
            return $this->FechaAlta;
        }
        public function getActivo() {
            return $this->Activo;
        }

        public function registrarArticulo() {
            try {
                $SQL = "insert into articulo(ID,Nombre,Precio,Caracteristicas,Descripcion,Stock,IDSubCat,IDEmpAlta,FechaAlta,Activo) values (?,?,?,?,?,?,?,?,?,?);";
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $STMT->bindParam(':ID', $this->ID);
                $STMT->bindParam(':Nombre',$this->Nombre);
                $STMT->bindParam(':Precio',$this->Precio);
                $STMT->bindParam(':Caracteristicas',$this->Caracteristicas);
                $STMT->bindParam(':Descripcion',$this->Descripcion);
                $STMT->bindParam(':Stock',$this->Stock);
                $STMT->bindParam(':IDSubCat',$this->IDSubCat);
                $STMT->bindParam(':IDEmpAlta',$this->IDEmpAlta);
                $STMT->bindParam(':FechaAlta',$this->FechaAlta);
                $STMT->bindParam(':Activo',$this->Activo);

                $STMT->execute();
                //echo "Registro creado exitosamente";
                $filas = $STMT->rowCount();
                $conex->desconectar();
            } catch (PDOException $e) {
                echo "ERROR: ".$SQL."<br>".$e->getMessage();
            }
            $Conn = null;
            return $filas;
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
?>