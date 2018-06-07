<?php
session_start();
include_once 'php/Clases/articulos.php';
if ($_SERVER['REQUEST_METHOD']=='GET') {
	if (isset($_GET['ID']) && !empty($ID = $_GET['ID']))
	$Articulo = ObtenerUnArticulo($ID);
	if (!$Articulo) {
		header('Location: shop');
		exit();
	}
}
?>
<!DOCTYPE HTML>
<html>
	<head>
	<?php
	include_once('php/head.php');
	?>
	<title>Detalle de Producto - TecnoCompra</title>
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
									   <h1>Detalle del producto</h1>
									   <h2 class="bread"><span><a href="index"><i class="icon-home"></i></a></span> <span><a href="shop">Productos</a></span> <span>Detalle</span></h2>
								   </div>
							   </div>
						   </div>
					   </div>
				   </li>
				  </ul>
			  </div>
		</aside>
		<?php
		if (isset($Articulo)) {
		?>
		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-detail-wrap">
							<div class="row">
								<div class="col-md-5">
									<div class="product-entry">
										<div class="product-img" style="background-image: 
										url(<?php
										echo _ARTICULO.$Articulo->getImagenes()[0];
										?>);">
											<!-- Tag de Oferta -->
											<!-- <p class="tag"><span class="sale">Oferta</span></p> -->
										</div>
										<div class="thumb-nail">
											<a href="#" class="thumb-img" style="background-image: url(
											<?php
											echo _ARTICULO.$Articulo->getImagenes()[1];
											?>
											);"></a>
											<a href="#" class="thumb-img" style="background-image: url(
											<?php
											echo _ARTICULO.$Articulo->getImagenes()[2];
											?>
											);"></a>
											<a href="#" class="thumb-img" style="background-image: url(
											<?php
											echo _ARTICULO.$Articulo->getImagenes()[3];
											?>
											);"></a>
										</div>
									</div>
								</div>
								<div class="col-md-7">
									<div class="desc">
										<h3><?php echo $Articulo->getNombre(); ?></h3>
										<p class="price">
											<span>$<?php echo $Articulo->getPrecio(); ?></span> 
											<!-- Rates -->
											<!--
											<span class="rate text-right">
												<i class="icon-star-full"></i>
												<i class="icon-star-full"></i>
												<i class="icon-star-full"></i>
												<i class="icon-star-full"></i>
												<i class="icon-star-half"></i>
												(74 Populariad)
											</span>
											-->
										</p>
										<ul>
											<?php
											$tee = nl2br($Articulo->getCaracteristicas());
											$lineas = explode("<br />",$tee);
											foreach ($lineas as $Caracteristica) {
												echo '<li>'.$Caracteristica.'</li>';
											}
											?>
										</ul>
										<div class="row row-pb-sm">
											<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-btn">
										   <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
										  <i class="icon-minus2"></i>
										   </button>
										   </span>
										<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
										<span class="input-group-btn">
										   <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
											<i class="icon-plus2"></i>
										</button>
										</span>
									 </div>
									</div>
										</div>
										<p><a href="cart" class="btn btn-primary btn-addtocart"><i class="icon-shopping-cart"></i>Añadir al carrito</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-12 tabulation">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#description">Descipción</a></li>
									<li><a data-toggle="tab" href="#manufacturer">Caracteristicas</a></li>
									
								</ul>
								<div class="tab-content">
									<div id="description" class="tab-pane fade in active">
									<?php echo $Articulo->getDescripcion(); ?>
								 </div>
								 <div id="manufacturer" class="tab-pane fade">
								 <?php 
								foreach ($lineas as $Caracteristica) {
									echo '<p>'.$Caracteristica.'</p>';
								}
								?>
								   </div>
								   
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			} else
			{
		?>
		<div class="colorlib-container">
		<div class="row">
		<h1 style="text-align:center">Este artículo no existe</h1>
		<h2 style="text-align:center">Te invitamos a ver</h2>
		</div></div>
		<?php
			}
		?>
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Productos similares</span></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image:url(images/eduardo-Laptop.jpg);">
								<div class="cart">
									<p>
										<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop">HP LAPTOP PAVILION</a></h3>
								<p class="price"><span>$6,499.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/eduardo-Laptop2.jpg);">
								
								<div class="cart">
									<p>
										<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop">HP STREAM INTEL</a></h3>
								<p class="price"><span>$3,990.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/eduardo-pc.jpg);">
								
								<div class="cart">
									<p>
										<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop">DELL VOSTRO 3250</a></h3>
								<p class="price"><span>$11,500.00</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(images/eduardo-teclado.jpg);">
								
								<div class="cart">
									<p>
										<span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop">TECLADO RAZER CYNOSA PRO</a></h3>
								<p class="price"><span>$700.00</span></p>
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
	<script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
				
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());
				
				// If is not undefined
					
					$('#quantity').val(quantity + 1);

				  
					// Increment
				
			});

			 $('.quantity-left-minus').click(function(e){
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());
				
				// If is not undefined
			  
					// Increment
					if(quantity>0){
					$('#quantity').val(quantity - 1);
					}
			});
			
		});
	</script>
	</body>
</html>

