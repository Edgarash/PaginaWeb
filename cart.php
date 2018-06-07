<?php
include_once('php/Clases/conexion.php'); 
session_start();
if (isset($_SESSION['Sesion']) && !empty($_SESSION['Sesion'])) {
$IDcliente = $_SESSION['ID'];
} else {
	header('Location: Login');
	exit();
}
//Aqui estoy trabajando 
$Cantidad = array();
$NomArticulos = array();
$precios = array();
$Resultado = array();
        try {
            $SQL = "SELECT * FROM (SELECT @prmin_cliente :=". $IDcliente. " as IDCliente) alias, `MostrarCarrito`;";
            $conex = new conexion();
            $Conn = $conex->conectar();
            $STMT = $Conn->prepare($SQL);
            $STMT->execute();
            while ($fila = $STMT->fetch()) {
				array_push($Cantidad,$fila['Cantidad'].',');
				array_push($NomArticulos,$fila['Nombre'].',');
				array_push($precios,$fila['Precio'].',');
				$Resultado[] = array($fila['IDCliente'], $fila['Nombre'], $fila['Precio'], $fila['Cantidad'],$fila['IDArt'],$fila['Stock']);
            }
        } catch (PDOExeption $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
        }
?>
<!DOCTYPE HTML>
<meta http-equiv="Cache-Control" content="no-store" />
<html>

<head>
	<?php
	include_once('php/head.php');
	?>
	<script src="js/cart.js"></script>
	<title>Carrito - TecnoCompra</title>
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
										<h1 id="putavida">Carrito de compra</h1>
										<h2 class="bread">
											<span>
												<a href="index">
													<i class="icon-home"></i>
												</a>
											</span>
											<span>
												<a href="shop">Comprar</a>
											</span>
											<span>Carrito</span>
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
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p>
									<span>01</span>
								</p>
								<h3>
									<a href="cart">Orden</h3>
								</a>
							</div>
							<div class="process text-center">
								<p>
									<span>02</span>
								</p>
								<h3>
									<a href="checkout">Pagar orden</h3>
								</a>
							</div>
							<div class="process text-center">
								<p>
									<span>03</span>
								</p>
								<h3>
									<a href="order-complete">
										Orden completada</h3>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-name">
							<div class="one-forth text-center">
								<span>Detalles del producto</span>
							</div>
							<div class="one-eight text-center">
								<span>Precio</span>
							</div>
							<div class="one-eight text-center">
								<span>Cantidad</span>
							</div>
							<div class="one-eight text-center">
								<span>Total</span>
							</div>
							<div class="one-eight text-center">
								<span>Eliminar</span>
							</div>
						</div>
						<!--ESTO OCUPO -->
						<?php
						$total = 0;
						$i = 0;
						while($i < count($Resultado)){
							$total = $total +( (int) $Resultado[$i][2] * (int) $Resultado[$i][3] );
						echo(
						'
						<form action="php/cart_proceso.php" method="POST">
						
						<input type="hidden" style ="display:none" name="IDArticulo" id="IdARt'.$i.'" value="'. $Resultado[$i][4].'">'.' 
						<input type="hidden" style ="display:none" name="IDCliente" id="Idclie'.$i.'"  value="'. $Resultado[$i][0].'">'.' 
						<input type="hidden" style ="display:none" name="IDCliente" id="stock'.$i.'"  value="'. $Resultado[$i][5].'">'.'
						<div class="row">
						<div class="col-md-12">
						<div class="product-cart">	
							<div class="one-forth">
								<div class="product-img" style="background-image: url(images/nuevo4.jpg);">
								</div>.
								<div class="display-tc">.
									<h3>'. $Resultado[$i][1] .'</h3>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price" id="precio'.$i.'" >'. $Resultado[$i][2] .'</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<input   type="number" id="cantidad'.$i.'" name="quantity" class="form-control input-number text-center" value="'. $Resultado[$i][3] .'" min="1" max="'.$Resultado[$i][5].'">
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price" id="total'.$i.'">'."$". ($Resultado[$i][2] * $Resultado[$i][3]).".00".'</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<button type="submit" class="Closed" name="btnBorrar" style="border:none"> x </button>
								</div>
							</div>
						</div>
						</div>
						</div>
						</form>
						'
						
						);
						$i++;
					}
					echo('<div id="puto" class="puto" style="display:none" >'.$i.'</div>')
					?>
						<!--aqui -->
						<div class="row">
								<div class="col-md-6 col-md-offset-6">
									<div class="total-wrap">
										<div class="row">
									
											<div class="col-md-9 col-md-push-0 text-center">
												<div class="total">
													<div class="sub">
														<p><span>Subtotal:</span> <span id="Subtotal"> <?php echo('$'.$total.'.00')?></span></p>
														<p><span>Envio:</span> <span>$0.00</span></p>
														<p><span>Descuento:</span> <span>$0.00</span></p>
													</div>
													<div class="grand-total">
														<p><span><strong>Total:</strong></span> <span id="totalfinal"><?php echo('$'.$total.'.00')?></span></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
				<div class="row">
							<div class="col-md-3 col-md-push-9 text-center">
							<input type="hidden" name="Cantidad">
							<form action="php/cart_proceso.php" method="POST">
							<input type="hidden" style ="display:none" name="carrito" id="IdARt'.$i.'" value="carrito"> 
							<?php $_SESSION['carrito'] = "carrito" ?>
							<button type="submit" class="btn btn-primary " name="enviar"> Pagar Orden </button>
							</form>
							</div>
				</div>
				

				<div class="colorlib-shop">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
								<h2>
									<span>Productos Recomendados</span>
								</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/vendido1.jpg);">
										<p class="tag">
											<span class="sale">Oferta</span>
										</p>
										<div class="cart">
											<p>
												<span class="addtocart">
													<a href="cart">
														<i class="icon-shopping-cart"></i>
													</a>
												</span>
												<span>
													<a href="product-detail">
														<i class="icon-eye"></i>
													</a>
												</span>
												<span>
													<a href="#">
														<i class="icon-heart3"></i>
													</a>
												</span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3>
											<a href="shop">Lenovo Desktop Rs 18000</a>
										</h3>
										<p class="price">
											<span>$15,000.00</span>
											<span class="sale">$18,000.00</span>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-3 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/vendido2.jpg);">
										<div class="cart">
											<p>
												<span class="addtocart">
													<a href="cart">
														<i class="icon-shopping-cart"></i>
													</a>
												</span>
												<span>
													<a href="product-detail">
														<i class="icon-eye"></i>
													</a>
												</span>
												<span>
													<a href="#">
														<i class="icon-heart3"></i>
													</a>
												</span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3>
											<a href="shop">Alienware 15 R3 Supreme Gaming</a>
										</h3>
										<p class="price">
											<span>$25,000.00</span>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-3 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/vendido3.jpg);">
										<p class="tag">
											<span class="new">New</span>
										</p>
										<div class="cart">
											<p>
												<span class="addtocart">
													<a href="cart">
														<i class="icon-shopping-cart"></i>
													</a>
												</span>
												<span>
													<a href="product-detail">
														<i class="icon-eye"></i>
													</a>
												</span>
												<span>
													<a href="#">
														<i class="icon-heart3"></i>
													</a>
												</span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3>
											<a href="shop">LG V30+Dual-SIM LG-H930DS</a>
										</h3>
										<p class="price">
											<span>$10,000.00</span>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-3 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/vendido5.jpg);">

										<div class="cart">
											<p>
												<span class="addtocart">
													<a href="cart">
														<i class="icon-shopping-cart"></i>
													</a>
												</span>
												<span>
													<a href="product-detail">
														<i class="icon-eye"></i>
													</a>
												</span>
												<span>
													<a href="#">
														<i class="icon-heart3"></i>
													</a>
												</span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3>
											<a href="shop">Audífonos Sony Mdrxb650bt Bluetooth</a>
										</h3>
										<p class="price">
											<span>$1,859.00</span>
										</p>
									</div>
								</div>
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
		?>
</body>

</html>