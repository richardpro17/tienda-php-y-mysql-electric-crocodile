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
	<title>EDITAR CATEGORIA</title>
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
		$id_categoria1=$_GET['id_categoria'];
		$instruccion_categoria="SELECT * FROM categoria WHERE id_categoria='$id_categoria1'";
		$query_categoria=mysqli_query($connect,$instruccion_categoria);

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
			$id_categoria=$_POST['id_categoria'];
			$nombre_categoria=$_POST['nombre_categoria'];
			$descripcion_categoria=$_POST['descripcion_categoria'];

			//pasar las variables actualizadas a la instruccion
			$actualizacion="UPDATE categoria 
			SET nombre_categoria='$nombre_categoria',descripcion_categoria='$descripcion_categoria',descripcion_categoria='$descripcion_categoria'
			WHERE id_categoria='$id_categoria'";

			$resultado_actualizacion=mysqli_query($connect,$actualizacion);
			if(!$resultado_actualizacion){
			echo "<script languaje='JavaScript'>
				alert('LOS DATOS NO ACTUALIZARON');
				location.assign('admin_panel.php');
					</script>";
			}else{
			
			echo "<script languaje='JavaScript'>
				alert('LOS DATOS SE ACTUALIZARON CORRECTAMENTE');
				location.assign('admin_panel.php');
					</script>";
			}

		}else{
			$query_categoria=mysqli_query($connect,$instruccion_categoria);
			$fila=mysqli_fetch_assoc($query_categoria);
			//muestreo de las variables en el formulario
			$id_categoria=$fila['id_categoria'];
			$nombre_categoria=$fila['nombre_categoria'];
			$descripcion_categoria=$fila['descripcion_categoria'];
		}
		
		

		
		?>
		<div class="form_g">
			<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
				<h1>Actualizar Categoria</h1>
				<label id="main_label">A continuacion actualiza los valores de la categoria: <?php echo $id_categoria1;?></label><br>
		
					<input value="<?php echo $id_categoria;?>" pattern="[0-9]{2}"  type="hidden" name="id_categoria" required><br>
	
				<div>
					<label>Descripcion de categoria:</label>
				</div>
				<textarea id="textarea"rows="5" cols="40" name="descripcion_categoria"><?php echo $descripcion_categoria;?></textarea>
				<div>
					<label>Nombre de Categoria:</label><input value="<?php echo $nombre_categoria;?>" type="text" name="nombre_categoria" required><br>
				</div>

				<input  id="submit_button" value="actualizar" type="submit" name="actualizar">
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