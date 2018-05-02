<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
	<?php
	include_once('php/head.php');
	?>
	<title>Orden Completa - TecnoCompra</title>
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
				   					<h1>Orden Completada</h1>
				   					<h2 class="bread"><span><a href="index.html"><i class="icon-home"></i></a></span> <span><a href="cart.html">Carrito</a></span> <span><a href="checkout.html"> Pagar</a></span><span>Completado</span></h2>
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
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
								<div class="process text-center active">
										<p><span>01</span></p>
										<h3><a href="cart.html">Orden</a></h3>
									</div>
									<div class="process text-center active">
										<p><span>02</span></p>
										<h3><a href="checkout.html">Pagar Orden</a></h3>
									</div>
									<div class="process text-center">
										<p><span>03</span></p>
										<h3><a href="order-complete.html">Orden Completada</a></h3>
									</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<span class="icon"><i class="icon-shopping-cart"></i></span>
						<h2>Gracias por comprar, su orden está completa</h2>
						<p>
							<a href="index.html"class="btn btn-primary"><i class="icon-home"></i></a>
							<a href="shop.html"class="btn btn-primary btn-outline">Continua Comprando</a>
						</p>
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

