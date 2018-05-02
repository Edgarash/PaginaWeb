<?php
$Nombre;
$Link;
$CierraSesion='';
if (isset($_SESSION['Sesion'])) {
    $Nombre = $_SESSION['Nombre'];
    $Link = "Profile";
    $CierraSesion=
    '<li>
        <a href=php/cerrarSesion>
            <i class="fas fa-user-times"></i> Cerrar Sesión
        </a>
    </li>';
} else {
    $Nombre = "Inicia Sesión";
    $Link = "Login";
}
?>
<nav class="colorlib-nav" role="navigation">
<div class="top-menu">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <div id="colorlib-logo">
                    <a href="index">
                        <img src="images/logo.png" alt="TecnoCompra" width="250px">
                    </a>
                </div>
            </div>
            <div class="col-xs-10 text-right menu-1">
                <ul>

                    <li>
                        <a href="index">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li>
                        <a href="shop">
                            <i class="icon-tags"></i> Comprar</a>
                    </li>
                    <li>
                        <a href="<?php echo $Link; ?>">
                            <i class="icon-user"></i> <?php echo $Nombre; ?></a>
                    </li>
                    <li>
                        <a href="add-to-wishlist">
                            <i class="icon-heart"></i> Favoritos</a>
                    </li>
                    <li>
                        <a href="cart">
                            <i class="icon-shopping-cart"></i> Carrito (0)</a>
                    </li>
                    <?php echo $CierraSesion; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</nav>