<?php
include_once('Clases/validaciones.php');
include_once('Clases/imagenes.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $IMAGENES = '../images/';
    if (isset($_POST['Modificar'])) {
        $Direccion = $IMAGENES.$_POST['Nombre'];
        $Check = getimagesize($_FILES['files']['tmp_name']);
        if ($Check !== false) {
            if (move_uploaded_file($_FILES['files']['tmp_name'], $Direccion)) {
                echo '1 Archivo subido';
            } else {
                echo '0 No subido';
                #echo '<br>'.$_FILES['files']['tmp_name'].'<br>';
                #echo $Direccion;
            }
        } else {
            echo '0 El archivo no es una imagen';
        }
    }
}
?>