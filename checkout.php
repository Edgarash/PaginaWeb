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
				$Resultado[] = array($fila['IDCliente'], $fila['Nombre'], $fila['Precio'], $fila['Cantidad'],$fila['IDArt']);
            }
        } catch (PDOExeption $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
		}
		$IDcliente = $_SESSION['ID'];
        $val = true;
        try {
            $cliente =  array();
            $SQL = "SELECT * FROM cliente where id = :idc ";
            $conex = new conexion();
            $Conn = $conex->conectar();
            $STMT = $Conn->prepare($SQL);
            $STMT->bindParam(':idc', $IDcliente);
            $STMT->execute();
            while ($fila = $STMT->fetch()) {
                array_push($cliente,$fila['ID']);
                array_push($cliente,$fila['Email']);
                array_push($cliente,$fila['Contrasena']);
                array_push($cliente,$fila['Nombre']);
                array_push($cliente,$fila['Apellidos']);
                array_push($cliente,$fila['Telefono']);
                array_push($cliente,$fila['NumExterior']);
                array_push($cliente,$fila['NumInterior']);
                array_push($cliente,$fila['Calle']);
                array_push($cliente,$fila['EntreCalles']);
                array_push($cliente,$fila['Referencia']);
                array_push($cliente,$fila['CP']);
                array_push($cliente,$fila['Colonia']);
                array_push($cliente,$fila['Municipio']);
                array_push($cliente,$fila['Estado']);
            }
        } catch (PDOExeption $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
        }
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
				   					<h2 class="bread"><span><a href="index"><i class="icon-home"></i></a></span> <span><a href="cart">Carrito</a></span> <span>Pagar</span></h2>
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
								<h3><a href="cart">Orden</a></h3>
							</div>
							<div class="process text-center active">
								<p><span>02</span></p>
								<h3><a href="checkout">Pagar Orden</a></h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3><a href="order-complete">Orden Completada</a></h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
						<form method="post" class="colorlib-form">
							<h2>Detalles de Facturación</h2>
		              	<div class="row">
			               
			               <div class="form-group">
									<div class="col-md-6">
									<label for="lname">Nombre</label>
										<label for="fname" id="fname" class="form-control"><?php echo($cliente[3])?></label>
									</div>
									<div class="col-md-6">
										<label for="lname">Apellido</label>
										<label for="lname" id="lname" class="form-control"> <?php echo($cliente[4]) ?> </label>
									</div>
								</div>
			               <div class="col-md-12">
									<div class="form-group">
										<label for="fname">Dirección</label>
			                    	<label id="address" class="form-control"> <?php echo("calle ".$cliente[8]." Numero #". $cliente[6])?> </label>
			                  </div>
			                  
			               </div>
			               <div class="col-md-12">
									<div class="form-group">
										<label for="companyname">Ciudad</label>
										<label for="lname" id="towncity" class="form-control"> <?php echo($cliente[13])?> </label>
			                    	
			                  </div>
			               </div>
			               <div class="form-group">
									<div class="col-md-6">
										<label for="stateprovince">Estado</label>
										<label for="lname" id="fname" class="form-control"> <?php echo($cliente[14])?></label>
										
									</div>
									<div class="col-md-6">
										<label for="lname">Código Postal</label>
										<label for="lname" id="fname" class="form-control"> <?php echo($cliente[11])?></label>
										
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-6">
										<label for="email">Correo electrónico</label>
										<label for="lname" id="email" class="form-control"> <?php echo($cliente[1])?></label>
										
									</div>
									<div class="col-md-6">
										<label for="Phone">Número telefónico</label>
										<label for="lname" id="zippostalcode" class="form-control"> <?php echo($cliente[5])?></label>
										
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
								<a href="profile" class="btn btn-primary btn-outline">Editar Datos</a>
		              </div>
		            </form>
					</div>
					<div class="col-md-5">
						<div class="cart-detail">
							<h2>Total del carro</h2>
							<ul>
								<li>
									<?php
									$total = 0;
									$i =0;
									while($i < count($Resultado)){
										$total = $total +( (int) $Resultado[$i][2] * (int) $Resultado[$i][3] );
										$i++;
									}
									?>
									<span>Subtotal</span> <span><?php echo('$'.$total.'.00')?></span>
									<ul>
										<?php 
										$i=0;
										while($i < count($Resultado)){
											echo('<li><span>'.$Resultado[$i][3].' x '.$Resultado[$i][1] .'</span> <span>$'.$Resultado[$i][2]*$Resultado[$i][3].'.00</span></li>');
											$i++;
										}
										?>
										
										<!-- <li><span>1 x Audífonos inalámbricos RP-BTD10</span> <span>$3,575.00</span></li> --> 
									</ul>
								</li>
								<li><span>Envio</span> <span>$0.00</span></li>
								<li><span>Total</span> <span> <?php echo('$'.$total.'.00')?></span></li>
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

