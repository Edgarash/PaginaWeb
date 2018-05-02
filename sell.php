<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
    <?php
	include_once('php/head.php');
    ?>
    <title>Vender - TecnoCompra</title>
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
                                        <h1>Añadir un artículo</h1>
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
                                                <h4 class="panel-title">
                                                    <a href="profile.html">
                                                        <i class="icon-user"></i>
                                                        Datos Generales
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel">
                                                <h4 class="panel-title" style="color:#cc0000">
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
                                    <i class="icon-tag"></i> Agregar un Artículo</h2>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cc">
                                            <i class="material-icons" style="font-size:13px">shopping_basket</i> Nombre del Artículo</label>
                                        <input type="text" name="cc" id="cc" class="form-control" placeholder="Nombre del Artículo">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pv"><i class="icon-dollar-sign"></i> Precio de Venta</label>
                                        <input type="text" name="pv" id="pv" class="form-control" placeholder="Precio de Venta">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stock">Disponibilidad</label>
                                        <input type="number" name="stock" id="stock" class="form-control" placeholder="Stock">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cars">Características</label>
                                        <textarea name="cars" id="cars" cols="30" rows="3" class="form-control" placeholder="Características del Artículo"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="img">Imágenes</label>
                                        <input type="file" name="img" id="img" class="form-control" placeholder="Imágenes" style="padding:0;">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="des">Descripción</label>
                                        <textarea name="des" id="des" cols="30" rows="5" class="form-control" placeholder="Descripción del Artículo"></textarea>
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