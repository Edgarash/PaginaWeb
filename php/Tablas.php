<?php
include_once('Clases/usuario.php');
include_once('Clases/imagenes.php');
class TablaInfo {
    private $Tabla;
    private $Index;

    function __construct() {
        $this->setVacios();
        $params = func_get_args();
        $num_params = func_num_args();
        $funcion_constructor = '__construct'.$num_params;
        if (method_exists($this, $funcion_constructor)) {
            call_user_func_array(array($this, $funcion_constructor), $params);
        }
    }

    function __construct1($Tabla) {
        $this->Tabla = $Tabla;
    }

    public function getTabla() {
        $temp = $this->Tabla;
        if (!empty($temp)) {
            $this->AbrirTabla();
            if ($temp === 'usuario') {
                $this->TablaUsuarios();
            } elseif ($temp === 'imagenes') {
                $this->TablaImgPrincipal();
            }
            $this->CerrarTabla();
        }
    }

    private function setVacios() {
        $this->Tabla = ""; $this->Index = 1;
    }

    private function TablaImgPrincipal() {
        $temp = ObtenerPrincipales();
        foreach ($temp as $Imagen) {
            $URL = _IMAGENES.$Imagen->getURL();
            $Nombre = $Imagen->getNombre();
            echo '<div idd="'.$Imagen->getID().'" url="'.$Imagen->getURL().'"><h4><i class="fa fa-edit selectable-link"></i> '.$Nombre.'</h4>';
            echo '<div style="margin:10px 0;">
                <img style="max-width:100%" src="'.$URL.'" alt="'.$Nombre.'">
            </div></div>';
            echo '<hr>';
        }
        unset($Imagen);
    }

    private function TablaUsuarios() {
        echo '<thead><tr>'.
                '<th>ID</th>'.
                '<th>Usuario</th>'.
                '<th>Puesto</th>'.
                #'<th>Contraseña</th>'.
                '<th>Nombre</th>'.
                '<th>Apellidos</th>'.
                '<th>Teléfono</th>'.
                '<th>Email</th>'.
                '<th>Fecha de Alta</th>'.
                #'<th>Activo</th>'.
                '<th>Acciones</th>'.
            '</tr></thead><tbody>';
        $temp = ObtenerUsuarios();
        foreach ($temp as $usuario) {
            $Activ = ($usuario->getActivo() == 1);
            echo '<tr class="'.($Activ ? 'success' : 'danger').'">'.
            '<th>'.$usuario->getID().'</th>'.
            '<th>'.$usuario->getUsuario().'</th>'.
            '<th>'.$usuario->getPuesto().'</th>'.
            #'<th>'.$usuario->getContraseña().'</th>'.
            '<th>'.$usuario->getNombre().'</th>'.
            '<th>'.$usuario->getApellidos().'</th>'.
            '<th>'.$usuario->getTelefono().'</th>'.
            '<th>'.$usuario->getEmail().'</th>'.
            '<th>'.$usuario->getFechaAlta().'</th>'.
            #'<th>'.$usuario->getActivo().'</th>'.
            '<th class="text-center">'.
            '<i class="fa fa-edit selectable-link""></i> '.
            ($Activ ? '<i class="fa fa-trash selectable-link"></i>' : '').
            '</th></tr>';
        }
        echo '</tbody>';
        unset($usuario);
    }
    
    private function AbrirTabla() {
        echo '<div class="container col-md-11 table-responsive" style="margin: 0 auto;float:none;">
        <table class="table table-bordered table-condensed col-md-12" style="background:white">';
    }
    
    private function CerrarTabla() {
        echo '</table></div>';
    }
}
?>