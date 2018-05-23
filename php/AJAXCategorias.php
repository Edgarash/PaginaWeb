<?php
include_once 'Clases/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
} else {
    if (isset($_GET['opcion'])) {
        $SQL = 'SELECT ID, NOMBRE FROM CATEGORIA;';
        $STMT = ConectarBD($SQL);
        $STMT->execute();
        while ($fila = $STMT->fetch()) {
            $temp = new stdClass();
            $temp->ID = $fila['ID'];
            $temp->Nombre = $fila['NOMBRE'];
            $Resultado[] = $temp;
        }
        echo '<select>';
        foreach ($Resultado as $Cat) {
            echo '<option value="'.$Cat->ID.'">'.$Cat->Nombre.'</option>';
        }
        echo '</select>';
    }
}
?>