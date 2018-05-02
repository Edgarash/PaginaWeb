<?php
    class Alerta {
        public $Titulo;
        public $Mensaje;
        public $Tipo;
        public $Tema;
        public $Icono;

        function __construct() {
            $this->Icono = "";
            $this->Titulo = "Titulo"; $this->Mensaje = "Mensaje";
            $this->Tipo = "dark"; $this->Tema = "material";
            $params = func_get_args();
            $num_params = func_num_args();
            $funcion_constructor = '__construct'.$num_params;
            if (method_exists($this, $funcion_constructor)) {
                call_user_func_array(array($this, $funcion_constructor), $params);
            }
        }

        private function __construct2($Titulo, $Mensaje) {
            $this->Titulo = $Titulo; $this->Mensaje = $Mensaje;
        }

        private function __construct3($Titulo, $Mensaje, $Tema) {
            $this->__construct2($Titulo, $Mensaje);
            $this->Tema = $Tema;
        }

        private function __construct4($Titulo, $Mensaje, $Tema, $Tipo) {
            $this->__construct3($Titulo, $Mensaje, $Tema);
            $this->Tipo = $Tipo;
        }

        private function __construct5($Titulo, $Mensaje, $Tema, $Tipo, $Icono) {
            $this->__construct4($Titulo, $Mensaje, $Tema, $Tipo);
            $this->Icono = $Icono;
        }

        public function MostrarAlerta() {
            echo "
                <script>
                    $.dialog({
                        icon: '$this->Icono',
                        columnClass: 'col-md-6',
                        containerFluid: true,
                        useBootstrap: false,
                        animationBounce: 3.5,
                        draggable: false,
                        escapeKey: true,
                        backgroundDismiss: true,
                        theme: '$this->Tema',
                        title: '$this->Titulo',
                        type: '$this->Tipo',
                        content: '$this->Mensaje',
                    });
                </script>
            ";
        }
    }
?>