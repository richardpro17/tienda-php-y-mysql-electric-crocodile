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
	<title>HISTORIAL CARRITO CROCODILE</title>
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
			$instruccion_curp="SELECT curp FROM cliente where usuario='$sesionuser'";
				$confirmar_busqueda_query=mysqli_query($connect,$instruccion_curp);
				$curpm=mysqli_fetch_assoc($confirmar_busqueda_query);
				$curp_cliente=$curpm['curp'];

				

		?>
	<section style="height: auto;" class="cliente_section">
		<div id="titles_div_store">
			<h1 id="store_title">HISTORIAL DE TUS CARRITOS DE COMPRAS</h1>
			<?php
				//mostrar pedidos
				$carrito_muestreo="SELECT * FROM carro_compras WHERE cliente_curp='$curp_cliente'";
				$sql_carrito_pre=mysqli_query($connect,$carrito_muestreo);


				//mostrar nuevo usuario
					echo "<center><div id='table'>
					<table id='cliente-tbl'>
					<caption>TUS CARRITOS DE COMPRAS</caption>
					<tr id='tr_header'>
	    				<th>#ID CARRITO</th>
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
						<td id='eliminar_td'>
							<a href='eliminar_producto_carro.php?carro_id=".$fila['carro_id']."'>Eliminar</a>
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