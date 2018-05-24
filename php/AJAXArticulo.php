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
            (isset($_POST['SubCategorias']) ? $_POST['SubCategorias'] : ''),
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
    //Registrar un Artículo
    elseif (isset($_POST['Registrar'])) {
        $IMAGENES = '../images/articulos/';
        session_start();
        $Usuario = new usuario('', $_SESSION['Usuario'], '', $_SESSION['Info']);
        $Usuario = $Usuario->HacerLogin();
        $temp = $Usuario->getID();
        var_dump($_POST);
        $Articulo = new articulo(
            '',
            isset($_POST['Nombre']) ? $_POST['Nombre'] : '',
            isset($_POST['Precio']) ? $_POST['Precio'] : '',
            isset($_POST['Caracteristicas']) ? $_POST['Caracteristicas'] : '',
            isset($_POST['Descripcion']) ? $_POST['Descripcion'] : '',
            isset($_POST['Stock']) ? $_POST['Stock'] : '',
            isset($_POST['SubCategorias']) ? $_POST['SubCategorias'] : '',
            isset($temp) ? $temp : '',
            '',
            ''
        );
        $ID = $Articulo->registrarArticulo();
        var_dump($ID);
        if ($ID) {
            $i = 1; $j = 1;
            foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
                if ($_FILES['files']['tmp_name'][$key]) {
                    $archivo = $_FILES['files']['name'][$key];
                    $temp = explode('.', $archivo);
                    $ext = end($temp);
                    $filename = $ID.'_'.$i.'.'.$ext;

                    $Check = getimagesize($_FILES['files']['tmp_name'][$key]);
                    if ($Check !== false) {
                        if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $IMAGENES.$filename)) {
                            echo 'Imagen '.$j.' subida<br>';
                        } else {
                            echo 'Imagen '.$j.' no subida<br>';
                        }
                    } else {
                        echo 'Archivo '.$j.' no es imagen<br>';
                    }
                    $j++;
                }
            }
        } else {
            echo 'ERROR: Artículo no insertado';
        }
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