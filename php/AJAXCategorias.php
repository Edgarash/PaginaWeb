<?php
include_once 'Clases/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
} else {
    if (isset($_GET['getCategorias'])) {
        $SQL = 'SELECT ID, NOMBRE FROM CATEGORIA;';
        $STMT = ConectarBD($SQL);
        $STMT->execute();
        while ($fila = $STMT->fetch()) {
            $temp = new stdClass();
            $temp->ID = $fila['ID'];
            $temp->Nombre = $fila['NOMBRE'];
            $Resultado[] = $temp;
        }
        echo '<option value="">Seleccione una Categoria</option>';
        foreach ($Resultado as $Cat) {
            echo '<option value="'.$Cat->ID.'">'.$Cat->Nombre.'</option>';
        }
    } elseif(isset($_GET['getSubCategorias']) && isset($_GET['ID']) && !empty($ID = $_GET['ID'])) {
        $SQL = 'SELECT ID, NOMBRE FROM SUBCATEGORIA WHERE ID = '.$ID.';';
        $STMT = ConectarBD($SQL);
        $STMT->execute();
        while ($fila = $STMT->fetch()) {
            $temp = new stdClass();
            $temp->ID = $fila['ID'];
            $temp->Nombre = $fila['NOMBRE'];
            $Resultado[] = $temp;
        }
        foreach ($Resultado as $Cat) {
            echo '<option value="'.$Cat->ID.'">'.$Cat->Nombre.'</option>';
        }
    }
}
?>