<?php
session_start();
include_once 'php/Clases/articulos.php';
if ($_SERVER['REQUEST_METHOD']=='GET') {
	if (isset($_GET['ID']) && !empty($ID = $_GET['ID']))
	$Articulo = ObtenerUnArticulo($ID);
	$idArticulo = $Articulo->getID();
	if (!isset($_SESSION['Empleado']))
		$IDcliente = isset($_SESSION['ID']) ? $_SESSION['ID'] : "";
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
										url(<?php echo _ARTICULO.$Articulo->getImagenes()[0]; ?>);background-size:contain;">
										</div>
										<div class="thumb-nail">
											<a href="#" class="thumb-img" style="background-image: url(
											<?php
											echo _ARTICULO.$Articulo->getImagenes()[1];
											?>
											);background-size:contain;"></a>
											<a href="#" class="thumb-img" style="background-image: url(
											<?php
											echo _ARTICULO.$Articulo->getImagenes()[2];
											?>
											);background-size:contain;"></a>
											<a href="#" class="thumb-img" style="background-image: url(
											<?php
											echo _ARTICULO.$Articulo->getImagenes()[3];
											?>
											);background-size:contain;"></a>
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
											for ($i=0; $i < count($lineas) && $i < 7; $i++) { 
												echo '<li>'.$lineas[$i].'</li>';
											}
											?>
										</ul>
										<div class="row row-pb-sm">
											<div class="col-md-4">
									<form action="<?php echo (isset($_SESSION['ID']) ? "php/cart_proceso" : "login"); ?>" method="POST">											
									<div class="input-group">
										<span class="input-group-btn">
										   <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
										  <i class="icon-minus2"></i>
										   </button>
										   </span>
	
										<input type="text" id="quantity" name="cantidad" class="form-control input-number" value="1" min="1" max="100">
										<span class="input-group-btn">
										   <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
											<i class="icon-plus2"></i>
										</button>
										</span>
									 </div>
									</div>
									
										</div>
										<input type="hidden" style ="display:none" name="IdArticulo" id="IdArticulo" value="<?php echo($idArticulo) ?>"> 
										<input type="hidden" style ="display:none" name="IdCliente" id="IdCliente" value="<?php echo(isset($IDcliente) ? $IDcliente : 1); ?>"> 
										<button name="anadir" id="anadir" class="btn btn-primary btn-addtocart">Añadir al carrito</button>
										
										</div>
									</form>
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

