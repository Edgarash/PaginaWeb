<?php
    include_once('php/Clases/conexion.php'); 
    session_start();
    if (!isset($_SESSION['Sesion'])) {
        print '<h1 style="position:absolute;">llego</h1>';
        $_SESSION['URL_Origen'] = $_SERVER['PHP_SELF'];
        header('Location: login');
        exit();
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
               /*0*/ array_push($cliente,$fila['ID']);
               /*1*/ array_push($cliente,$fila['Email']);
               /*2*/ array_push($cliente,$fila['Contrasena']);
               /*3*/ array_push($cliente,$fila['Nombre']);
               /*4*/ array_push($cliente,$fila['Apellidos']);
               /*5*/ array_push($cliente,$fila['Telefono']);
               /*6*/ array_push($cliente,$fila['NumExterior']);
               /*7*/ array_push($cliente,$fila['NumInterior']);
               /*8*/ array_push($cliente,$fila['Calle']);
               /*9*/ array_push($cliente,$fila['EntreCalles']);
               /*10*/ array_push($cliente,$fila['Referencia']);
               /*11*/ array_push($cliente,$fila['CP']);
               /*12*/ array_push($cliente,$fila['Colonia']);
               /*13*/ array_push($cliente,$fila['Municipio']);
               /*14*/ array_push($cliente,$fila['Estado']);
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
    <title>Perfil - TecnoCompra</title>
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
                                        <h1>Datos Generales</h1>
                                        <h2 class="bread">
                                            <span>
                                                <a href="index">
                                                    <i class="icon-home"></i>
                                                </a>
                                            </span>
                                        </h2>
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
                    <div class="col-md-3">
                        <div class="sidebar">
                            <div class="side">
                                <h2>Mi Perfil</h2>
                                <div class="fancy-collapse-panel">
                                    <div class="panel-group" role="tablist">
                                        <div class="panel panel-default">
                                            <div class="panel">
                                                <h4 class="panel-title" style="color:#cc0000">
                                                    <a href="profile">
                                                        <i class="icon-user"></i>
                                                        Datos Generales
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel">
                                                <h4 class="panel-title">
                                                    <a href="cart">
                                                        <i class="icon-shopping-cart"></i>
                                                        Carrito
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <form action="php/cart_proceso.php" method="post" class="colorlib-form">
                            <div class="row">
                                <h2>
                                    <i class="icon-cog"></i> Datos de cuenta</h2>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">
                                            <i class="icon-envelope"></i> Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo($cliente[1])  ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pass">Contraseña</label>
                                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña" value="">
                                    </div>
                                </div>
                                <div class="col-md-12 hr8"></div>
                                <div class="form-group"></div>
                                <div class="form-group"></div>
                                <h2>
                                    <i class="icon-user"></i> Datos personales</h2>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Nombre</label>
                                        <input type="text" name="fname" id="fname" class="form-control" placeholder="Su Nombre" value="<?php echo($cliente[3])  ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Apellidos</label>
                                        <input type="text" name="lname" id="lname" class="form-control" placeholder="Sus Apellidos" value="<?php echo($cliente[4])  ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tel">
                                            <i class="icon-phone"></i> Teléfono</label>
                                        <input type="tel" name="tel" id="tel" class="form-control" placeholder="Teléfono" value="<?php echo($cliente[5])  ?>">
                                    </div>
                                </div>
                                <div class="form-group"></div>
                                <div class="form-group"></div>
                                <h2 style="clear: both;">
                                    <i class="icon-map-marker"></i> Domicilio</h2>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="calle">
                                            <i class="icon-road"></i> Calle</label>
                                        <input type="text" name="calle" id="calle" class="form-control" placeholder="Calle" value="<?php echo($cliente[8])  ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="next">N° Ext</label>
                                        <input type="text" name="next" id="next" class="form-control" placeholder="N° Exterior" value="<?php echo($cliente[6])  ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nint">N° Int</label>
                                        <input type="text" name="nint" id="nint" class="form-control" placeholder="N° Interior" value="<?php echo($cliente[7])  ?>">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="ecalles">Entre Calles (Opcional)</label>
                                        <input type="text" name="ecalles" id="ecalles" placeholder="Calles" class="form-control" value="<?php echo($cliente[9])  ?>">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="ref">Referencias (Opcional)</label>
                                        <input type="text" name="ref" id="ref" class="form-control" placeholder="Referencias" value="<?php echo($cliente[10])  ?>">
                                    </div>
                                </div>
                                <div class="col-md-3" style="clear: left;">
                                    <div class="form-group">
                                        <label for="cp">Código Postal</label>
                                        <input type="text" name="cp" id="cp" class="form-control" placeholder="Código Postal" value="<?php echo($cliente[11])  ?>">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="col">Colonia</label>
                                        <input type="text" name="col" id="col" class="form-control" placeholder="Colonia" value="<?php echo($cliente[12])  ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mun">Municipio</label>
                                        <input type="text" name="mun" id="mun" class="form-control" placeholder="Municipio" value="<?php echo($cliente[13])  ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="est">Estado</label>
                                        <input type="text" name="est" id="est" class="form-control" placeholder="Estado" value="<?php echo($cliente[14])  ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-push-9 text-center">
							    <input type="hidden" name="Cantidad">
							    <button type="submit" class="btn btn-primary " name="actualizar"> Guardar Datos </button>
							    </div>
                                </div>
                        </form>
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