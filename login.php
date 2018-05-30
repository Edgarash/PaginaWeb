<?php
    session_start();
    include_once('php/Clases/cliente.php');
    $fname = ""; $lname = ""; $remail = ""; $rpass = ""; $Registrado = ""; $Anterior = "";
    if (isset($_POST['registrar'])) {
        $fname = isset($_POST['fname']) ? $_POST['fname'] : "";
        $lname = isset($_POST['lname']) ? $_POST['lname'] : "";
        $remail = isset($_POST['email']) ? $_POST['email'] : "";
        $rpass = isset($_POST['pass']) ? $_POST['pass'] : "";
        $Cliente = new cliente($remail, $rpass, $fname, $lname);
        $Anterior = $Cliente->ExisteCliente();
        if (!$Anterior) {
            $Registrado = $Cliente->RegistrarCliente();
            $fname = !$Registrado ? $_POST['fname'] : "";
            $lname = !$Registrado ? $_POST['lname'] : "";
            $remail = !$Registrado ? $_POST['email'] : "";
        }
    }
    //Inicio de Sesión
    $lemail = "";
    $lpass = "";
    if (isset($_POST['login'])) {
        //print '<h1 style="position:absolute;">llego</h1>';
        $lemail = isset($_POST['email']) ? $_POST['email'] : "";
        $lpass = isset($_POST['pass']) ? $_POST['pass'] : "";
        try {
            $Cliente = new cliente($lemail, $lpass);
            $Existe = $Cliente->existeCliente();
            if ($Existe) {
                $Cliente = $Cliente->hacerLogin();
                if ($Cliente) {
                    $_SESSION['Sesion'] = true;
                    $_SESSION['Nombre'] = $Cliente->getNombre();
                    $_SESSION['ID'] = $Cliente->getID();
                    if (isset($_SESSION['URL_Origen'])) {
                        header('Location: '.$_SESSION['URL_Origen']);
                    } else {
                        header('Location: Profile');
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
                                        <h2 class="bread"><span><a href="index"><i class="icon-home"></i></a></span></h2>
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
                <div class="col-md-6">
                    <form action="" method="post" class="colorlib-form">
                        <h2>Regístrate</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="fname">Nombre(s)</label>
                                            <input type="text" name="fname" id="fname" class="form-control"
                                            maxlength="100"
                                            placeholder="Su Nombre" value="<?php echo $fname; ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lname">Apellidos</label>
                                            <input type="text" name="lname" id="lname" class="form-control"
                                            maxlength="100"
                                            placeholder="Sus Apellidos" value="<?php echo $lname; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                            maxlength="100"
                                            placeholder="Email" value="<?php echo $remail; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="pass">Contraseña</label>
                                            <input type="password" name="pass" id="pass" class="form-control"
                                            minlength="8" maxlength="16"
                                            placeholder="Contraseña" required>
                                        </div>
                                    </div>
                                    <div class="col-12 pull-right">
                                        <input type="submit" name="registrar" value="Registrar" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
                <div class="col-md-6">
                    <form action="" method="POST" class="colorlib-form">
                        <div class="row">
                            <h2>¿Ya tienes cuenta?... Inicia Sesión!</h2>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                    value="<?php echo $lemail; ?>"
                                    maxlength="100"
                                    placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pass">Contraseña</label>
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
    //if (true) {
    if (isset($Registrado))
    if ($Registrado) {
        $temp = new alerta('REGISTRO EXITOSO!', 'Bienvenido a TecnoCompra.com!!!',
        'material', 'dark', 'icon icon-check-square');
        $temp->MostrarAlerta();
    }
    if(isset($Anterior))
    if ($Anterior) {
        $temp = new alerta('UPS! HUBO UN PROBLEMA', 'El correo '.$remail.' ya fue registrado anteriormente',
        'dark', 'red', 'icon icon-warning');
        $temp->MostrarAlerta();
    }
    if (isset($NoExiste))
    if ($NoExiste) {
        $temp = new alerta('ERROR', 'No existe el correo '.$lemail.' en nuestra base de datos',
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