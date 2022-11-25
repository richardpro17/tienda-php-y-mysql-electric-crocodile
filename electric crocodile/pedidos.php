<?php
error_reporting(0);
	session_start();
	$sesionuser= $_SESSION['usuario'];
	/*if($sesionuser == null || $sesionuser ==''){
		echo 'Usted no esta autorizado';
		die();
	}

	*/

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta author="Ricardo Montalvo">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PEDIDOS CROCODILE</title>
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
			<li><a href="historial_carrito.php">HISTORIAL DE COMPRAS</a></li>
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
			$instruccion_curp="SELECT * FROM cliente where usuario='$sesionuser'";
				$confirmar_busqueda_query=mysqli_query($connect,$instruccion_curp);
				$curpm=mysqli_fetch_assoc($confirmar_busqueda_query);
				$curp_cliente=$curpm['curp'];
				$direccion=$curpm['direccion'];
				$ciudad=$curpm['ciudad'];
				
				$tarjet_sql="SELECT num_tarjeta FROM control_pedido WHERE curp_cliente='$curp_cliente'";
				$tarjet_query=mysqli_query($connect,$tarjet_sql);
				$numquery_tarjeta=mysqli_fetch_assoc($tarjet_query);
				$num_tarjeta=$numquery_tarjeta['num_tarjeta'];

		?>
	<section style="height: auto;" class="cliente_section">
		<div id="titles_div_store">
			<!--INFO DEL PEDIDO-->
			<div class="info_pedido">
				<div id="div_info1">
					<br>
					<h3>TU CURP: <span><?php echo $curp_cliente;?></span></h3><br><br>
					<h3>TU DIRECCION: <span><?php echo $direccion." ".$ciudad;?></span></h3>
				</div>
				<div id="div_info2">
					<h3>TU TARJETA: </h3>
					<span><?php echo $num_tarjeta;?></span>
					<span id="tarjet_number"><?php echo $num_tarjeta;?></span>
					<img id="tarjeta_credito" src="https://i.postimg.cc/1RHc453d/TU-BANCO.png">
				</div>
			</div>
			<h1 id="store_title">VERIFICA INFORMACION DEL PEDIDO</h1>
			<?php
				//mostrar pedidos
				$carrito_muestreo="SELECT * FROM carro_compras WHERE cliente_curp='$curp_cliente'";
				$sql_carrito_pre=mysqli_query($connect,$carrito_muestreo);

				$instruccion_pedido="SELECT * FROM control_pedido WHERE curp_cliente='$curp_cliente'";
				$sql_pedidos=mysqli_query($connect,$instruccion_pedido);

				//mostrar nuevo usuario
					echo "<center><div id='table'>
					<table id='cliente-tbl'>
					<caption>TUS PEDIDOS</caption>
					<tr id='tr_header'>
	    				<th>CLAVE DE PEDIDO</th>
	    				<th>CARRO ID</th>
	    				<th>FECHA DE PEDIDO</th>
	    				<th>TU CURP</th>
	    				<th>MONTO FINAL</th>

	  				</tr>";
					while ($fila_pedido=mysqli_fetch_assoc($sql_pedidos)) {
						echo '<tr>
						<td id="td_id">'.$fila_pedido['clave_pedido'] . " "."</td>
						<td>".$fila_pedido['id_carro'] . " "."</td>
						<td>".$fila_pedido['fecha_pedido'] . " "."</td>
						<td>".$fila_pedido['curp_cliente'] . " "."</td>
						<td>".$fila_pedido['monto_final'] . " "."</td>
						<td id='eliminar_td'>
							<a href='eliminar_pedido.php?clave_pedido=".$fila_pedido['clave_pedido']."'>Eliminar</a>
						</td>
					</tr>";
					}					
					echo "</table></div></center>";
					echo "<br>";


					


			?>

		</div><br>
	</section>
	<footer>
		<a target="_blank" href="https://github.com/richardpro17"><img id="img6" src="https://i.postimg.cc/mDn2gHB0/github-1000-500-px.png"></a>
		<span>Richard Computer Store<br> 2022-2023 &#169;</span>
		<img id="img7" src='https://i.postimg.cc/d3nx7bhR/sql-1000-500-px.png' border='0' alt='Inicio'/>
	</footer>
	
</body>
</html>