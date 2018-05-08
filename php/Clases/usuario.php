<?php
    include_once('conexion.php');
    include_once('validaciones.php');
    class Usuario {
        private $ID;
        private $Usuario;
        private $Puesto;
        private $Contraseña;
        private $Nombre;
        private $Apellidos;
        private $Telefono;
        private $Email;
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

        function __construct1($ID) {
            $this->ID = $ID;
        }

        function __construct4($ID, $Usuario, $Puesto, $Contraseña) {
            $this->__construct1($ID); $this->Usuario = $Usuario;
            $this->Puesto = $Puesto; $this->Contraseña = $Contraseña;
        }

        private function __construct10(
            $ID, $Usuario, $Puesto, $Contraseña,
            $Nombre, $Apellidos, $Telefono, $Email,
            $FechaAlta, $Activo) {
                $this->__construct4($ID, $Usuario, $Puesto, $Contraseña);
                $this->Nombre = $Nombre; $this->Apellidos = $Apellidos;
                $this->Telefono = $Telefono; $this->Email = $Email;
                $this->FechaAlta = $FechaAlta; $this->Activo = $Activo;
        }

        public function RegistrarUsuario() {
            try {
                $SQL = "INSERT INTO USUARIO (Usuario, Puesto, Contrasena, Nombre, Apellidos, ".
                "Telefono, Email, FechaAlta) VALUES (:Usuario, :Puesto, :Contrasena, :Nombre".
                ", :Apellidos, :Telefono, :Email, :FechaAlta);";
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $STMT->bindParam(':Usuario', $this->Usuario);
                $STMT->bindParam(':Puesto', $this->Puesto);
                $STMT->bindParam(':Contrasena', $this->Contraseña);
                $STMT->bindParam(':Nombre', $this->Nombre);
                $STMT->bindParam(':Apellidos', $this->Apellidos);
                $STMT->bindParam(':Telefono', $this->Telefono);
                $STMT->bindParam(':Email', $this->Email);
                $Fecha = date('Y-m-d');
                $STMT->bindParam(':FechaAlta', $Fecha);
                $STMT->execute();
                $fila = $STMT->rowCount();
            } catch (PDOException $e) {
                echo "ERROR: ".$SQL."<br>".$e->getMessage();
            }
        }

        public function existeUsuario() {
            try {
                $SQL = "SELECT Usuario FROM Usuario WHERE Usuario = :Usuario AND Activo = 1;";
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $STMT->bindParam(':Usuario', $this->Usuario);
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
                $SQL = "SELECT * FROM Usuario WHERE Usuario = :Usuario AND Activo = 1";
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $STMT->bindParam(":Usuario", $this->Usuario);
                if ($this->existeUsuario()) {
                    $STMT->execute();
                    $fila = $STMT->fetch();
                    $User = new usuario(
                        $fila['ID'], $fila['Usuario'], $fila['Puesto'], $fila['Contrasena'],
                        $fila['Nombre'], $fila['Apellidos'], $fila['Telefono'],
                        $fila['Email'], $fila['FechaAlta'], $fila['Activo']
                    );
                    print $this->Contraseña.' vs '.$User->getContraseña();
                    if ($this->Contraseña === $User->getContraseña()) {
                        return $User;
                    } else {
                        return false;
                    }
                    return $User;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "ERROR: ".$SQL."<br>".$e->getMessage();
            }
        }

        private function setVacios() {
            $this->ID = ""; $this->Usuario = "";
            $this->Puesto = ""; $this->Contraseña = "";
            $this->Nombre = ""; $this->Apellidos = "";
            $this->Telefono = ""; $this->Email = "";
            $this->FechaAlta = ""; $this->Activo = "";
        }

        public function ActualizarUsuario() {
            try {
                $temp = ($this->Activo == 'true' ? 1 : 0);
                $SQL = "UPDATE Usuario SET ".
                "Puesto = :Puesto, Nombre = :Nombre, Apellidos = :Apellidos, ".
                "Telefono = :Telefono, Email = :Email, Activo = $temp ".
                (empty($this->getContraseña()) ? '' : 'Contrasena = :Contraseña').
                ' WHERE Usuario.ID = :ID;';
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $STMT->bindParam(':Puesto', $this->Puesto);
                $STMT->bindParam(':Nombre', $this->Nombre);
                $STMT->bindParam(':Apellidos', $this->Apellidos);
                $STMT->bindParam(':Telefono', $this->Telefono);
                $STMT->bindParam(':Email', $this->Email);
                #$STMT->bindParam(':Activo', $temp);
                if (!empty($this->getContraseña()))
                    $STMT->bindParam(':Contraseña', $this->Contraseña);
                $STMT->bindParam(':ID', $this->ID);
                $STMT->execute();
                return 'Modificacion Lograda';
            } catch (PDOException $e) {
                echo "ERROR: ".$SQL."<br>".$e->getMessage();
            }
        }

        public function EliminarUsuario() {
            try {
                #$SQL = "DELETE FROM USUARIO WHERE ID = :ID";
                $SQL = "UPDATE USUARIO SET Activo = 0 WHERE ID = :ID;";
                $conex = new conexion();
                $Conn = $conex->conectar();
                $STMT = $Conn->prepare($SQL);
                $STMT->bindParam(':ID', $this->ID);
                $STMT->execute();
                'Eliminacion Lograda';
            } catch (PDOException $e) {
                echo "ERROR: ".$SQL."<br>".$e->getMessage();
            }
        }
        
        #GET's
        public function getID() {
            return $this->ID;
        }
        public function getUsuario() {
            return $this->Usuario;
        }
        public function getPuesto() {
            return $this->Puesto;
        }
        public function getContraseña() {
            return $this->Contraseña;
        }
        public function getNombre() {
            return $this->Nombre;
        }
        public function getApellidos() {
            return $this->Apellidos;
        }
        public function getTelefono() {
            return $this->Telefono;
        }
        public function getEmail() {
            return $this->Email;
        }
        public function getFechaAlta() {
            return $this->FechaAlta;
        }
        public function getActivo() {
            return $this->Activo;
        }
    }

    function ObtenerUsuarios() {
        $Resultado = array();
        try {
            $SQL = "SELECT * FROM Usuario;";
            $conex = new conexion();
            $Conn = $conex->conectar();
            $STMT = $Conn->prepare($SQL);
            $STMT->execute();
            while ($fila = $STMT->fetch()) {
                $User = new Usuario(
                    $fila['ID'], $fila['Usuario'],
                    $fila['Puesto'], $fila['Contrasena'],
                    $fila['Nombre'], $fila['Apellidos'],
                    $fila['Telefono'], $fila['Email'],
                    $fila['FechaAlta'], $fila['Activo']
                );
                $Resultado[] = $User;
            }
        } catch (PDOExeption $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
        }
        return $Resultado;
    }
?>