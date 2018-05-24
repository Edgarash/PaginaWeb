<?php
session_start();
include_once('Clases/SubCategorias.php');
include_once('Tablas.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Modificar'])) {
        //Modificando
        $subCat = new subcategoria (
            isset($_POST['ID']) ? $_POST['ID'] : '',
            isset($_POST['Nombre']) ? $_POST['Nombre'] : '',
            isset($_POST['IDCat']) ? $_POST['IDCat'] : '',
            isset($_POST['Activo']) ? $_POST['Activo'] : '',
            ''
        );
        $subCat->ActualizarSubCategoria();
    }
    elseif (isset($_POST['Eliminar'])) {
        $subCat = new subcategoria(
            isset($_POST['ID']) ? $_POST['ID'] : ''
        );
        $subCat->EliminarCategoria();
    }
    elseif (isset($_POST['Registrar'])) {
        $Usuario = new usuario('', $_SESSION['Usuario'], '', $_SESSION['Info']);
        $Usuario = $Usuario->HacerLogin();
        $temp = $Usuario->getID();
        $subCat = new subCategoria(
            '',
            isset($_POST['Nombre']) ? $_POST['Nombre'] : '',
            isset($_POST['IDCat']) ? $_POST['IDCat'] : '',
            1,
            $temp
        );
        $subCat->RegistrarSubCategoria();
    }
    if (isset($subCat)) {
        if ($subCat->getError()) {
            var_dump($subCat);
            echo 'ERROR';
        } else {
            $Tabla = new TablaInfo('subcategoria');
            $Tabla->getTabla();
        }
    }
}
?>