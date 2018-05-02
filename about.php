<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<?
		include_once('php/head.php');
		?>
		<title>Acerca de TecnoCompra</title>
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
				   					<h1>Acerca de nosotros</h1>
				   					<h2 class="bread"><span><a href="index.html"><i class="icon-home"></i></a></span> <span>Acerca</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-about">
			<div class="container">
				<div class="row">
					<div class="about-flex">
						<div class="col-one-forth">
							<div class="row">
								<div class="col-md-12 about">
									<h2>Acerca</h2>

									<ul>
										<li><a href="#">Quienes somos</a></li>
										
									</ul>
								</div>
							</div>
						</div>
						<div class="col-three-forth">
							<h2>Quienes somos</h2>
							<div class="row">
								<div class="col-md-12">
								<p ALIGN="justify">Somos una empresa de venta y distribución de tecnología. Nuestro catálogo de productos está cuidadosamente seleccionado e incluye a las mejores marcas de su ramo a nivel mundial para llevar a tu empresa y a tu hogar productos que faciliten tus actividades.</p>	
								
								</div>
								
								<div class="row row-pb-sm">
										<div class="col-md-6">
											<img class="img-responsive" src="images/somos.jpg" alt="">
										</div>
										<div class="col-md-6">
												<p ALIGN="justify">En Tecnocompra llevamos a tu puerta los mejores productos de tecnología para optimizar tu trabajo y modernizar tu vida. Somos tu almacén de tecnología, ya que ordenas online lo que necesitas y lo entregamos en el menor tiempo posible. En Tecnocompra damos la atención más rápida, eficaz, y eficiente del mercado 
														a la demanda de productos y equipos de telecomunicaciones, electrónica y tecnología aplicada en general.</p>
										</div>
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

