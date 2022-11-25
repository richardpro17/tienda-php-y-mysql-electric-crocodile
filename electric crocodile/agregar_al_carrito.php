<?php
error_reporting(0);
	session_start();
	$sesionuser= $_SESSION['usuario'];
	$cantidad_importada=$_SESSION['cantidad_importada'];
	$precio_producto=$_SESSION['precio_producto'];
	 $id_producto=$_SESSION['id_producto'];
	$_SESSION['ref_carro'];
	$subtotal= $_SESSION['subtotal'];
	/*if($sesionuser == null || $sesionuser ==''){
		echo 'Usted no esta autorizado';
		die();
	}

if(empty($_SESSION['carrito']) || empty($_SESSION['cantidad_array']) || empty($_SESSION['precio_array'])){
		$_SESSION['carrito'] = array(
			'id_producto' => $_SESSION['id_producto']
		);
		$_SESSION['cantidad_array'] = array(
			'cantidad_comprada' => $_SESSION['cantidad_importada'],
		);
		$_SESSION['precio_array'] = array(
			'sub_total' => $_SESSION['precio_producto'],
		);
	}
	*/
	

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta author="Ricardo Montalvo">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TIENDA ELECTRIC CROCODILE</title>
	<link rel="stylesheet" type="text/css" href="electricstyles.css">
	<link rel="icon" type="image/png" href="icon_crocodile.png">
</head>
<body>

	<header>
			<img id="header-img"src="https://i.postimg.cc/B62C9j9t/Copia-de-LOGO-ELECTRIC-CROCODILE-500-160-px-500-140-px.png" alt="electric crocodile store">
			<div CLASS="user_state">
				<img width="20%" src="https://cdn-icons-png.flaticon.com/512/5969/5969433.png">
				<span style="width: auto;">Cliente: <?php echo $sesionuser;?></span>
				<a style="color: white;" href="cerrar_sesion.php">CERRAR SESION</a>
			</div>
	</header>
	<nav>
		<ul>
			<li><a href="main_cliente.php">Perfil</a></li>
			<li><a href="tienda.php">TIENDA</a></li>
			<li><a href="pedidos.php">PEDIDOS</a></li>
		</ul>
	</nav>
	<?php
	//CONEXION
			$user='root';
			$db='electric crocodile';
			$host='localhost';
			$password='';
			$connect=mysqli_connect($host,$user,$password,$db);
			if($connect){
				echo '<h2 id="id_bd1">Se realizo la conexion de forma correcta que PRO</h2>';
			}else{
				echo '<h2 id="id_bd2">Error al conectar la base de datos pro, no se realizo de forma correcta</h2>';
			}
			$instruccion_curp="SELECT curp FROM cliente where usuario='$sesionuser'";
				$confirmar_busqueda_query=mysqli_query($connect,$instruccion_curp);
				$curpm=mysqli_fetch_assoc($confirmar_busqueda_query);
				$curp_cliente=$curpm['curp'];
				echo $curp_cliente;	

		?>
	<section style="height: auto;" class="cliente_section">
		<div id="titles_div_store">
			<h1 id="store_title">PRODUCTO AGREGADO</h1>
			<span id="store_span">Ver carrito<a href="carrito_compras.php">CLIC AQUI</a></span>
			<?php
				
				$n = 4;
				$ref_carro = bin2hex(random_bytes($n));
				$ref_carro = strtoupper($ref_carro);
				$_SESSION['$ref_carro']=$ref_carro;
				$ref_carro2=$_SESSION['$ref_carro'];
				echo $ref_carro2."<br><br>";
				
				$upd_clave_ref="UPDATE carro_compras SET ref_carro='$ref_carro' WHERE cliente_curp ='$curp_cliente' AND ref_carro='HJYUBN75'";
				$resultado_actualizacion=mysqli_query($connect,$upd_clave_ref);
				if(!$resultado_actualizacion){
				echo "NO SE ACTUALIZARON";
				}else{
				$validacion=1;
				}

				$carrito_muestreo="SELECT * FROM carro_compras WHERE cliente_curp='$curp_cliente' AND ref_carro='$ref_carro2'";
				$sql_carrito_pre=mysqli_query($connect,$carrito_muestreo);

				//mostrar nuevo usuario
				if($validacion==1){
					echo "<center><div id='table'>
					<table id='cliente-tbl'>
					<caption>PROCESAR CARRITO DE COMPRAS</caption>
					<tr id='tr_header'>
	    				<th>#</th>
	    				<th>Producto ID</th>
	    				<th>TU CURP</th>
	    				<th>Cantidad Comprada</th>
	    				<th>Sub Total</th>
	    				<th>Referencia de Carrito</th>
	  				</tr>";
					while ($fila=mysqli_fetch_assoc($sql_carrito_pre)) {
						echo '<tr>
						<td id="td_id">'.$fila['carro_id'] . " "."</td>
						<td>".$fila['producto_id'] . " "."</td>
						<td>".$fila['cliente_curp'] . " "."</td>
						<td>".$fila['cantidad_comprada'] . " "."</td>
						<td>".$fila['sub_total'] . " "."</td>
						<td>".$fila['ref_carro'] . " "."</td>
					</tr>";
					}					
					echo "</table></div></center>";
					echo "<br>";
					


				}
				$refcarroconsulta="SELECT ref_carro FROM carro_compras WHERE cliente_curp='$curp_cliente' AND ref_carro='$ref_carro2'";
				$conREF=mysqli_query($connect,$refcarroconsulta);
				$ref_carroFF=mysqli_fetch_assoc($conREF);
				$_SESSION['ref_carro3']=$ref_carroFF['ref_carro'];
				echo $_SESSION['subtotal'];
			?>
		
		<div class="form_g">
			<form action="carrito_compras.php" method="POST">
				<h1>Agregar Numero de Tarjeta</h1>
					<div>
						<label>Numero de tarjeta minimo 16 digitos</label> 
						<input  id="tarjet_number2" pattern="[0-9]{16}" type="text" name="num_tarjeta" required><br>
					</div>
					<div>
						<label>Fecha de Pedido:</label>
						<input   type="date" name="fecha_pedido" required><br>
					</div>
				
				<center><input name="procesar_pedido" id="comprar_button" value="Procesar PEDIDO" type="submit"></center>
			</form>
		</div>
		</div><br>
		
	</section>
	<footer>
		<a target="_blank" href="https://github.com/richardpro17"><img id="img6" src="https://i.postimg.cc/mDn2gHB0/github-1000-500-px.png"></a>
		<span>Richard Computer Store<br> 2022-2023 &#169;</span>
		<img id="img7" src='https://i.postimg.cc/d3nx7bhR/sql-1000-500-px.png' border='0' alt='Inicio'/>
	</footer>
	
</body>
</html>