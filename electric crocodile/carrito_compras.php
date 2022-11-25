<?php
error_reporting(0);
	session_start();
	$sesionuser= $_SESSION['usuario'];
	$cantidad_importada=$_SESSION['cantidad_importada'];
	$precio_producto=$_SESSION['precio_producto'];
	 $id_producto=$_SESSION['id_producto'];
	$_SESSION['ref_carro3'];
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

		?>
	<section style="height: auto;" class="cliente_section">
		<div style="height: auto;" id="titles_div_store">
			<h1 id="store_title">VERIFICA INFORMACION ANTES DE ENVIARNOS EL PEDIDO</h1>
			<?php

				$carrito_muestreo="SELECT * FROM carro_compras WHERE cliente_curp='$curp_cliente' AND ref_carro='".$_SESSION['ref_carro3']."'";
				$sql_carrito_pre=mysqli_query($connect,$carrito_muestreo);

				//mostrar nuevo usuario
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
						<td id='eliminar_td'>
							<a href='eliminar_producto_carro.php?carro_id=".$fila['carro_id']."'>Eliminar</a>
						</td>
					</tr>";
					}					
					echo "</table></div></center>";
					echo "<br>";
					//GENERAR ARRAY DE LOS IDS DEL CARRO
					$instruccion_carrosIDS="SELECT carro_id FROM carro_compras WHERE  ref_carro='".$_SESSION['ref_carro3']."'";
					$query_carrosIDS=mysqli_query($connect,$instruccion_carrosIDS);


					$instruccion_sacar_totales="SELECT sub_total FROM carro_compras WHERE ref_carro='".$_SESSION['ref_carro3']."'";
					$mysqli_query_totales=mysqli_query($connect,$instruccion_sacar_totales);
					$j=0;
					$total_final=0;
					while($totales=mysqli_fetch_assoc($mysqli_query_totales)){
						$total_final +=$totales['sub_total'];
						$j++;
					}
					echo "<br>".$total_final;
					$fecha_pedido=$_POST['fecha_pedido'];
					$num_tarjeta=$_POST['num_tarjeta'];
					$instruccion_upd_tarjeta="UPDATE control_pedido SET num_tarjeta='$num_tarjeta' WHERE curp_cliente='$curp_cliente'";
					$query_tarjeta=mysqli_query($connect,$instruccion_upd_tarjeta);
			

					$i=0;
					while ($idsarr=mysqli_fetch_assoc($query_carrosIDS)) {
						echo $idsarr['carro_id'];
						
						$instruccion_generar_pedido="INSERT INTO control_pedido (id_carro, fecha_pedido, curp_cliente, monto_final,num_tarjeta) 
						VALUES('".$idsarr['carro_id']."','$fecha_pedido','$curp_cliente','$total_final','$num_tarjeta')";
							echo "<span style='background:white;'>".$instruccion_generar_pedido."</span>";
						$confirmar_pedido=mysqli_query($connect,$instruccion_generar_pedido);
						$i++;
					}


					

				
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