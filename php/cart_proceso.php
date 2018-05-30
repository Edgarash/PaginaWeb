<?php
  include_once('Clases/conexion.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

   
}
header("Location:/cart.php"); 
exit();
?>