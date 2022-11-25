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
	<title>EDITAR PROVEEDOR</title>
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
		</ul>
	</nav>
	<section  style="height: auto;" class="cliente_section">
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
		
		//instruccion de consulta del usuario y validacion
		$actualizar=$_POST['actualizar'];
		$clave_marca1=$_GET['clave_marca'];
		$instruccion_prov="SELECT * FROM proveedor WHERE clave_marca='$clave_marca1'";
		$query_prov=mysqli_query($connect,$instruccion_prov);
		/*Validar usuarios
		if($fila=mysqli_fetch_assoc($query_cliente)){
			echo "<script languaje='JavaScript'>
					alert ('Bienvenido al sistema');
				</script>";
		}else{
			echo "<script languaje='JavaScript'>
					alert ('Ingresaste datos incorrectos');
				location.assign('admin_panel.php');
				</script>";
		}*/

		if(isset($actualizar)){
			$clave_marca=$_POST['clave_marca'];
			$nombre_proveedor=$_POST['nombre_proveedor'];
			$telefono=$_POST['telefono'];
			$direccion=$_POST['direccion'];
			$registrar_usuario=$_POST['registrar_usuario'];

			//pasar las variables actualizadas a la instruccion
			$actualizacion="UPDATE proveedor 
			SET nombre='$nombre_proveedor',direccion='$direccion',telefono='$telefono' 
			WHERE clave_marca='$clave_marca'";

			$resultado_actualizacion=mysqli_query($connect,$actualizacion);
			if(!$resultado_actualizacion){
			echo "<script languaje='JavaScript'>
				alert('LOS DATOS NO ACTUALIZARON');
					</script>";
			}else{
			
			echo "<script languaje='JavaScript'>
				alert('LOS DATOS SE ACTUALIZARON CORRECTAMENTE');
				location.assign('admin_panel.php');
					</script>";
			}
			

		}else{
			$query_prov=mysqli_query($connect,$instruccion_prov);
			$fila=mysqli_fetch_assoc($query_prov);
			//muestreo de las variables en el formulario
			$clave_marca=$fila['clave_marca'];
			$nombre_proveedor=$fila['nombre'];
			$telefono=$fila['telefono'];
			$direccion=$fila['direccion'];
		}
		
		
		?>	
		<div class="form_g">
			<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
				<h1>ACTUALIZACION PROVEEDOR</h1>
					<label id="main_label">A continuacion actualiza los valores del usuario <?php echo $clave_marca;?> </label>
				<label>CLAVE MARCA: <?php echo $clave_marca1;?></label>
				<input value="<?php echo $clave_marca;?>"  type="hidden" name="clave_marca" required><br>

				<div>
					<label>Nombre:</label><input value="<?php echo $nombre_proveedor;?>" pattern="[a-zA-Z0-9\s]+" type="text" name="nombre_proveedor" required><br>
				</div>
				<div>
					<label>Direccion:</label><input value="<?php echo $direccion;?>" pattern="[A-Za-z0-9'\.\-\s\,]"  type="text" name="direccion" required><br>
				</div>
				<div>
					<label>Telefono:</label><input value="<?php echo $telefono;?>" pattern="[0-9]{9,15}" type="text" name="telefono" required><br>
				</div>
				<center><input value="actualizar"id="submit_button" type="submit" name="actualizar"></center>
			</form>
		</div>	
	</section>
	<footer>
		<a target="_blank" href="https://github.com/richardpro17"><img id="img6" src="https://i.postimg.cc/mDn2gHB0/github-1000-500-px.png"></a>
		<span>Richard Computer Store<br> 2022-2023 &#169;</span>
		<img id="img7" src='https://i.postimg.cc/d3nx7bhR/sql-1000-500-px.png' border='0' alt='Inicio'/>
	</footer>
</body>
</html>