<?php
include_once('Clases/categorias.php');
include_once('Tablas.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Modificar'])) {
        //Modificando
        $Cat = new categoria (
            isset($_POST['ID']) ? $_POST['ID'] : '',
            isset($_POST['Nombre']) ? $_POST['Nombre'] : '',
            '',
            isset($_POST['Activo']) ? $_POST['Activo'] : ''
        );
        $Cat->ActualizarCategoria();
    }
    elseif (isset($_POST['Eliminar'])) {
        $Cat = new categoria(
            isset($_POST['ID']) ? $_POST['ID'] : ''
        );
        $Cat->EliminarCategoria();
    }
    elseif (isset($_POST['Registrar'])) {
        session_start();
        $Usuario = new usuario('', $_SESSION['Usuario'], '', $_SESSION['Info']);
        $Usuario = $Usuario->HacerLogin();
        $temp = $Usuario->getID();
        $Cat = new Categoria(
            '',
            isset($_POST['Nombre']) ? $_POST['Nombre'] : '',
            (int) $temp,
            ''
        );
        $Cat->RegistrarCategoria();
    }
    if (isset($Cat)) {
        if ($Cat->getError()) {
            echo 'ERROR';
        } else {
            $Tabla = new TablaInfo('categoria');
            $Tabla->getTabla();
        }
    }
}
?>