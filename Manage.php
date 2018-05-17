<?php
    session_start();
    include_once('php/Tablas.php');
    if (isset($_SESSION['Empleado']) && !empty($_SESSION['Empleado'])) {
        $Usuario = new usuario('', $_SESSION['Usuario'], '', $_SESSION['Info']);
        $Usuario = $Usuario->HacerLogin();
        if ($Usuario->getPuesto() != 'Administrador') {
            header('Location: index');
            exit();
        }
    } else {
        header('Location: index');
        exit();
    }
    $TablasDisponibles = array(
        array('usuario', 'Usuarios', 'fa fa-user'),
        array('articulo', 'Artículos', 'fa fa-shopping-bag'),
        array('categoria', 'Categorías', 'fa fa-cog'),
        array('subcategoria', 'Subcategorías', 'fa fa-cogs'),
        array('cliente', 'Clientes', 'fa fa-address-card'),
        array('imagenes', 'Imágenes', 'fa fa-camera')
    );
    unset($Tabla, $TableName, $TablaActual);
    if (isset($_GET['Tabla'])&& !empty($_GET['Tabla'])) {
        $TableName = $_GET['Tabla'];
        foreach ($TablasDisponibles as $Tablas) {
            if ($Tablas[0] === $TableName) {
                $Tabla = new TablaInfo($TableName);
                $TablaActual = $Tablas;
            }
        }
    }
?>
<!DOCTYPE HTML>
<html>

<head>
    <?php
	include_once('php/head.php');
    ?>
    <title>Administración - TecnoCompra</title>
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
                                        <h1>Administración de Usuarios</h1>
                                        <h2 class="bread">
                                            <span>
                                                <a href="index">
                                                    <i class="icon-home"></i>
                                                </a>
                                            </span>
                                        </h2>
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
                <div class="row">
                    <div class="col-md-3">
                        <div class="sidebar">
                            <div class="side">
                                <h2>Mi Perfil</h2>
                                <div class="fancy-collapse-panel">
                                    <div class="panel-group" role="tablist">
                                        <?php
                                        for ($i=0; $i < count($TablasDisponibles); $i++) {
                                            $Active = (isset($_GET['Tabla']) && !empty($_GET['Tabla']) && $_GET['Tabla']===$TablasDisponibles[$i][0]) ? ' Active' : '';
                                            echo '
                                            <div class="panel panel-default">
                                                <div class="panel">
                                                    <h4 class="panel-title">
                                                        <a href="Manage?Tabla='.$TablasDisponibles[$i][0].'" class="selectable-link'.$Active.'">'.
                                                        '<i class="'.$TablasDisponibles[$i][2].'"></i> '.
                                                        $TablasDisponibles[$i][1].
                                                    '</a>
                                                    </h4>
                                                </div>
                                            </div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="colorlib-form">
                            <div class="row">
                                <?php
                                if (isset($TablaActual))
                                    echo '<h2><i class="'.$TablaActual[2].'"></i> '.$TablaActual[1].'</h2>';
                                ?>
                                <div id="Tabla" class="row">
                                    <?php
                                    if (isset($Tabla))
                                        $Tabla->getTabla();
                                    ?>
                                </div>
                            </div>
                            <?php
                            if (isset($TablaActual) && $TablaActual[0]!="imagenes") 
                                echo '<button class="btn btn-primary" name="addUser" id="addUser">Agregar '.substr($TablaActual[1], 0, strlen($TablaActual[1])-1).'</button>'
                            ?>
                        </div>
                    </div>
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
        if (isset($TablaActual))
            echo '<script src="js/Editar'.$TablaActual[0].'.js"></script>';
        ?>
</body>

</html>