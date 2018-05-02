<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
	<?php
	include_once('php/head.php');
	?>
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
										<h1>Carrito de compra</h1>
										<h2 class="bread">
											<span>
												<a href="index.html">
													<i class="icon-home"></i>
												</a>
											</span>
											<span>
												<a href="shop.html">Comprar</a>
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
									<a href="cart.html">Orden</h3>
								</a>
							</div>
							<div class="process text-center">
								<p>
									<span>02</span>
								</p>
								<h3>
									<a href="checkout.html">Pagar orden</h3>
								</a>
							</div>
							<div class="process text-center">
								<p>
									<span>03</span>
								</p>
								<h3>
									<a href="order-complete.html">
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
						<div class="product-cart">
							<div class="one-forth">
								<div class="product-img" style="background-image: url(images/nuevo4.jpg);">
								</div>
								<div class="display-tc">
									<h3>Canon EOS Rebel T6</h3>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$12,279.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$12,279.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="#" class="closed"></a>
								</div>
							</div>
						</div>
						<div class="product-cart">
							<div class="one-forth">
								<div class="product-img" style="background-image: url(images/nuevo2.jpg);">
								</div>
								<div class="display-tc">
									<h3>Impresora Inalámbrica HP</h3>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$1,289.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<form action="#">
										<input type="text" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">
									</form>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$1,289.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="#" class="closed"></a>
								</div>
							</div>
						</div>
						<div class="product-cart">
							<div class="one-forth">
								<div class="product-img" style="background-image: url(images/nuevo3.png);">
								</div>
								<div class="display-tc">
									<h3>Audífonos inalámbricos RP-BTD10</h3>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$3,575.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">$3,575.00</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<a href="#" class="closed"></a>
								</div>
							</div>
						</div>
						<div class="row">
								<div class="col-md-6 col-md-offset-1">
									<div class="total-wrap">
										<div class="row">
									
											<div class="col-md-9 col-md-push-1 text-center">
												<div class="total">
													<div class="sub">
														<p><span>Subtotal:</span> <span>$17,143.00</span></p>
														<p><span>Envio:</span> <span>$0.00</span></p>
														<p><span>Descuento:</span> <span>$0.00</span></p>
													</div>
													<div class="grand-total">
														<p><span><strong>Total:</strong></span> <span>$17,143.00</span></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
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
													<a href="cart.html">
														<i class="icon-shopping-cart"></i>
													</a>
												</span>
												<span>
													<a href="product-detail.html">
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
											<a href="shop.html">Lenovo Desktop Rs 18000</a>
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
													<a href="cart.html">
														<i class="icon-shopping-cart"></i>
													</a>
												</span>
												<span>
													<a href="product-detail.html">
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
											<a href="shop.html">Alienware 15 R3 Supreme Gaming</a>
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
													<a href="cart.html">
														<i class="icon-shopping-cart"></i>
													</a>
												</span>
												<span>
													<a href="product-detail.html">
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
											<a href="shop.html">LG V30+Dual-SIM LG-H930DS</a>
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
													<a href="cart.html">
														<i class="icon-shopping-cart"></i>
													</a>
												</span>
												<span>
													<a href="product-detail.html">
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
											<a href="shop.html">Audífonos Sony Mdrxb650bt Bluetooth</a>
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