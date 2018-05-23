<?php
$Nombre;
$Link;
if (isset($_SESSION['Sesion'])) {
    $Nombre = $_SESSION['Nombre'];
    $Link = "#";
} else {
    $Nombre = "Inicia Sesión";
    $Link = "Login";
}
?>
<footer id="colorlib-footer" role="contentinfo">
<div class="container">
    <div class="row row-pb-md">
        <div class="col-md-3 colorlib-widget">
            <h4>Acerca de</h4>
            <p>TecnoCompra es una tienda de artículos electrónicos, ahora disponible desde cualquier lugar.</p>
            <p>
                <ul class="colorlib-social-icons">
                    <li>
                        <a href="#">
                            <i class="icon-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </p>
        </div>
        <div class="col-md-2 colorlib-widget">
            <h4>Categorías</h4>
            <p>
                <ul class="colorlib-footer-links">
                    <li>
                        <a href="#">Computadoras</a>
                    </li>
                    <li>
                        <a href="#">Impresoras</a>
                    </li>
                    <li>
                        <a href="#">Cámaras</a>
                    </li>
                    <li>
                        <a href="#">Telefonía</a>
                    </li>
                    <li>
                        <a href="#">Almacenamiento</a>
                    </li>
                </ul>
            </p>
        </div>
        <div class="col-md-2 colorlib-widget">
            <h4>Información</h4>
            <p>
                <ul class="colorlib-footer-links">
                    <li>
                        <a href="about">
                            <i class="icon-paperclip"></i> Acerca de nosotros</a>
                    </li>
                    <li>
                        <a href="contact">
                            <i class="icon-globe"></i> Contáctanos</a>
                    </li>

                </ul>
            </p>
        </div>

        <div class="col-md-2">
            <h4>Mi Cuenta</h4>
            <ul class="colorlib-footer-links">
                <li>
                    <a href="<?php echo $Link; ?>">
                        <i class="icon-user"></i><?php echo $Nombre; ?></a>
                </li>
                <li>
                    <a href="add-to-wishlist">
                        <i class="icon-heart"></i> Favoritos</a>
                </li>
                <li>
                    <a href="cart">
                        <i class="icon-shopping-cart"></i> Carrito</a>
                </li>
            </ul>
        </div>

        <div class="col-md-3">
            <h4>Información de contacto</h4>
            <ul class="colorlib-footer-links">
                <li>
                    <i class="icon-map-marker"></i> La Paz, Baja California Sur</li>
                <li>
                    <i class="icon-phone"></i> +1234 567</li>
                <li>
                    <i class="icon-envelope"></i> info@tecno.com</li>
            </ul>
        </div>
    </div>
</div>
<div class="copy">
    <div class="row">
        <div class="col-md-12 text-center">
            <p>

                <span class="block">
                    <!-- Link back to Colorlib can\'t be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> Tienda TecnoCompra Online MX. Todos los derechos reservados.
                    <!-- Link back to Colorlib can\'t be removed. Template is licensed under CC BY 3.0. -->
                </span>

            </p>
        </div>
    </div>
</div>
</footer>
</div>
<div class="gototop js-top">
    <a href="#" class="js-gotop">
        <i class="icon-arrow-up2"></i>
    </a>
</div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>
    <!-- Owl carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <!-- Date Picker -->
    <script src="js/bootstrap-datepicker.js"></script>
    <!-- Stellar Parallax -->
    <script src="js/jquery.stellar.min.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>
    <!-- Popup's -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <!-- Navegador -->
    <script src="js/falso.js"></script>