<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
    <?php
	include_once('php/head.php');
    ?>
    <title>Formas de Pago - TecnoCompra</title>
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
                                        <h1>Formas de Pago</h1>
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
                                        <div class="panel panel-default">
                                            <div class="panel">
                                                <h4 class="panel-title">
                                                    <a href="profile">
                                                        <i class="icon-user"></i>
                                                        Datos Generales
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel">
                                                <h4 class="panel-title" style="color:#cc0000">
                                                    <a href="payment">
                                                        <i class="icon-credit-card"></i>
                                                        Formas de Pago
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel">
                                                <h4 class="panel-title">
                                                    <a href="sell">
                                                        <i class="icon-tags"></i>
                                                        Mis Ventas
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel">
                                                <h4 class="panel-title">
                                                    <a href="bought">
                                                        <i class="icon-tag"></i>
                                                        Mis Compras
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel">
                                                <h4 class="panel-title">
                                                    <a href="add-to-wishlist">
                                                        <i class="icon-heart"></i>
                                                        Favoritos
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel">
                                                <h4 class="panel-title">
                                                    <a href="cart">
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
                                    <i class="icon-dollar-sign"></i> Forma de Pago</h2>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cc">
                                            <i class="icon-credit-card"></i> Tarjeta de Crédito</label>
                                        <input type="text" name="cc" id="cc" class="form-control" placeholder="Número de tarjeta de crédito (16 dígitos)" maxlength="16">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tt">
                                            <i class="icon-user"></i> Titular</label>
                                        <input type="text" name="tt" id="tt" class="form-control" placeholder="Nombre Tituar de la Tarjeta de Crédito">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date">
                                            <i class="icon-calendar"></i> Fecha de Vencimiento</label>
                                        <input type="month" name="date" id="date" class="form-control" placeholder="Fecha de Vencimiento">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cv">CV</label>
                                        <input type="text" name="cv" id="cv" class="form-control" placeholder="CV" maxlength="4">
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