<?php
error_reporting(0);
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
	<title>PRODUCTO: ELECTRIC CROCODILE</title>
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


			$instruccion_categoria="SELECT id_categoria,nombre_categoria FROm categoria";
			$ejecucion_categoria=mysqli_query($connect,$instruccion_categoria);
			$instruccion_proveedor="SELECT clave_marca FROm proveedor";
			$ejecucion_proveedor=mysqli_query($connect,$instruccion_proveedor);
			$marca_clave=$_SESSION['clave_marca'];
		?>
	<section>
		<h1 id="store_title">PRODUCTOS LISTADOS DE <?php echo $marca_clave;?></h1>
		<?php
			
			//instruccion productos
			$instruccion_mostrar_lista="SELECT producto.marca_clave, producto.id_producto, producto.nombre_producto, producto.cantidad_importada, producto.precio_producto
			FROM producto
			INNER JOIN proveedor ON producto.marca_clave = proveedor.clave_marca WHERE proveedor.clave_marca='$marca_clave'";		
			$consulta_lista=mysqli_query($connect,$instruccion_mostrar_lista);
			if($consulta_lista){
				$validacion=1;
				echo $validacion;
			}else{
				$validacion=0;
			}

			if($validacion ==1){
				echo "<center><div id='table'>
					<table id='cliente-tbl'>
					<caption>Productos de ".$sesionuser."</caption>
					<tr id='tr_header'>
	    				<th>CLAVE MARCA</th>
	    				<th>ID PRODUCTO</th>
	    				<th>Nombre Producto</th>
	    				<th>Cantidad Importada</th>
	    				<th>Precio por producto</th>
	  				</tr>";
	  				while($fila=mysqli_fetch_assoc($consulta_lista)){
	  					//desplegar los registros
						echo '<tr>
							<td id="td_id">'.$fila['marca_clave'] . " "."</td>
							<td>".$fila['id_producto'] . " "."</td>
							<td>".$fila['nombre_producto'] . " "."</td>
							<td>".$fila['cantidad_importada'] . " "."</td>
							<td>".$fila['precio_producto'] . " "."</td>
						</tr>";
	  				}
					echo "</table></div></center>";
					echo "<br>";
			}



			mysqli_close($connect);
		?>
	</section>
	<footer>
		<a target="_blank" href="https://github.com/richardpro17"><img id="img6" src="https://i.postimg.cc/mDn2gHB0/github-1000-500-px.png"></a>
		<span>Richard Computer Store<br> 2022-2023 &#169;</span>
		<img id="img7" src='https://i.postimg.cc/d3nx7bhR/sql-1000-500-px.png' border='0' alt='Inicio'/>
	</footer>
</body>
</html>