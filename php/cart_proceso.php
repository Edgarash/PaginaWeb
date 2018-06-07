<?php
session_start();
$pantallaproviene = "";
$carrito = 0;
include_once('Clases/conexion.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $GLOBALS['carrito'] = 1;
    if(isset($_POST['btnBorrar'])){
        examinar();
    }
    
    
    elseif(isset($_POST['enviar'])){
        $GLOBALS['carrito'] = $_REQUEST["carrito"];
        echo $GLOBALS['carrito'];
        UsuarioCompleto(0);
    }
    elseif(isset($_POST['actualizar'])){
        actualizar();
    }
    elseif(isset($_POST['anadir'])){
        $cantidad = $_POST['cantidad'];
        $IdCliente = $_POST['IdCliente'];
        $IdArticulo = $_POST['IdArticulo'];

        try {
            $SQL = "INSERT INTO carrito VALUES (:ID, :IDART, :CANTIDAD)";
            $conex = new conexion();
            $Conn = $conex->conectar();
            $STMT = $Conn->prepare($SQL);
            $STMT->bindParam(':ID', $IdCliente);
            $STMT->bindParam(':IDART', $IdArticulo);
            $STMT->bindParam(':CANTIDAD', $cantidad);
            $STMT->execute();

            header("Location:/cart"); 
            exit();

        } catch (PDOExeption $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
        }
        
    }
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $Cantidad = $_REQUEST["q"];
    $idArt = $_REQUEST["ida"];
    $idcli = $_REQUEST["idc"];

    try {
        $SQL = "UPDATE `carrito` SET `cantidad` = :cantidad WHERE `idart` = :idArticulo AND `id` = :idUser;";
        $conex = new conexion();
        $Conn = $conex->conectar();
        $STMT = $Conn->prepare($SQL);
        $STMT->bindParam(':cantidad', $Cantidad);
        $STMT->bindParam(':idArticulo', $idArt);
        $STMT->bindParam(':idUser', $idcli);
        
        $STMT->execute();
    } catch (PDOExeption $e) {
        echo "ERROR: ".$SQL."<br>".$e->getMessage();
    }

}

function examinar(){
    $idArt = $_POST['IDArticulo'];
    $id = $_POST['IDCliente'];
    try {
        $SQL = "DELETE FROM carrito where id = :id and IDArt = :idart;";
        $conex = new conexion();
        $Conn = $conex->conectar();
        $STMT = $Conn->prepare($SQL);
        $STMT->bindParam(':id', $id);
        $STMT->bindParam(':idart', $idArt);
        $STMT->execute();
    } catch (PDOExeption $e) {
        echo "ERROR: ".$SQL."<br>".$e->getMessage();
    }
    var_dump($_POST);
    #header("Location:/cart.php"); 
    #exit();
}

function UsuarioCompleto($camino){
    $IDcliente = $_SESSION['ID'];
    $val = true;
    try {
        $cliente =  array();
        $SQL = "SELECT * FROM cliente where id = :idc ";
        $conex = new conexion();
        $Conn = $conex->conectar();
        $STMT = $Conn->prepare($SQL);
        $STMT->bindParam(':idc', $IDcliente);
        $STMT->execute();
        while ($fila = $STMT->fetch()) {
            array_push($cliente,$fila['ID']);
            array_push($cliente,$fila['Email']);
            array_push($cliente,$fila['Contrasena']);
            array_push($cliente,$fila['Nombre']);
            array_push($cliente,$fila['Apellidos']);
            array_push($cliente,$fila['Telefono']);
            array_push($cliente,$fila['NumExterior']);
            array_push($cliente,$fila['NumInterior']);
            array_push($cliente,$fila['Calle']);
            array_push($cliente,$fila['EntreCalles']);
            array_push($cliente,$fila['Referencia']);
            array_push($cliente,$fila['CP']);
            array_push($cliente,$fila['Colonia']);
            array_push($cliente,$fila['Municipio']);
            array_push($cliente,$fila['Estado']);
        }
    } catch (PDOExeption $e) {
        echo "ERROR: ".$SQL."<br>".$e->getMessage();
    }
    
    $i = 0;
    while($i < count($cliente)){
        if($cliente[$i] == ""){
            $val = false;
        }
        $i++;
    }
    if($camino == 0){
        if($val){
            header("Location:/checkout.php"); 
            exit(); 
        }        
        else{
            header("Location:/profile.php"); 
            exit(); 
        }
    }
    elseif($camino == 1){
        
        if(isset($_SESSION['carrito'])){
            unset($_SESSION['carrito']);
            header("Location:/checkout.php"); 
            exit();
            
        }
        else{
            
            header("Location:/profile.php"); 
            exit();
            
        }
        
        
    }
}

function actualizar(){

    
    $IDcliente = $_SESSION['ID'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $tel = $_POST['tel'];
    $calle = $_POST['calle'];
    $next = $_POST['next'];
    $nint = $_POST['nint'];
    $ecalles = $_POST['ecalles'];
    $ref = $_POST['ref'];
    $cp = $_POST['cp'];
    $col = $_POST['col'];
    $mun = $_POST['mun'];
    $est = $_POST['est'];
    $val = true;
    try {
        $cliente =  array();
        $SQL = "UPDATE CLIENTE SET Email = :Email, Nombre = :nombre, Apellidos = :apellidos, Telefono = :telefono,
        NumExterior = :NumExterior, NumInterior = :NumInterior, Calle = :Calle, EntreCalles = :EntreCalles,
        Referencia = :Referencia, CP = :CP, Colonia = :Colonia,Municipio = :Municipio,
        Estado = :Estado WHERE ID =:ID ";
        $conex = new conexion();
        $Conn = $conex->conectar();
        $STMT = $Conn->prepare($SQL);
        $STMT->bindParam(':Email', $email);
        $STMT->bindParam(':nombre', $fname);
        $STMT->bindParam(':apellidos', $lname);
        $STMT->bindParam(':telefono', $tel);
        $STMT->bindParam(':NumExterior', $next);
        $STMT->bindParam(':NumInterior', $nint);
        $STMT->bindParam(':Calle', $calle);
        $STMT->bindParam(':EntreCalles', $ecalles);
        $STMT->bindParam(':Referencia', $ref);
        $STMT->bindParam(':CP', $cp);
        $STMT->bindParam(':Colonia', $col);
        $STMT->bindParam(':Municipio', $mun);
        $STMT->bindParam(':Estado', $est);
        $STMT->bindParam(':ID', $IDcliente);
        $STMT->execute();
        
    } catch (PDOExeption $e) {
        echo "ERROR: ".$SQL."<br>".$e->getMessage();
    }

    UsuarioCompleto(1);

}
?>