<?php
	session_start();
	$sesionuser= $_SESSION['clave_marca'];
	if($sesionuser == null || $sesionuser ==''){
		echo 'Usted no esta autorizado';
		die();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta author="Ricardo Montalvo">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PROVEEDOR: INICIO</title>
	<link rel="stylesheet" type="text/css" href="electricstyles.css">
	<link rel="icon" type="image/png" href="icon_crocodile.png">
</head>
<body>

	<header>
			<img id="header-img"src="https://i.postimg.cc/B62C9j9t/Copia-de-LOGO-ELECTRIC-CROCODILE-500-160-px-500-140-px.png" alt="electric crocodile store">
			<div CLASS="user_state">
				<img width="20%" src="https://cdn-icons-png.flaticon.com/512/4003/4003697.png">
				<span style="font-size: 1rem;width: auto;">Proveedor: <?php echo $sesionuser;?></span>
				<a style="color: white;" href="cerrar_sesion.php">CERRAR SESION</a>
			</div>
	</header>
	<nav>
		<ul>
			<li><a href="main_proveedor.php">Perfil</a></li>
			<li><a href="producto.php">Agregar<br>Producto</a></li>
			<li><a href="categoria.php">Agregar<br>Categoria</a></li>
			<li><a href="control_productos.php">Estado<br>Stock</a></li>
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

			//COMPROBAR LOGIN
		?>
	<section>
		
		<?php
			$prov_mostrar="SELECT * FROM proveedor WHERE clave_marca = '$sesionuser'";
			$prov_cosulta=mysqli_query($connect,$prov_mostrar);
			if($prov_cosulta){
				
				$validacion=1;
			}else{
				echo "<h2>error</h2>";
				$validacion=0;
			}

			echo "<center><div id='table'>
				<table id='gestion_cliente_tbl'>
				<caption>PROVEEDOR ".$sesionuser."</caption>
				<tr id='tr_header_cliente'>
    				<th>CLAVE MARCA</th>
   	 				<th>NOMBRE</th>
    				<th>DIRECCION</th>
    				<th>Telefono</th>
  				</tr>";
				$fila_all_proveedor=mysqli_fetch_assoc($prov_cosulta);
				//desplegar los registros
				echo '<tr>
					<td id="td_id">'.$fila_all_proveedor['clave_marca'] . " "."</td>
					<td id='tdgc'>".$fila_all_proveedor['nombre'] . " "."</td>
					<td id='tdgc'>".$fila_all_proveedor['direccion'] . " "."</td>
					<td id='tdgc'>".$fila_all_proveedor['telefono'] . " "."</td>
				</tr>";
				
				echo "</table></div></center>";
				echo "<br>";


		?>
	</section>
	<footer>
		<a target="_blank" href="https://github.com/richardpro17"><img id="img6" src="https://i.postimg.cc/mDn2gHB0/github-1000-500-px.png"></a>
		<span>Richard Computer Store<br> 2022-2023 &#169;</span>
		<img id="img7" src='https://i.postimg.cc/d3nx7bhR/sql-1000-500-px.png' border='0' alt='Inicio'/>
	</footer>
	
</body>
</html>