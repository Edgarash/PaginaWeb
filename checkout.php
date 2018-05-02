<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
	<?php
	include_once('php/head.php');
	?>
	<title>Checkout - TecnoCompra</title>
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
				   					<h1>Pagar Orden</h1>
				   					<h2 class="bread"><span><a href="index.html"><i class="icon-home"></i></a></span> <span><a href="cart.html">Carrito</a></span> <span>Pagar</span></h2>
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
					<div class="col-md-7">
						<form method="post" class="colorlib-form">
							<h2>Detalles de Facturación</h2>
		              	<div class="row">
			               <div class="col-md-12">
			                  <div class="form-group">
			                  	<label for="country">Seleccione País</label>
			                     <div class="form-field">
			                     	<i class="icon icon-arrow-down3"></i>
			                        <select name="people" id="people" class="form-control">
				                      	<option value="#">Seleccione País</option>
				                        <option value="#">México</option>
				                        <option value="#">China</option>
				                        <option value="#">EUA</option>
				                        <option value="#">Colombia</option>
				                        <option value="#">Ecuador</option>
			                        </select>
			                     </div>
			                  </div>
			               </div>
			               <div class="form-group">
									<div class="col-md-6">
										<label for="fname">Nombre</label>
										<input type="text" id="fname" class="form-control" placeholder="Su nombre">
									</div>
									<div class="col-md-6">
										<label for="lname">Apellido</label>
										<input type="text" id="lname" class="form-control" placeholder="Su apellido">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="companyname">Compañia</label>
			                    	<input type="text" id="companyname" class="form-control" placeholder="Nombre de la compañia">
			                  </div>
			               </div>
			               <div class="col-md-12">
									<div class="form-group">
										<label for="fname">Dirección</label>
			                    	<input type="text" id="address" class="form-control" placeholder="Introduce su dirección">
			                  </div>
			                  
			               </div>
			               <div class="col-md-12">
									<div class="form-group">
										<label for="companyname">Ciudad</label>
			                    	<input type="text" id="towncity" class="form-control" placeholder="Nombre de la ciudad">
			                  </div>
			               </div>
			               <div class="form-group">
									<div class="col-md-6">
										<label for="stateprovince">Estado</label>
										<input type="text" id="fname" class="form-control" placeholder="Nombre del estado">
									</div>
									<div class="col-md-6">
										<label for="lname">Código Postal</label>
										<input type="text" id="zippostalcode" class="form-control" placeholder="Código Postal">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-6">
										<label for="email">Correo electrónico</label>
										<input type="text" id="email" class="form-control" placeholder="Introduce email">
									</div>
									<div class="col-md-6">
										<label for="Phone">Número telefónico</label>
										<input type="text" id="zippostalcode" class="form-control" placeholder="Teléfono">
									</div>
								</div>
								<!--<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
										  <label><input type="radio" name="optradio">Create an Account? </label>
										  <label><input type="radio" name="optradio"> Ship to different address</label>
										</div>
									</div>
								</div>-->
		              </div>
		            </form>
					</div>
					<div class="col-md-5">
						<div class="cart-detail">
							<h2>Total del carro</h2>
							<ul>
								<li>
									<span>Subtotal</span> <span>$17,143.00</span>
									<ul>
										<li><span>1 x Canon EOS Rebel T6</span> <span>$12,279.00</span></li>
										<li><span>1 x Impresora Inalámbrica HP</span> <span>$1,289.00</span></li>
										<li><span>1 x Audífonos inalámbricos RP-BTD10</span> <span>$3,575.00</span></li>
									</ul>
								</li>
								<li><span>Envio</span> <span>$0.00</span></li>
								<li><span>Total</span> <span>$17,143.00</span></li>
							</ul>
						</div>
						<div class="cart-detail">
							<h2>Método de pago</h2>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
									   <label><input type="radio" name="optradio">Transferencia bancaria directa</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
									   <label><input type="radio" name="optradio">Verificar Pago</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="radio">
									   <label><input type="radio" name="optradio">Paypal</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class="checkbox">
									   <label><input type="checkbox" value="">He leído y acepto los términos y condiciones.</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p><a href="#" class="btn btn-primary">Confirmar orden</a></p>
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
						<h2><span>Productos Recomendados</span></h2>
						
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

