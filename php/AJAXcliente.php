<?php
include_once('Clases/cliente.php');
include_once('Tablas.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Modificar'])) {
        //Modificando
        $Usuario = new usuario(
            isset($_POST['ID']) ? $_POST['ID'] : '',
            isset($_POST['Usuario']) ? $_POST['Usuario'] : '',
            isset($_POST['Puesto']) ? $_POST['Puesto'] : '',
            isset($_POST['Contraseña']) ? $_POST['Contraseña'] : '',
            isset($_POST['Nombre']) ? $_POST['Nombre'] : '',
            isset($_POST['Apellidos']) ? $_POST['Apellidos'] : '',
            isset($_POST['Telefono']) ? $_POST['Telefono'] : '',
            isset($_POST['Email']) ? $_POST['Email'] : '',
            '',
            isset($_POST['Activo']) ? $_POST['Activo'] : ''
        );
        $Usuario->ActualizarUsuario();
    }
    elseif (isset($_POST['Eliminar'])) {
        $Esta = new cliente(
            isset($_POST['ID']) ? $_POST['ID'] : ''
        );
        $Esta->EliminarCliente();
    }
    elseif (isset($_POST['Registrar'])) {
        $Esta = new cliente(
            '9',
            isset($_POST['Email']) ? $_POST['Email'] : '',
            isset($_POST['Contrasena']) ? $_POST['Contrasena'] : '',
            isset($_POST['Nombre']) ? $_POST['Nombre'] : '',
            isset($_POST['Apellidos']) ? $_POST['Apellidos'] : '',
            isset($_POST['Telefono']) ? $_POST['Telefono'] : '',
            isset($_POST['NumExterior']) ? $_POST['NumExterior'] : '',
            isset($_POST['NumInterior']) ? $_POST['NumInterior'] : '',
            isset($_POST['Calle']) ? $_POST['Calle'] : '',
            isset($_POST['EntreCalles']) ? $_POST['EntreCalles'] : '',
            isset($_POST['Referencia']) ? $_POST['Referencia'] : '',
            isset($_POST['CP']) ? $_POST['CP'] : '',
            isset($_POST['Colonia']) ? $_POST['Colonia'] : '',
            isset($_POST['Municipio']) ? $_POST['Municipio'] : '',
            isset($_POST['Estado']) ? $_POST['Estado'] : '',
            '',
            ''
        );
        $Esta->RegistrarUsuario2();
    }
    if (isset($Esta)) {
        if ($Esta->getError()) {
            echo 'ERROR';
        } else {
            $Tabla = new TablaInfo('cliente');
            $Tabla->getTabla();
        }
    }
}
?>