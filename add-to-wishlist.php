<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
	<?php
	include_once('php/head.php');
	?>
	<title>Agregar a lista de deseos</title>
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
				   					<h1>Lista de Favoritos</h1>
				   					<h2 class="bread"><span><a href="index.html"><i class="icon-home"></i></a></span> <span>Favoritos</span></h2>
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
                         <h3><i class="icon-paperplane"></i>¡Entérate de todo lo que pasa!</h3>
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

