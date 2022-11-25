<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta author="Ricardo Montalvo">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CLIENTE: ELECTRIC CROCODILE</title>
	<link rel="stylesheet" type="text/css" href="electricstyles.css">
	<link rel="icon" type="image/png" href="icon_crocodile.png">
</head>
<body>

	<header>
			<img id="header-img"src="https://i.postimg.cc/B62C9j9t/Copia-de-LOGO-ELECTRIC-CROCODILE-500-160-px-500-140-px.png" alt="electric crocodile store">
	</header>
	<nav>
		<ul>
			<li><a href="index.html">INICIO</a></li>
			<li><a href="cliente.php">CLIENTE</a></li>
			<li><a href="admin.php">BOSS</a></li>
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
			error_reporting(0);
		?>
	<section style="height: auto;" class="cliente_section">
		<div class="form_g">
			<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
				<h1>REGISTRATE CLIENTE</h1>
				<h3>Ya tienes una cuenta?<a href="cliente_login.php">INICIAR SESION</a></h3>
				<label id="main_label">A continuacion ingresa los datos para darte de alta como cliente de ELECTRIC CROCODILE:</label><br>
				<div>
					<label>CURP:</label><input maxlength="18" pattern="[A-Za-z0-9_]{18}" type="text" name="curp" required><br>
				</div>
				<div>
					<label>Nombre:</label><input pattern="[a-zA-Z0-9 ]+" maxlength="20" type="text" name="nombre_cliente" required><br>
				</div>
				<div>
					<label>Usuario:</label><input maxlength="8" pattern="[A-Za-z0-9_]{8}" type="text" name="usuario" required><br>
				</div>
				<div>
					<label>Telefono:</label><input  pattern="[0-9]{9,15}"type="text" name="telefono" required><br>
				</div>
				<div>
					<label>Direccion:</label><input pattern="[A-Za-z0-9'\.\-\s\,]" type="text" name="direccion" required><br>
				</div>
				<div>
					<label>Ciudad:</label><input  pattern="[A-Za-z]{1,20}" type="text" name="ciudad" required><br>
				</div>
				<div>
					<center><input id="submit_button" value="Registrarme" type="submit" name="registrar_usuario"></center>
				</div>
			</form>
		</div>		
		<?php
			//recuperacion de los datos por ser registro
			$curp=$_POST['curp'];
			$nombre_cliente=$_POST['nombre_cliente'];
			$usuario=$_POST['usuario'];
			$telefono=$_POST['telefono'];
			$direccion=$_POST['direccion'];
			$ciudad=$_POST['ciudad'];
			$registrar_usuario=$_POST['registrar_usuario'];

			if(isset($registrar_usuario)){
				$instruccion_agregar_cliente="INSERT INTO cliente(curp, nombre_cliente, usuario, telefono, direccion, ciudad) VALUES ('$curp','$nombre_cliente','$usuario','$telefono','$direccion','$ciudad')";
				$agregar_sql=mysqli_query($connect,$instruccion_agregar_cliente);

				//validacion de la instruccion
				if(!$agregar_sql){
					echo "<h2>error</h2>";
					$validacion=0;				
				}else{
					echo "<h2>correcto, se registro usuario</h2>";
					$validacion=1;
				}

				//CONSULTA MOSTRA CLIENTE
				$cliente_mostrar="SELECT * FROM cliente WHERE usuario='$usuario'";
				$sql_cliente=mysqli_query($connect,$cliente_mostrar);

				//mostrar nuevo usuario
				if($validacion==1){
					echo "<center><div id='table'>
					<table id='cliente-tbl'>
					<caption>REGISTRO DEL NUEVO CLIENTE</caption>
					<tr id='tr_header'>
	    				<th>CURP</th>
	    				<th>Nombre Cliente</th>
	    				<th>Usuario</th>
	    				<th>Telefono</th>
	    				<th>Direccion</th>
	    				<th>Ciudad</th>
	  				</tr>";
					$fila=mysqli_fetch_row($sql_cliente);
					//desplegar los registros
					echo '<tr>
						<td id="td_id">'.$fila[0] . " "."</td>
						<td>".$fila[1] . " "."</td>
						<td>".$fila[2] . " "."</td>
						<td>".$fila[3] . " "."</td>
						<td>".$fila[4] . " "."</td>
						<td>".$fila[5] . " "."</td>
					</tr>";
					echo "</table></div></center>";
					echo "<br>";
				}

			}else{
				echo "NO HAS DADO CLIC AL BOTON DE REGISTRO";
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