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
	<title>CATEGORIA: ELECTRIC CROCODILE</title>
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
			error_reporting(0);
		?>
	<section>
		<div class="form_g">
			<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
				<h1>Agregar Categoria</h1>
				<label id="main_label">Registra tu Categoria:</label><br>
				<div>
					<label>ID de categoria:</label><input pattern="[0-9]{2}"  type="number" name="id_categoria" required><br>
				</div>
				<div>
					<label>Descripcion de categoria:</label>
				</div>
				<textarea id="textarea"rows="5" cols="40" name="descripcion_categoria">Escribe</textarea>
				<div>
					<label>Nombre de Categoria:</label><input type="text" name="nombre_categoria" required><br>
				</div>

				<input  id="submit_button"  type="submit" name="registrar_categoria">
			</form>
		</div>
		
		<?php
			//recuperacion de los datos por ser registro
			$id_categoria=$_POST['id_categoria'];
			$nombre_categoria=$_POST['nombre_categoria'];
			$descripcion_categoria=$_POST['descripcion_categoria'];
			$registrar_categoria=$_POST['registrar_categoria'];

			if(isset($registrar_categoria)){
				$instruccion_agregar_categoria="INSERT INTO categoria(id_categoria,nombre_categoria,descripcion_categoria) VALUES ('$id_categoria','$nombre_categoria','$descripcion_categoria')";
				$agregar_sql=mysqli_query($connect,$instruccion_agregar_categoria);
				//validacion de la instruccion
				if(!$agregar_sql){
					echo "<h2>error</h2>";
					$validacion=0;				
				}else{
					/*echo "<h2>Se registro la categoria de forma corecta</h2>";*/
					$validacion=1;
					echo $validacion;
				}

				//CONSULTA MOSTRAR PRODUCTO
				$categoria_mostrar="SELECT * FROM categoria WHERE nombre_categoria='$nombre_categoria'";
				$sql_categoria=mysqli_query($connect,$categoria_mostrar);

				//mostrar nuevo usuario
				if($validacion==1){
					echo "<center><div id='table'>
					<table id='cliente-tbl'>
					<caption>REGISTRO DE NUEVA CATEGORIA</caption>
					<tr id='tr_header'>
	    				<th>ID CATEGORIA</th>
	    				<th>Nombre Categoria</th>
	    				<th>Descripcion Categoria</th>
	  				</tr>";
					$fila=mysqli_fetch_row($sql_categoria);
					//desplegar los registros
					echo '<tr>
						<td id="td_id">'.$fila[0] . " "."</td>
						<td>".$fila[1] . " "."</td>
						<td>".$fila[2] . " "."</td>
					</tr>";
					echo "</table></div></center>";
					echo "<br>";
				}

			}else{
				/*echo "NO HAS DADO CLIC AL BOTON DE REGISTRO";*/
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