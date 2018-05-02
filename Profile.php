<?php
    session_start();
    if (!isset($_SESSION['Sesion'])) {
        print '<h1 style="position:absolute;">llego</h1>';
        $_SESSION['URL_Origen'] = $_SERVER['PHP_SELF'];
        header('Location: login');
        exit();
    }
?>
<!DOCTYPE HTML>
<html>

<head>
    <?php
	include_once('php/head.php');
    ?>
    <title>Perfil - TecnoCompra</title>
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
                                        <h1>Datos Generales</h1>
                                        <h2 class="bread">
                                            <span>
                                                <a href="index.html">
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
                                        <div class="panel panel-default">
                                            <div class="panel">
                                                <h4 class="panel-title" style="color:#cc0000">
                                                    <a href="profile.html">
                                                        <i class="icon-user"></i>
                                                        Datos Generales
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel">
                                                <h4 class="panel-title">
                                                    <a href="payment.html">
                                                        <i class="icon-credit-card"></i>
                                                        Formas de Pago
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel">
                                                <h4 class="panel-title">
                                                    <a href="sell.html">
                                                        <i class="icon-tags"></i>
                                                        Mis Ventas
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel">
                                                <h4 class="panel-title">
                                                    <a href="bought.html">
                                                        <i class="icon-tag"></i>
                                                        Mis Compras
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel">
                                                <h4 class="panel-title">
                                                    <a href="add-to-wishlist.html">
                                                        <i class="icon-heart"></i>
                                                        Favoritos
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel">
                                                <h4 class="panel-title">
                                                    <a href="cart.html">
                                                        <i class="icon-shopping-cart"></i>
                                                        Carrito [0]
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <form method="post" class="colorlib-form">
                            <div class="row">
                                <h2>
                                    <i class="icon-cog"></i> Datos de cuenta</h2>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">
                                            <i class="icon-envelope"></i> Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pass">Contraseña</label>
                                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña">
                                    </div>
                                </div>
                                <div class="col-md-12 hr8"></div>
                                <div class="form-group"></div>
                                <div class="form-group"></div>
                                <h2>
                                    <i class="icon-user"></i> Datos personales</h2>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Nombre</label>
                                        <input type="text" name="fname" id="fname" class="form-control" placeholder="Su Nombre">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Apellidos</label>
                                        <input type="text" name="lname" id="lname" class="form-control" placeholder="Sus Apellidos">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tel">
                                            <i class="icon-phone"></i> Teléfono</label>
                                        <input type="tel" name="tel" id="tel" class="form-control" placeholder="Teléfono">
                                    </div>
                                </div>
                                <div class="form-group"></div>
                                <div class="form-group"></div>
                                <h2 style="clear: both;">
                                    <i class="icon-map-marker"></i> Domicilio</h2>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="calle">
                                            <i class="icon-road"></i> Calle</label>
                                        <input type="text" name="calle" id="calle" class="form-control" placeholder="Calle">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="next">N° Ext</label>
                                        <input type="text" name="next" id="next" class="form-control" placeholder="N° Exterior">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nint">N° Int</label>
                                        <input type="text" name="nint" id="nint" class="form-control" placeholder="N° Interior">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="ecalles">Entre Calles (Opcional)</label>
                                        <input type="text" name="ecalles" id="ecalles" placeholder="Calles" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="ref">Referencias (Opcional)</label>
                                        <input type="text" name="ref" id="ref" class="form-control" placeholder="Referencias">
                                    </div>
                                </div>
                                <div class="col-md-3" style="clear: left;">
                                    <div class="form-group">
                                        <label for="cp">Código Postal</label>
                                        <input type="text" name="cp" id="cp" class="form-control" placeholder="Código Postal">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="col">Colonia</label>
                                        <input type="text" name="col" id="col" class="form-control" placeholder="Colonia">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mun">Municipio</label>
                                        <input type="text" name="mun" id="mun" class="form-control" placeholder="Municipio">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="est">Estado</label>
                                        <input type="text" name="est" id="est" class="form-control" placeholder="Estado">
                                    </div>
                                </div>
                            </div>
                        </form>
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
        ?>
</body>

</html>