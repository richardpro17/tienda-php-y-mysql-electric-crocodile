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
	<title>GESTIONAR STOCK</title>
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


		//INSERTAR STOCK POR PRODUCTO
		$obtener_ids_productos="SELECT id_producto,cantidad_importada FROM producto";
		$query_ids_productos=mysqli_query($connect,$obtener_ids_productos);
		$j=0;
		$i=0;
		$total_comprada=0;





		
		while ($ids_productos_arr=mysqli_fetch_assoc($query_ids_productos)) {
			/*echo $ids_productos_arr['id_producto']."<br>";
			echo "<br>".$ids_productos_arr['cantidad_importada']."<br>";*/
			$obtener_cantidad_comprada_total="SELECT cantidad_comprada FROM carro_compras WHERE producto_id='".$ids_productos_arr['id_producto']."'";
			$query_cantidad_comprada=mysqli_query($connect,$obtener_cantidad_comprada_total);
			while($total_comprada=mysqli_fetch_assoc($query_cantidad_comprada)){
				
				$total_final_comprada +=$total_comprada['cantidad_comprada'];
				
				$j++;
			}
			$disponible_c=$ids_productos_arr['cantidad_importada'] - $total_final_comprada;
			$RESETEO_STOCK="DELETE FROM stock WHERE producto_id='".$ids_productos_arr['id_producto']."'";
			$RELSETO_QUERY=mysqli_query($connect,$RESETEO_STOCK);
			$insert_stock="INSERT INTO stock (producto_id, importada_cantidad, comprada_cantidad, disponible) VALUES ('".$ids_productos_arr['id_producto']."','".$ids_productos_arr['cantidad_importada']."','$total_final_comprada','$disponible_c')";
			$query_stock=mysqli_query($connect,$insert_stock);
			/*/echo "<br><span style='color:white'>ID".$ids_productos_arr['id_producto']."  TOTAL".$total_final_comprada."</span><br>";*/
			$total_final_comprada=0;
			$i++;
		}
		

		
		//MOSTRAR TODO EL STOCK
		$INST_STOCK_ENTERO="SELECT * FROM stock";
		$QUERY_STOCK=mysqli_query($connect,$INST_STOCK_ENTERO);

		if($QUERY_STOCK){
			/*echo "SE REALIZO LA CONSULTA DE LA TABLA STOCK";*/
			$validacion=1;
		}else{
			echo"NO SE HIZO LA CONSULTA";
			$validacion=0;
		}

		if($validacion==1){
				echo "<center><div id='table'>
				<table id='gestion_cliente_tbl'>
				<caption>TABLA STOCK</caption>
				<tr id='tr_header_cliente'>
    				<th>CLAVE Stock</th>
   	 				<th>Producto ID</th>
    				<th>Cantidad Importada</th>
    				<th>Cantidad Comprada</th>
    				<th>Disponible</th>
  				</tr>";
				while ($fila_stock_final=mysqli_fetch_row($QUERY_STOCK)) {
				//desplegar los registros
				echo '<tr>
					<td id="td_id">'.$fila_stock_final[0] . " "."</td>
					<td id='tdgc'>".$fila_stock_final[1] . " "."</td>
					<td id='tdgc'>".$fila_stock_final[2] . " "."</td>
					<td id='tdgc'>".$fila_stock_final[3] . " "."</td>
					<td id='tdgc'>".$fila_stock_final[4] . " "."</td>
				</tr>";
				}
				echo "</table></div></center>";
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