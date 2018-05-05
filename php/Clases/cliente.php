<?php
    include_once('conexion.php');
    include_once('validaciones.php');
    class cliente {
        private $ID;
        private $Email;
        private $Contraseña;
        private $Nombre;
        private $Apellidos;
        private $Telefono;
        private $NumExterior;
        private $NumInterior;
        private $Calle;
        private $EntreCalles;
        private $Referencia;
        private $CP;
        private $Colonia;
        private $Municipio;
        private $Estado;
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

        private function __construct2($Email, $Contraseña) {
            $this->setEmail($Email);
            $this->setContraseña($Contraseña);
        }

        private function __construct4($Email, $Contraseña, $Nombre, $Apellidos) {
            $this->__construct2($Email, $Contraseña);
            $this->setNombre($Nombre); $this->setApellidos($Apellidos);
        }

        private function __construct17($ID, $Email, $Contraseña, $Nombre, $Apellidos, $Telefono, 
        $NumExterior, $NumInterior, $Calle, $EntreCalles, $Referencia, $CP, $Colonia,
        $Municipio, $Estado, $FechaAlta, $Activo) {
            $this->__construct4($Email, $Contraseña, $Nombre, $Apellidos);
            $this->setID($ID); $this->Telefono = $Telefono; $this->NumExterior = $NumExterior;
            $this->NumInterior = $NumInterior; $this->Calle = $Calle; $this->EntreCalles = $EntreCalles;
            $this->Referencia = $Referencia; $this->CP = $CP; $this->Colonia = $Colonia;
            $this->Municipio = $Municipio; $this->Estado = $Estado; $this->FechaAlta = $FechaAlta;
            $this->Activo = $Activo;
        }

        private function setVacios() {
            $this->ID = ""; $this->Email = ""; $this->Contraseña = ""; $this->Nombre = "";
            $this->Apellidos = ""; $this->Telefono =""; $this->NumExterior = "";
            $this->NumInterior = ""; $this->Calle = ""; $this->EntreCalles = "";
            $this->Referencia = ""; $this->CP = ""; $this->Colonia = ""; $this->Municipio = "";
            $this->Estado = ""; $this->FechaAlta = ""; $this->Activo = "";
        }

        public function registrarCliente() {
            try {
                $SQL = "CALL RegistrarCliente(:email, :contrasena, :nombre, :apellidos);";
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $STMT->bindParam(':email', $this->Email);
                $STMT->bindParam(':contrasena', $this->Contraseña);
                $STMT->bindParam(':nombre', $this->Nombre);
                $STMT->bindParam(':apellidos', $this->Apellidos);
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

        public function existeCliente() {
            try {
                $SQL = "SELECT email FROM Cliente WHERE email = :email;";
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $STMT->bindParam(':email', $this->Email);
                $STMT->execute();
                $Existe = $STMT->rowCount() > 0;
            } catch (PDOException $e) {
                $Existe = false;
                echo "ERROR: ".$SQL."<br>".$e->getMessage();
            }
            return $Existe;
        }

        public function hacerLogin() {
            try {
                $SQL = "SELECT * FROM Cliente WHERE email = :email";
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $STMT->bindParam(":email", $this->Email);
                if ($this->existeCliente()) {
                    $STMT->execute();
                    $fila = $STMT->fetch();
                    $Cliente = new Cliente(
                        $fila['ID'], $fila['Email'], $fila['Contraseña'], $fila['Nombre'],
                        $fila['Apellidos'], $fila['Telefono'], $fila['NumExterior'],
                        $fila['NumInterior'], $fila['Calle'], $fila['EntreCalles'],
                        $fila['Referencia'], $fila['CP'], $fila['Colonia'], $fila['Municipio'],
                        $fila['Estado'], $fila['FechaAlta'], $fila['Activo']
                    );
                    if ($this->Contraseña === $Cliente->getContraseña()) {
                        return $Cliente;
                    } else {
                        return false;
                    }
                    return $Cliente;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "ERROR: ".$SQL."<br>".$e->getMessage();
            }
        }

        //Sets
        public function setID($ID)
        {
            if ($this->Val->SoloNumerosPositivos($ID)) {
                $this->ID = $ID;
            } else {
                throw new Exception("ID no válido: ".$ID, 1);
            }
        }

        public function setEmail($Email) {
            if ($this->Val->validarCorreo($Email)) {
                $this->Email = $Email;
            } else {
                throw new Exception("Correo no válido: ".$Email, 1);
            }
        }

        public function setNombre($Nombre) {
            if ($this->Val->soloLetrasUnaPalabra($Nombre)) {
                $this->Nombre = $Nombre;
            } else {
                throw new Exception("Nombre no válido: ".$Nombre, 1);
            }
        }

        public function setApellidos($Apellidos) {
            #if (strlen($Apellidos) <= 100) {
            if ($this->Val->soloLetrasUnaPalabra($Apellidos)) {
                $this->Apellidos = $Apellidos;
            } else {
                throw new Exception("Apellidos no válidos: ".$Apellidos, 1);
            }
        }

        public function setContraseña($Contraseña) {
            if ($this->Val->validarContraseña($Contraseña)) {
                $this->Contraseña = $Contraseña;
            } else {
                throw new Exception("Contraseña no válida:".$Contraseña, 1);
            }
        }

        //Gets
        public function getContraseña() {
            return $this->Contraseña;
        }

        public function getNombre() {
            return $this->Nombre;
        }
    }
?>