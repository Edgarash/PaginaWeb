<?php
include_once('Clases/cliente.php');
include_once('Clases/validaciones.php');
include_once('Clases/usuario.php');
include_once('Clases/imagenes.php');
echo '<h1>';
$temp = ObtenerUsuarios();
echo json_encode(get_object_vars($temp));
echo '</h1>';
//$cliente->{registrarCliente('edgar1.31896@gmail.com','123','Michell','Cisneros')};
?>