<?php
include_once('Clases/cliente.php');
include_once('Clases/validaciones.php');
include_once('Clases/usuario.php');
include_once('Clases/imagenes.php');
include_once('Clases/articulos.php');
include_once('Clases/Categorias.php');

echo '<h1>';
$temp = ObtenerClientes();
echo json_encode(get_object_vars($temp));
//$temp ="";
//session_start();
//if (isset($_SESSION['Empleado']) && !empty($_SESSION['Empleado'])) {
//    $Usuario = new usuario('', $_SESSION['Usuario'], '', $_SESSION['Info']);
//    $Usuario = $Usuario->HacerLogin();
//    $temp = $Usuario->getID();
//}

echo '</h1>';
var_dump($temp);
//$cliente->{registrarCliente('edgar1.31896@gmail.com','123','Michell','Cisneros')};
?>