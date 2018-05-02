<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
	<?php
	include_once('php/head.php');
	?>
	<title>Inicio - TecnoCompra</title>
	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<?php
		include_once('php/header.php');
		?>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/banner2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
										   <h1 class="head-1">Laptop</h1>
										   <h1 class="head-2">Nueva</h2>
					   					<h2 class="head-3">Colección</h2>
					   					<p class="category"><span>Las mejores marcas</span></p>
					   					<p><a href="#" class="btn btn-primary">  Ver   ahora </a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/banner6.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Nueva</h1>
					   					<h2 class="head-2">Colección</h2>
					   					<h2 class="head-3">Cámaras</h2>
					   					<p class="category"><span>Los mejores precios</span></p>
					   					<p><a href="#" class="btn btn-primary">Ver ahora</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/banner9.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Ofertas</h1>
					   					<h2 class="head-2">Colección</h2>
					   					<h2 class="head-3">Accesorios</h2>
					   					<p class="category"><span>Todo lo que buscas</span></p>
					   					<p><a href="#" class="btn btn-primary">Ver ahora</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div id="colorlib-featured-product">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="shop.html" class="f-product-1" style="background-image: url(images/publi1.png);">
							<div class="desc">
								<h2>Smart <br>phones</h2>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<a href="" class="f-product-2" style="background-image: url(images/publi2.jpg);">
									<div class="desc">
										<h2>Nuevo <br>Laptops</h2>
									</div>
								</a>
							</div>
							<div class="col-md-6">
								<a href="" class="f-product-2" style="background-image: url(images/publi3.jpg);">
									<div class="desc">
										<h2>Impre <br>soras</h2>
									</div>
								</a>
							</div>
							<div class="col-md-12">
								<a href="" class="f-product-2" style="background-image: url(images/publi4.jpg);">
									<div class="desc">
										<h2>Cáma<br>ras</h2>
									</div>
								</a>
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
						<h2><span>Nuevos productos</span></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/nuevo4.jpg);">
								<p class="tag"><span class="new">Nuevo</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Canon EOS Rebel T6</a></h3>
								<p class="price"><span>$12,279.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/nuevo2.jpg);">
								<p class="tag"><span class="new">Nuevo</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
									
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Impresora Inalámbrica HP</a></h3>
								<p class="price"><span>$1,289.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/nuevo3.png);">
								<p class="tag"><span class="new">Nuevo</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
							
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Audífonos inalámbricos RP-BTD10</a></h3>
								<p class="price"><span>$3,575.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/nuevo1.jpg);">
								<p class="tag"><span class="new">Nuevo</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Laptop Hp Stream 11</a></h3>
								<p class="price"><span>$5,399.00</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="colorlib-intro" class="colorlib-intro" style="background-image: url(images/oferta.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="intro-desc">
							<div class="text-salebox">
								<div class="text-lefts">
									<div class="sale-box">
										<div class="sale-box-top">
											<h2 class="number">45</h2>
											<span class="sup-1">%</span>
											<span class="sup-2">Desc</span>
										</div>
										<h2 class="text-sale">Oferta</h2>
									</div>
								</div>
								<div class="text-rights">
									<h3 class="title">Apresúrate oferta limitada!</h3>
									<h2>Laptops</h2>
									<p><a href="shop.html" class="btn btn-primary">Ver Colección</a></p>
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
						<h2><span>Lo más vendido</span></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/vendido1.jpg);">
								<p class="tag"><span class="sale">Oferta</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Lenovo Desktop Rs 18000</a></h3>
								<p class="price"><span>$15,000.00</span> <span class="sale">$18,000.00</span> </p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/vendido2.jpg);">
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Alienware 15 R3 Supreme Gaming</a></h3>
								<p class="price"><span>$25,000.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/vendido3.jpg);">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">LG V30+Dual-SIM LG-H930DS</a></h3>
								<p class="price"><span>$10,000.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/vendido4.jpg);">
								
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Samsung Galaxy J7</a></h3>
								<p class="price"><span>$2,300.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/vendido5.jpg);">
								
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Audífonos Sony Mdrxb650bt Bluetooth</a></h3>
								<p class="price"><span>$1,859.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/vendido6.jpg);">
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Ropch Funda para Ordenadores Portátiles</a></h3>
								<p class="price"><span>$730.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/vendido7.jpg);">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Zelotes F-14 Wireless gaming </a></h3>
								<p class="price"><span>$642.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/vendido8.jpg);">
								<div class="cart">
									<p>
										<span class="addtocart"><a href="cart.html"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.html"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">Huawei GR3 2017</a></h3>
								<p class="price"><span>$2,500.00</span></p>
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
						<div class="col-md-6 text-center">
							<h3><i class="icon-paperplane"></i>¡Entérate de todo lo que pasa!</h3>
							<h4>Nuevos productos y ofertas </h4>
								
						</div>
						<div class="col-md-6">
							<form class="form-inline qbstp-header-subscribe">
								<div class="row">
									<div class="col-md-12 col-md-offset-0">
										<div class="form-group">
											<input type="text" class="form-control" id="email" placeholder="Introduce tu email">
											<button type="submit" class="btn btn-primary"> Registrate</button>
										</div>
									</div>
								</div>
							</form>
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

