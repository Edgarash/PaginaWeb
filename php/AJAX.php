<?php
include_once('Clases/usuario.php');
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
        $Usuario = new usuario(
            isset($_POST['ID']) ? $_POST['ID'] : ''
        );
        $Usuario->EliminarUsuario();
    }
    elseif (isset($_POST['Registrar'])) {
        $Usuario = new usuario(
            '',
            isset($_POST['Usuario']) ? $_POST['Usuario'] : '',
            isset($_POST['Puesto']) ? $_POST['Puesto'] : '',
            isset($_POST['Contraseña']) ? $_POST['Contraseña'] : '',
            isset($_POST['Nombre']) ? $_POST['Nombre'] : '',
            isset($_POST['Apellidos']) ? $_POST['Apellidos'] : '',
            isset($_POST['Telefono']) ? $_POST['Telefono'] : '',
            isset($_POST['Email']) ? $_POST['Email'] : '',
            '',
            ''
        );
        $Usuario->registrarUsuario();
    }
    $Tabla = new TablaInfo('usuario');
    $Tabla->getTabla();
}
?>