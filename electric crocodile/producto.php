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
			error_reporting(0);

			//CATEGORIA
			$instruccion_categoria="SELECT id_categoria,nombre_categoria FROm categoria";
			$ejecucion_categoria=mysqli_query($connect,$instruccion_categoria);
//CATEGORIA

			$instruccion_proveedor="SELECT clave_marca FROm proveedor";
			$ejecucion_proveedor=mysqli_query($connect,$instruccion_proveedor);
			$marca_clave=$_SESSION['clave_marca'];
		?>
	<section>
		<div class="form_g">
			<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
				<h1>Registrar Nuevo Producto</h1>
				<div>
					<label id="main_label">Registra bien los datos de tu producto:</label><br>
				</div>
				<div>
					<label>ID del producto:</label><input pattern="[0-9]{6}"  type="number" name="id_producto" required><br>
				</div>
				<div>
					<label>Nombre del producto:</label><input  type="text" name="nombre_producto" required><br><br>
				</div>
				<div>
					<label>Descripcion del producto:</label>
				</div>
					<textarea id="textarea"rows="5" cols="40" name="descripcion_producto">ESCRIBE</textarea>
				
				<div>
					<label>Cantidad Importada:</label><input type="number" name="cantidad_importada" required><br>
				</div>
				<div>
					<label>URL de la imagen del producto</label><input type="text" name="img_url" required><br>
				</div>
				<div>
					<label>Precio del producto</label><input type="number" name="precio_producto" required><br>
				</div>
					<label>Categoria del producto:</label>
					<select id="categorias" name="id_categoria">
						<option value="">SELECCIONA</option>
						<?php
							while($categoria=mysqli_fetch_row($ejecucion_categoria)){
								echo '<option value="'.$categoria[0].'">('.$categoria[0].') '.$categoria[1].'</option>';
							}

						?>
					</select>
				<h3>No aparece tu categoria?<a href="categoria.php">Clic Aqui</a></h3>
				<br>
				<div>
					<label>Proveedor:</label><span id="prov_producto"><?php echo $marca_clave;?></span>
				</div>
				<input value="Agregar" id="submit_button" type="submit" name="registrar_producto">
			</form>
		</div>
		
		<?php
			//recuperacion de los datos por ser registro
			$id_producto=$_POST['id_producto'];
			$nombre_producto=$_POST['nombre_producto'];
			$descripcion_producto=$_POST['descripcion_producto'];
			$cantidad_importada=$_POST['cantidad_importada'];
			$img_url=$_POST['img_url'];
			$precio_producto=$_POST['precio_producto'];
			$id_categoria=$_POST['id_categoria'];
			$registrar_producto=$_POST['registrar_producto'];

			if(isset($registrar_producto)){
				$instruccion_agregar_producto="INSERT INTO producto(id_producto, nombre_producto, descripcion_producto, cantidad_importada, img_url, precio_producto, categoria_id, marca_clave) VALUES ('$id_producto','$nombre_producto','$descripcion_producto','$cantidad_importada','$img_url','$precio_producto','$id_categoria','$marca_clave')";

				$agregar_sql=mysqli_query($connect,$instruccion_agregar_producto);

				//validacion de la instruccion
				if(!$agregar_sql){
					echo "<h2>error</h2>";
					$validacion=0;				
				}else{
					/*echo "<h2>Registro el producto de forma correcta</h2>";*/
					$validacion=1;
				}

				//CONSULTA MOSTRAR PRODUCTO
				$producto_mostrar="SELECT * FROM producto WHERE nombre_producto='$nombre_producto'";
				$sql_producto=mysqli_query($connect,$producto_mostrar);

				//mostrar nuevo usuario
				if($validacion==1){
					echo "<center><div id='table'>
					<table id='cliente-tbl'>
					<caption>REGISTRO DEL NUEVO Producto</caption>
					<tr id='tr_header'>
	    				<th>ID PRODUCTO</th>
	    				<th>Nombre Producto</th>
	    				<th>Descripcion</th>
	    				<th>Cantidad Importada</th>
	    				<th>URL DE IMG</th>
	    				<th>Precio Producto</th>
	    				<th>Categoria</th>
	    				<th>Proveedor</th>
	  				</tr>";
					$fila=mysqli_fetch_row($sql_producto);
					//desplegar los registros
					echo '<tr>
						<td id="td_id">'.$fila[0] . " "."</td>
						<td>".$fila[1] . " "."</td>
						<td>".$fila[2] . " "."</td>
						<td>".$fila[3] . " "."</td>
						<td>".$fila[4] . " "."</td>
						<td>".$fila[5] . " "."</td>
						<td>".$fila[6] . " "."</td>
						<td>".$fila[7] . " "."</td>
					</tr>";
					echo "</table></div></center>";
					echo "<br>";
					$mostrar_img="SELECT img_url FROM producto WHERE img_url='$img_url'";
					$img_query=mysqli_query($connect,$mostrar_img);
					$img_validacion=mysqli_fetch_assoc($img_query);
					echo "<img width='50%' src='".$img_validacion['img_url']."'>";

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