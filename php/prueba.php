<?php
include_once('Clases/cliente.php');
include_once('Clases/validaciones.php');

$temp = new cliente('edgar.31896@gmail.com','Tsubasa$5');
$result = $temp->hacerLogin();

$val = new validaciones();
#$temp = $temp->ExisteCliente();
echo '<h1>';
print_r($result);
echo '</h1>';
//$cliente->{registrarCliente('edgar1.31896@gmail.com','123','Michell','Cisneros')};
?>