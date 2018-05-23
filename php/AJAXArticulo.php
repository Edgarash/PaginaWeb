<?php
include_once('Clases/articulos.php');
include_once('Tablas.php');
$IMAGENES = '../images/';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Modificar'])) {
        //Modificando
        $Articulo = new articulo(
            (isset($_POST['ID']) ? $_POST['ID'] : ''),
            (isset($_POST['Nombre']) ? $_POST['Nombre'] : ''),
            (isset($_POST['Precio']) ? $_POST['Precio'] : ''),
            (isset($_POST['Caracteristicas']) ? $_POST['Caracteristicas'] : ''),
            (isset($_POST['Descripcion']) ? $_POST['Descripcion'] : ''),
            (isset($_POST['Stock']) ? $_POST['Stock'] : ''),
            (isset($_POST['IDSubCat']) ? $_POST['IDSubCat'] : ''),
            (isset($_POST['IDEmpAlta']) ? $_POST['IDEmpAlta'] : ''),
            (isset($_POST['FechaAlta']) ? $_POST['FechaAlta'] : ''),
            (isset($_POST['Activo']) ? $_POST['Activo'] : '')
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
        #$Articulo = new articulo(
        #    isset($_POST['ID']) ? $_POST['ID'] : '',
        #    isset($_POST['Nombre']) ? $_POST['Nombre'] : '',
        #    isset($_POST['Precio']) ? $_POST['Precio'] : '',
        #    isset($_POST['Caracteristicas']) ? $_POST['Caracteristicas'] : '',
        #    isset($_POST['Descripcion']) ? $_POST['Descripcion'] : '',
        #    isset($_POST['Stock']) ? $_POST['Stock'] : '',
        #    isset($_POST['IDSubCat']) ? $_POST['IDSubCat'] : '',
        #    isset($_POST['IDEmpAlta']) ? $_POST['IDEmpAlta'] : '',
        #    isset($_POST['FechaAlta']) ? $_POST['FechaAlta'] : '',
        #    isset($_POST['Activo']) ? $_POST['Activo'] : 1
        #);
        #$Usuario->registrarUsuario();
        echo 'Registrado pariente';
    }
    #if (isset($Usuario)) {
    #    if ($Usuario->getError()) {
    #        echo 'ERROR';
    #    } else {
    #        $Tabla = new TablaInfo('usuario');
    #        $Tabla->getTabla();
    #    }
    #}
}
?>