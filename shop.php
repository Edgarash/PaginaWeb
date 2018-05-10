<?php
session_start();
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
				  <div class="col-xs-12" style="margin-left:45rem">
						<form role="search">
								<div class="form-group">
									<div class="col-xs-3">
										<input type="text" class="form-control" placeholder="Buscar">
									</div>
									<div class="col-xs-3">
										<button type="submit" class="btn cart">
											<span class="icon icon-search"></span>
										</button>
									</div>
							</div>
						</form>
					</div>
			  </div>
			  
		</aside>
		

		<div class="colorlib-shop">
			
			<div class="container">
				<div class="row">
					
					<div class="col-md-10 col-md-push-2">
						<div class="row row-pb-lg">
							
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/eduardo-celular2.jpg);">
										<p class="tag"><span class="new">Nuevo</span></p>
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
												<span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product-detail">Xiaomi Redmi 4</a></h3>
										<p class="price"><span>$300.00</span></p>
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/eduardo-celular.jpg);">
										<p class="tag"><span class="sale">Oferta</span></p>
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
												<span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product-detail">SAMSUNG GALAXY S8 64GB</a></h3>
										<p class="price"><span>$9,500.00</span> <span class="sale">$11,000.00</span> </p>
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/eduardo-camara.jpg);">
										<p class="tag"><span class="new">Nuevo</span></p>
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
												<span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product-detail">Cámara SLR Nikon D D7200</a></h3>
										<p class="price"><span>$10,400.00</span></p>
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/eduardo-audifonos.jpg);">
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
												<span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product-detail">Original Bluedio T4</a></h3>
										<p class="price"><span>$182.00</span></p>
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/eduardo-teclado.jpg);">
										
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
												<span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product-detail">Teclado Razer Cynosa Pro </a></h3>
										<p class="price"><span>$700.00</span> 
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/eduardo-camara2.jpg	);">
										<p class="tag"><span class="new">Nuevo</span></p>
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
												<span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product-detail">Sony Cyber Shot Dsc-h300</a></h3>
										<p class="price"><span>$4,690.00</span></p>
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/eduardo-Laptop.jpg);">
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
												<span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product-detail">Hp Laptop Pavilion</a></h3>
										<p class="price"><span>$6,499.00</span></p>
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/eduardo-usb.jpg);">
										<p class="tag"><span class="new">Nuevo</span></p>
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
												<span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product-detail">Usb Kingston Usb 3.0 16gb </a></h3>
										<p class="price"><span>$120.00</span></p>
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center">
								<div class="product-entry">
									
									<div class="product-img" style="background-image: url(images/eduardo-Laptop2.jpg);">
										<p class="tag"><span class="new">Nuevo</span></p>
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
												<span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product-detail">Hp Stream Intel </a></h3>
										<p class="price"><span>$3,990.00</span></p>
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/eduardo-impresora.jpg);">
										<p class="tag"><span class="new">Nuevo</span></p>
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
												<span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product-detail">Multifuncional Hp Officejet Pro 6970</a></h3>
										<p class="price"><span>$1,300.00</span></p>
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/eduardo-pc.jpg);">
										<p class="tag"><span class="new">Nuevo</span></p>
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
												<span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product-detail">Dell Vostro 3250</a></h3>
										<p class="price"><span>$11,500.00</span></p>
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(images/eduardo-audifonos2.jpg);">
										<p class="tag"><span class="new">Nuevo</span></p>
										<div class="cart">
											<p>
												<span class="addtocart"><a href="cart"><i class="icon-shopping-cart"></i></a></span> 
												<span><a href="product-detail"><i class="icon-eye"></i></a></span> 
												<span><a href="#"><i class="icon-heart3"></i></a></span>
												<span><a href="add-to-wishlist"><i class="icon-bar-chart"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="product-detail">Redlemon Audífonos Deportivos</a></h3>
										<p class="price"><span>$189.00</span></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<ul class="pagination">
									<li class="disabled"><a href="#">&laquo;</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">&raquo;</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-md-pull-10">
						<div class="sidebar">
							<div class="side">
								<h2>Categorías</h2>
								<div class="fancy-collapse-panel">
			                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			                     <div class="panel panel-default">
			                         <div class="panel-heading" role="tab" id="headingOne">
			                             <h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed" style="width: 150px;">Computadoras
											</a>
			                             </h4>
			                         </div>
			                         <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			                             <div class="panel-body">
			                                 <ul>
			                                 	<li><a href="#">Laptops</a></li>
			                                 	<li><a href="#">Desktops</a></li>
			                                 </ul>
			                             </div>
			                         </div>
			                     </div>
			                     <div class="panel panel-default">
			                         <div class="panel-heading" role="tab" id="headingTwo">
			                             <h4 class="panel-title">
			                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="width: 150px">Almacenamiento
			                                 </a>
			                             </h4>
			                         </div>
			                         <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			                             <div class="panel-body">
			                                <ul>
			                                 	<li><a href="#"> unidades flash USB, </a></li>
			                                 	<li><a href="#">disco duros</a></li>
			                                 </ul>
			                             </div>
			                         </div>
			                     </div>
			                     <div class="panel panel-default">
			                         <div class="panel-heading" role="tab" id="headingThree">
			                             <h4 class="panel-title">
			                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="width: 150px">Telefonía
			                                 </a>
			                             </h4>
			                         </div>
			                         <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			                             <div class="panel-body">
			                                
			                             </div>
			                         </div>
			                     </div>
			                     <div class="panel panel-default">
			                         <div class="panel-heading" role="tab" id="headingFour">
			                             <h4 class="panel-title">
			                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree" style="width: 150px">Accesorios
			                                 </a>
			                             </h4>
			                         </div>
			                         <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
			                             <div class="panel-body">
			                                <ul>
			                                 	<li><a href="#">Jeans</a></li>
			                                 	<li><a href="#">T-Shirt</a></li>
			                                 	<li><a href="#">Jacket</a></li>
			                                 	<li><a href="#">Shoes</a></li>
			                                 </ul>
			                             </div>
			                         </div>
			                     </div>
			                  </div>
			               </div>
							</div>
							<div class="side">
								<h2>Rango de Precios</h2>
								<form method="post" class="colorlib-form-2">
				              	<div class="row">
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="guests">Minimo:</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <select name="people" id="people" class="form-control">
				                        <option value="#">1</option>
				                        <option value="#">200</option>
				                        <option value="#">300</option>
				                        <option value="#">400</option>
				                        <option value="#">1000</option>
				                      </select>
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="guests">Maximo:</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <select name="people" id="people" class="form-control">
				                        <option value="#">2000</option>
				                        <option value="#">4000</option>
				                        <option value="#">6000</option>
				                        <option value="#">8000</option>
				                        <option value="#">10000</option>
				                      </select>
				                    </div>
				                  </div>
				                </div>
				              </div>
				            </form>
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