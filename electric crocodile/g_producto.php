<?php
	session_start();
	error_reporting(0);
	$sesionuser= $_SESSION['boss'];
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
	<title>GESTIONAR PRODUCTOS</title>
	<link rel="stylesheet" type="text/css" href="electricstyles.css">
	<link rel="icon" type="image/png" href="icon_crocodile.png">
</head>
<body>

	<header>
			<img id="header-img"src="https://i.postimg.cc/B62C9j9t/Copia-de-LOGO-ELECTRIC-CROCODILE-500-160-px-500-140-px.png" alt="electric crocodile store">
			<div CLASS="user_state">
				<img width="20%" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZ7TKHo1NrGHSRkso1dt1oE04qoPOGEKCiUA&usqp=CAU">
				<span>Admin: <?php echo $sesionuser;?></span>
				<a style="color: white;" href="cerrar_sesion.php">CERRAR SESION</a>
			</div>
	</header>
	<nav>
		<ul>
			<li><a href="admin_panel.php">Perfil</a></li>
			<li><a href="g_clientes.php">Gestion<br>Clientes</a></li>
			<li><a href="g_prov.php">Gestion<br> Prov</a></li>
			<li><a href="g_producto.php">Gestion<br> productos</a></li>
			<li><a href="g_categoria.php">Gestion<br> categorias</a></li>
			<li><a href="g_stock.php">Gestion <br>stock</a></li>
			<li><a href="consultas.php">Consultas</a></li>
		</ul>
	</nav>
	<section>
		<?php

		$user='root';
		$db='electric crocodile';
		$host='localhost';
		$password="";

		$connect = mysqli_connect($host,$user,$password,$db);
		if($connect){
				echo '<h2 id="id_bd1">Se realizo la conexion de forma correcta que PRO</h2>';
			}else{
				echo '<h2 id="id_bd2">Error al conectar la base de datos pro, no se realizo de forma correcta</h2>';
			}

		//MUESTREO DE CLIENTE
		$instruccion_producto="SELECT * FROM producto";
		$consulta_producto=mysqli_query($connect,$instruccion_producto);
		if($consulta_producto){
			/*echo "SE REALIZO LA CONSULTA DE LA TABLA PRODUCTOS";*/
			$validacion=1;
		}else{
			echo"NO SE HIZO LA CONSULTA";
			$validacion=0;
		}

		if($validacion==1){
				echo "<div id='table_produc'>
				<table id='gestion_producto_tbl'>
				<caption>TABLA PRODUCTOS</caption>
				<tr id='tr_header_cliente'>
    				<th>ID PRODUCTO</th>
   	 				<th>Nombre Producto</th>
    				<th>Descripcion</th>
    				<th>Cantidad Importada</th>
    				<th>IMAGEN</th>
    				<th>Precio</th>
    				<th>Categoria</th>
    				<th>Marca Clave(Proveedor)</th>
  				</tr>";
				while ($fila=mysqli_fetch_assoc($consulta_producto)) {
				//desplegar los registros
					echo"<tr>
						<td id='td_id'>".$fila['id_producto'] ."</td>
						<td id='tdgc'>".$fila['nombre_producto'] ."</td>
						<td id='tdgc'>".$fila['descripcion_producto'] ."</td>
						<td id='tdgc'>".$fila['cantidad_importada'] ."</td>
						<td id='tdgc'><img width='50%' src='".$fila['img_url'] ."'></td>
						<td id='tdgc'>".$fila['precio_producto'] ."</td>
						<td id='tdgc'>".$fila['categoria_id'] ."</td>
						<td id='tdgc'>".$fila['marca_clave'] ."</td>
						<td id='eliminar_td'>
							<a href='eliminar_producto.php?id_producto=".$fila['id_producto']."'>Eliminar</a>
						</td>
						<td id='editar_td'>
							<a href='editar_producto.php?id_producto=".$fila['id_producto']."'>Editar</a>
						</td>
					</tr>";
				}
				echo "</table></div>";
				echo "<br>";
			}


		?>
		

	</section>
	<footer>
		<a target="_blank" href="https://github.com/richardpro17"><img id="img6" src="https://i.postimg.cc/mDn2gHB0/github-1000-500-px.png"></a>
		<span>Richard Computer Store<br> 2022-2023 &#169;</span>
		<img id="img7" src='https://i.postimg.cc/d3nx7bhR/sql-1000-500-px.png' border='0' alt='Inicio'/>
	</footer>
</body>
</html>
