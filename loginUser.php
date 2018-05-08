<?php
    session_start();
    include_once('php/Clases/usuario.php');
    //Inicio de Sesión
    $luser = "";
    $lpass = "";
    if (isset($_POST['login'])) {
        $luser = isset($_POST['user']) ? $_POST['user'] : "";
        $lpass = isset($_POST['pass']) ? $_POST['pass'] : "";
        try {
            $Usuario = new usuario('', $luser, '', $lpass);
            $Existe = $Usuario->existeUsuario();
            if ($Existe) {
                $Usuario = $Usuario->hacerLogin();
                if ($Usuario) {
                    $_SESSION['Sesion'] = true;
                    $_SESSION['Nombre'] = $Usuario->getNombre();
                    $_SESSION['Empleado'] = true;
                    $_SESSION['Info'] = $Usuario->getContraseña();
                    $_SESSION['Usuario'] = $Usuario->getUsuario();
                    if (isset($_SESSION['URL_Origen'])) {
                        header('Location: '.$_SESSION['URL_Origen']);
                    } else {
                        if ($Usuario->getPuesto() == 'Administrador')
                            header('Location: Manage?Tabla=usuario');
                        else
                            header('Location: Index');
                    }
                    exit();
                } else {
                    $ContraseñaIncorrecta = true;
                }
            } else {
                $NoExiste = true;
            }
        }
        catch (Exception $e) {
            $MensajeError = $e->getMessage();
        }
    }
?>
<!DOCTYPE HTML>
<html>

<head>
    <?php
	include_once('php/head.php');
    ?>
    <title>Login - TecnoCompra</title>
</head>

<body>

    <div class="colorlib-loader"></div>

    <div id="page">
        <?php
        include_once('php/header.php');
        ?>
        <aside id="colorlib-hero" class="breadcrumbs">
            <div class="flexslider">
                <ul class="slides">
                    <li style="background-image: url(images/baner19.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h1> Iniciar Sesión</h1>
                                        <h2 class="bread"><span><a href="index.html"><i class="icon-home"></i></a></span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="colorlib-shop">
            <div class="container">
                <div class="col-md-8 col-md-offset-2">
                    <form action="" method="POST" class="colorlib-form">
                        <div class="row">
                            <h2 class="text-center">TecnoCompra: Iniciar Sesión</h2>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="User">Usuario:</label>
                                    <input type="text" name="user" id="user" class="form-control"
                                    value="<?php echo $luser; ?>"
                                    maxlength="100"
                                    placeholder="Usuario" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pass">Contraseña:</label>
                                    <input type="password" name="pass" id="pass" class="form-control"
                                    minlength="8" maxlength="16"
                                    placeholder="Contraseña" required>
                                </div>
                            </div>
                            <div class="col-12 pull-right">
                                <input type="submit" name="login" value="Iniciar Sesión" class="btn btn-primary">
                                <!--<a href="#" class="btn btn-primary">Iniciar Sesión</a>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="colorlib-subscribe">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="col-md-12 text-center">
                            <h3>
                                <i class="icon-paperplane"></i>¡Entérate de todo lo que pasa!</h3>
                            <h4>Nuevos productos y ofertas </h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php
        include_once('php/footer.php');
        ?>
    <?php
    include_once('php/clases/alerta.php');
    if (isset($NoExiste))
    if ($NoExiste) {
        $temp = new alerta('ERROR', 'No existe el Usuario '.$luser.' en nuestra base de datos',
        'dark', 'red', 'icon icon-warning');
        $temp->MostrarAlerta();
    }
    if (isset($ContraseñaIncorrecta))
    if ($ContraseñaIncorrecta) {
        $temp = new alerta('ERROR', 'Contraseña incorrecta',
        'dark', 'red', 'icon icon-close');
        $temp->MostrarAlerta();
    }
    ?>
</body>
</html>