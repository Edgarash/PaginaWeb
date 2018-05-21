<?php
include_once('Clases/cliente.php');
include_once('Clases/validaciones.php');
include_once('Clases/usuario.php');
include_once('Clases/imagenes.php');
include_once('Clases/articulos.php');

echo '<h1>';
$temp = ObtenerArticulos();
echo json_encode(get_object_vars($temp));
echo '</h1>';
var_dump($temp);
//$cliente->{registrarCliente('edgar1.31896@gmail.com','123','Michell','Cisneros')};
?>