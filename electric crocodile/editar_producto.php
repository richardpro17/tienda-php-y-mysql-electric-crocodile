<?php
error_reporting(0);
	session_start();
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
	<title>EDITAR PRODUCTO</title>
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
		$instruccion_categoria="SELECT id_categoria,nombre_categoria FROm categoria";
			$ejecucion_categoria=mysqli_query($connect,$instruccion_categoria);


		//instruccion de consulta del usuario y validacion
		$actualizar=$_POST['actualizar'];
		$id_producto1=$_GET['id_producto'];
		$instruccion_producto="SELECT * FROM producto WHERE id_producto='$id_producto1'";
		$query_producto=mysqli_query($connect,$instruccion_producto);
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
			$id_producto=$_POST['id_producto'];
			$nombre_producto=$_POST['nombre_producto'];
			$descripcion_producto=$_POST['descripcion_producto'];
			$cantidad_importada=$_POST['cantidad_importada'];
			$img_url=$_POST['img_url'];
			$precio_producto=$_POST['precio_producto'];
			$id_categoria=$_POST['id_categoria'];

			//pasar las variables actualizadas a la instruccion
			$actualizacion="UPDATE producto
			SET nombre_producto='$nombre_producto',descripcion_producto='$descripcion_producto',cantidad_importada='$cantidad_importada',img_url='$img_url',precio_producto='$precio_producto',categoria_id='$id_categoria'
			WHERE id_producto='$id_producto'";

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
			$query_producto=mysqli_query($connect,$instruccion_producto);
			$fila=mysqli_fetch_assoc($query_producto);
			//muestreo de las variables en el formulario
			$id_producto=$fila['id_producto'];
			$nombre_producto=$fila['nombre_producto'];
			$descripcion_producto=$fila['descripcion_producto'];
			$cantidad_importada=$fila['cantidad_importada'];
			$img_url=$fila['img_url'];
			$precio_producto=$fila['precio_producto'];
			$id_categoria=$fila['categoria_id'];
			$marca_clave=$fila['marca_clave'];
		}
		
		

		
		?>
		<div class="form_g">
			<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
				<h1>Actualizar Producto</h1>
				<div>
					<label id="main_label">A continuacion actualiza los valores del producto: (<?php echo $id_producto1;?>)<?php echo $nombre_producto;?></label><br>
				</div>
					<input value="<?php echo $id_producto;?>"pattern="[0-9]{6}"  type="hidden" name="id_producto" required><br>
				
				<div>
					<label>Nombre del producto:</label><input value="<?php echo $nombre_producto;?>" type="text" name="nombre_producto" required><br><br>
				</div>
				<div>
					<label>Descripcion del producto:</label>
				</div>
					<textarea  id="textarea"rows="5" cols="40" name="descripcion_producto"><?php echo $descripcion_producto;?></textarea>
				
				<div>
					<label>Cantidad Importada:</label><input value="<?php echo $cantidad_importada;?>" type="number" name="cantidad_importada" required><br>
				</div>
				<div>
					<label>URL de la imagen del producto</label><input value="<?php echo $img_url;?>" type="text" name="img_url" required><br>
				</div>
				<div>
					<label>Precio del producto</label><input value="<?php echo $precio_producto;?>" type="number" name="precio_producto" required><br>
				</div>
				<div>
					<label>Categoria del producto:</label>
					<select id="categorias" name="id_categoria">
						<option value="">SELECCIONA</option>
						<?php
							while($categoria=mysqli_fetch_row($ejecucion_categoria)){
								echo '<option value="'.$categoria[0].'">('.$categoria[0].') '.$categoria[1].'</option>';
							}

						?>
					</select>
				</div>
				<div>
					<label>Proveedor:</label><span id="prov_producto"><?php echo $marca_clave;?></span>
				</div>
				<input value="Actualizar" id="submit_button" type="submit" name="actualizar">
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