<?php
session_start();
include_once 'php/Clases/Categorias.php';
include_once 'php/Clases/SubCategorias.php';
include_once 'php/Clases/Articulos.php';
$Categorias = null;
$Categorias = ObtenerCategoriasActivas();
if (isset($_GET['subcat'])) {
	$SubCategoria = (!empty($_GET['subcat'])) ?  $_GET['subcat'] : -1;
	$ArticulosSubs = obtenerPorSubCategorias($SubCategoria);
}
?>
<!DOCTYPE HTML>
<html>
	<head>
	<?php
	include_once('php/head.php');
	?>
	<title>Tienda - TecnoCompra</title>
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
				   					<h1>Productos</h1>
				   					<h2 class="bread"><span><a href="index"><i class="icon-home"></i></a></span> <span>Comprar</span></h2>
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
				<div class="row">
					
					<div class="col-md-9 col-md-push-3">
						<div class="row row-pb-lg">
							<?php 
							if (isset($ArticulosSubs) && !empty($ArticulosSubs)) {
								for ($i=0; $i < count($ArticulosSubs); $i++) {

								
							?>
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(<?php echo _ARTICULO.$ArticulosSubs[$i]->getID() ?>_1);background-size:contain;">
										<div class="cart">
											<p>
												<span class="addtocart"><a href="<?php echo !isset($_SESSION['Nombre']) ? 'Login' : ('product/'.$ArticulosSubs[$i]->getID()) ?>"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="product-detail?ID=<?php echo $ArticulosSubs[$i]->getID();?>"><i class="icon-eye"></i></a></span> 
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product-detail"><?php echo $ArticulosSubs[$i]->getNombre(); ?></a></h3>
										<p class="price"><span>$<?php echo $ArticulosSubs[$i]->getPrecio(); ?></span></p>
									</div>
								</div>
							</div>
							<?php
								}
							} else {
								echo '<h1>No se encontraron productos</h1>';
							}
							?>
						</div>
					</div>
					<div class="col-md-3 col-md-pull-9">
						<div class="sidebar">
							<div class="side">
								<h2>Categorías</h2>
								<div class="fancy-collapse-panel">
			                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			                     <?php
								 if ($Categorias) {
									 $i = 1;
									 $Numbers = array('One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten');
									 for ($i=0; $i < count($Categorias); $i++) {
										 $Subs = ObtenerSubCategoriasActivas($Categorias[$i]->getID());
										 ?>
										<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="headingTwo">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo 'Cat'.$i;?>" aria-expanded="false" aria-controls="collapseTwo" style="width: 100%"><?php echo $Categorias[$i]->getNombre();?>
												</a>
											</h4>
										</div>
										<div id="collapse<?php echo 'Cat'.$i;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
											<div class="panel-body">
												<ul>
												<?php
													foreach ($Subs as $SubCat) {
														echo '<li><a href="Shop?subcat='.$SubCat->getID().'">'.$SubCat->getNombre().'</a></li>';
													}
												?>
												</ul>
											</div>
										</div>
										</div>
										 <?php
									 }
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

		<div id="colorlib-subscribe">
				<div class="overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="col-md-11 text-center">
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