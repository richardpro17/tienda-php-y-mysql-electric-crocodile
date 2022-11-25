<?php
error_reporting(0);
	session_start();
	$sesionuser= $_SESSION['usuario'];
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
	<title>LOGIN CLIENTE</title>
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

			//COMPROBAR LOGIN
		?>
	<section style="height: auto;" class="cliente_section">
		<?php
			$cliete_mostrar="SELECT * FROM cliente WHERE usuario = '$sesionuser'";
			$cliente_cosulta=mysqli_query($connect,$cliete_mostrar);
			if($cliete_mostrar){
				
				$validacion=1;
			}else{
				echo "<h2>error</h2>";
				$validacion=0;
			}

			echo "<center><div id='table'>
					<table id='cliente-tbl'>
					<caption>DATOS DEL CLIENTE:".$sesionuser."</caption>
					<tr id='tr_header'>
	    				<th>CURP</th>
	    				<th>Nombre Cliente</th>
	    				<th>Usuario</th>
	    				<th>Telefono</th>
	    				<th>Direccion</th>
	    				<th>Ciudad</th>
	  				</tr>";
					$fila=mysqli_fetch_assoc($cliente_cosulta);
					//desplegar los registros
					echo '<tr>
						<td id="td_id">'.$fila['curp'] . " "."</td>
						<td>".$fila['nombre_cliente'] . " "."</td>
						<td>".$fila['usuario'] . " "."</td>
						<td>".$fila['telefono'] . " "."</td>
						<td>".$fila['direccion'] . " "."</td>
						<td>".$fila['ciudad'] . " "."</td>
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