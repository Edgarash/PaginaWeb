<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
	<?php
	include_once('php/head.php');
	?>
	<title>Contacto - TecnoCompra</title>
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
										<h1>Contáctanos</h1>
										<h2 class="bread"><span><a href="index"><i class="icon-home"></i></a></span> <span>Contacto</span></h2>
									</div>
								</div>
							</div>
						</div>
					</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<h3>Información de contacto</h3>
						<div class="row contact-info-wrap">
							<div class="col-md-3">
								<p><span><i class="icon-location"></i></span> 975 Encinas,Col.Centro<br>La Paz, Baja California Sur CP.23000</p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-phone3"></i></span>+ 1235 2355 98</p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-envelope"></i></span>info@tecno.com</p>
							</div>
							
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1">
						<div class="contact-wrap">
							<h3>Ponerse en contacto</h3>
							<form action="#">
								<div class="row form-group">
									<div class="col-md-6 padding-bottom">
										<label for="fname">Nombre</label>
										<input type="text" id="fname" class="form-control" placeholder="Su nombre">
									</div>
									<div class="col-md-6">
										<label for="lname">Apellido</label>
										<input type="text" id="lname" class="form-control" placeholder="Su apellido">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="email">Email</label>
										<input type="text" id="email" class="form-control" placeholder="Su correo electrónico">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="subject">Asunto</label>
										<input type="text" id="subject" class="form-control" placeholder="Asunto del mensaje">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="message">Mensaje</label>
										<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Introducir mensaje"></textarea>
									</div>
								</div>
								<div class="form-group text-center">
									<input type="submit" value="Enviar Mensaje" class="btn btn-primary">
								</div>
							</form>		
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="map" class="colorlib-map"></div>

		<?php
		include_once('php/footer.php');
		?>
	</body>
</html>

