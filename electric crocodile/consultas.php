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
	<title>CONSULTAS</title>
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
	<section style="height: auto;" class="cliente_section">
		<div>
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
			//MUESTREO DE CLIENTE
			?>
			<div id="titles_div_store">
				<center><h3 id="store_title">MENU GENERAL DE CONSULTAS</h3></center>	
				<p id="store_span">Bienvenido al menu general de consultas, tienes diversas formas de consultar datos de nuestro sistema, filtrar por entidad o usar palabras para encontrar lo deseado.</p>
			</div>
		<div class="form_g">
			<form  action="<?=$_SERVER['PHP_SELF']?>" method="POST">
				<h1>MENU DE CONSULTAS</h1>
				<label>SELECCIONE FILTRO DE CONSULTA POR TABLA:</label>

				<input type="checkbox" name="cliente_all" value="cliente_all"><span>CONSULTA TODOS LOS CLIENTES</span><br>
				<input type="checkbox" name="proveedor_all" value="proveedor_all"><span>CONSULTA TODOS LOS PROVEEDORES</span><br>
				<input type="checkbox" name="productos_all" value="productos_all"><span>CONSULTA TODOS LOS PRODUCTOS</span><br>
				<input type="checkbox" name="categorias_all" value="categorias_all"><span>CONSULTA LAS CATEGORIAS</span><br>
				<input type="checkbox" name="stock" value="stock"><span>CONSULTAR STOCK</span><br>
				<input type="checkbox" name="control_prov" value="control_prov"><span>CONTROL DE PROVEEDORES</span><br>
				<input type="checkbox" name="controLpedido" value="controLpedido"><span>CONTROL DE PEDIDOS</span><br>
				<input type="checkbox" name="control_carritos" value="control_carritos"><span>CONTROL DE CARRITOS COMPRAS</span><br>
				<br>
				<label>Mostrar productos por categoria: </label><br>
				<div>
					<select id="categorias" name="filtro_categorias">
						<option value="">SELECCIONA</option>
						<?php
							while($categoria=mysqli_fetch_row($ejecucion_categoria)){
								echo '<option value="'.$categoria[0].'">('.$categoria[0].') '.$categoria[1].'</option>';
							}

						?>
					</select>
				</div>
				<div>
					<label>Buscar cliente(Curp,usuario o nombre):</label><input type="text" name="busqueda_cliente" ><br>
				</div><br><br>
				<div>
					<label>Buscar Proveedor(Clave de marca o nombre):</label><input type="text" name="busqueda_prov" ><br>
				</div><br><br>
				<div>
					<label>Buscar Producto(id producto o Nombre producto):</label><input type="text" name="busqueda_producto" ><br>
				</div><br><br>
				<div>
					<label>Buscar categoria(id categoria o Nombre categoria):</label><input type="text" name="busqueda_categoria" ><br>
				</div><br><br>
				<br><center><input id="submit_button" type="submit" value="MOSTRAR" name="MOSTRAR"></center>
			</form>
		</div>
		<?php
		if(isset($_POST['cliente_all'])){
			$sql_all_cliente="SELECT * FROm cliente";
			$query_all_cliente=mysqli_query($connect,$sql_all_cliente);
			echo "<center><div id='Gtable'>
				<table id='gestion_cliente_tbl'>
				<caption>TABLA CLIENTES</caption>
				<tr id='tr_header_cliente'>
    				<th>CURP</th>
   	 				<th>Nombre_cliente</th>
    				<th>Usuario</th>
    				<th>Telefono</th>
    				<th>Direccion</th>
    				<th>Ciudad</th>
  				</tr>";
				while ($fila_all_cliente=mysqli_fetch_assoc($query_all_cliente)) {
				//desplegar los registros
				echo '<tr>
					<td id="td_id">'.$fila_all_cliente['curp'] . " "."</td>
					<td id='tdgc'>".$fila_all_cliente['nombre_cliente'] . " "."</td>
					<td id='tdgc'>".$fila_all_cliente['usuario'] . " "."</td>
					<td id='tdgc'>".$fila_all_cliente['telefono'] . " "."</td>
					<td id='tdgc'>".$fila_all_cliente['direccion'] . " "."</td>
					<td id='tdgc'>".$fila_all_cliente['ciudad'] . " "."</td>
				</tr>";
				}
				echo "</table></div></center>";
				echo "<br>";
		}

		if(isset($_POST['proveedor_all'])){
			$sql_all_proveedor="SELECT * FROm proveedor";
			$query_all_proveedor=mysqli_query($connect,$sql_all_proveedor);
			echo "<center><div id='table'>
				<table id='gestion_cliente_tbl'>
				<caption>TABLA PROVEEDORES</caption>
				<tr id='tr_header_cliente'>
    				<th>CLAVE MARCA</th>
   	 				<th>NOMBRE</th>
    				<th>DIRECCION</th>
    				<th>Telefono</th>
  				</tr>";
				while ($fila_all_proveedor=mysqli_fetch_assoc($query_all_proveedor)) {
				//desplegar los registros
				echo '<tr>
					<td id="td_id">'.$fila_all_proveedor['clave_marca'] . " "."</td>
					<td id='tdgc'>".$fila_all_proveedor['nombre'] . " "."</td>
					<td id='tdgc'>".$fila_all_proveedor['direccion'] . " "."</td>
					<td id='tdgc'>".$fila_all_proveedor['telefono'] . " "."</td>
				</tr>";
				}
				echo "</table></div></center>";
				echo "<br>";
		}

		if(isset($_POST['productos_all'])){
			
			$sql_all_productos="SELECT * FROm producto";
			$query_all_producto=mysqli_query($connect,$sql_all_productos);
			echo "<center><div id='table'>
				<table id='gestion_cliente_tbl'>
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
				while ($fila_all_productos=mysqli_fetch_assoc($query_all_producto)) {
				//desplegar los registros
					echo"<tr>
						<td id='td_id'>".$fila_all_productos['id_producto'] ."</td>
						<td id='tdgc'>".$fila_all_productos['nombre_producto'] ."</td>
						<td id='tdgc'>".$fila_all_productos['descripcion_producto'] ."</td>
						<td id='tdgc'>".$fila_all_productos['cantidad_importada'] ."</td>
						<td id='tdgc'><img width='50%' src='".$fila_all_productos['img_url'] ."'></td>
						<td id='tdgc'>".$fila_all_productos['precio_producto'] ."</td>
						<td id='tdgc'>".$fila_all_productos['categoria_id'] ."</td>
						<td id='tdgc'>".$fila_all_productos['marca_clave'] ."</td>
					</tr>";
				}
				echo "</table></div></center>";
				echo "<br>";
		}

		if(isset($_POST['categorias_all'])){
			$sql_all_categorias="SELECT * FROm categoria";
			$query_all_categoria=mysqli_query($connect,$sql_all_categorias);
			echo "<center><div id='table'>
				<table id='gestion_cliente_tbl'>
				<caption>TABLA CATEGORIAS</caption>
				<tr id='tr_header_cliente'>
    				<th>ID CATEGORIA</th>
   	 				<th>NOMBRE CATEGORIA</th>
    				<th>DESCRIPCION CATEGORIA</th>
  				</tr>";
				while ($fila_all_categoria=mysqli_fetch_assoc($query_all_categoria)) {
				//desplegar los registros
				echo '<tr>
					<td id="td_id">'.$fila_all_categoria['id_categoria'] . " "."</td>
					<td id='tdgc'>".$fila_all_categoria['nombre_categoria'] . " "."</td>
					<td id='tdgc'>".$fila_all_categoria['descripcion_categoria'] . " "."</td>
				</tr>";
				}
				echo "</table></div></center>";
				echo "<br>";
		}

		if(isset($_POST['stock'])){
			$sql_all_stock="SELECT * FROm stock";
			$query_all_stock=mysqli_query($connect,$sql_all_stock);
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
				while ($fila_stock=mysqli_fetch_row($query_all_stock)) {
				//desplegar los registros
				echo '<tr>
					<td id="td_id">'.$fila_stock[0] . " "."</td>
					<td id='tdgc'>".$fila_stock[1] . " "."</td>
					<td id='tdgc'>".$fila_stock[2] . " "."</td>
					<td id='tdgc'>".$fila_stock[3] . " "."</td>
					<td id='tdgc'>".$fila_stock[4] . " "."</td>
				</tr>";
				}
				echo "</table></div></center>";
				echo "<br>";
		}

		if(isset($_POST['filtro_categorias'])){
			$variables_muestreo=$_POST['filtro_categorias'];
			if($variables_muestreo == ''){
				echo "<p style='display:none;'>NO TIENE NADA</p>";
			}else{
				$sql_filtro_productos="SELECT * FROm producto WHERE categoria_id='".$_POST['filtro_categorias']."'";
				$query_fitlro_productos=mysqli_query($connect,$sql_filtro_productos);
			echo "<center><div id='table'>
				<table id='gestion_cliente_tbl'>
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
				while ($fila_filtro_producto=mysqli_fetch_assoc($query_fitlro_productos)) {
				//desplegar los registros
					echo"<tr>
						<td id='td_id'>".$fila_filtro_producto['id_producto'] ."</td>
						<td id='tdgc'>".$fila_filtro_producto['nombre_producto'] ."</td>
						<td id='tdgc'>".$fila_filtro_producto['descripcion_producto'] ."</td>
						<td id='tdgc'>".$fila_filtro_producto['cantidad_importada'] ."</td>
						<td id='tdgc'><img width='50%' src='".$fila_filtro_producto['img_url'] ."'></td>
						<td id='tdgc'>".$fila_filtro_producto['precio_producto'] ."</td>
						<td id='tdgc'>".$fila_filtro_producto['categoria_id'] ."</td>
						<td id='tdgc'>".$fila_filtro_producto['marca_clave'] ."</td>
					</tr>";
				}
				echo "</table></div></center>";
				echo "<br>";
			}

			
		}

		if(isset($_POST['control_prov'])){
			$instruccion_control_prov="SELECT producto.marca_clave, producto.id_producto, producto.nombre_producto, producto.cantidad_importada, producto.precio_producto
			FROM producto
			INNER JOIN proveedor ON producto.marca_clave = proveedor.clave_marca";		
			$consulta_control_prov=mysqli_query($connect,$instruccion_control_prov);
			echo "<center><div id='table'>
					<table id='cliente-tbl'>
					<caption>CONTROL DE PROVEEDORES</caption>
					<tr id='tr_header'>
	    				<th>CLAVE MARCA</th>
	    				<th>ID PRODUCTO</th>
	    				<th>Nombre Producto</th>
	    				<th>Cantidad Importada</th>
	    				<th>Precio por producto</th>
	  				</tr>";
	  				while($fila_control_prov=mysqli_fetch_assoc($consulta_control_prov)){
	  					//desplegar los registros
						echo '<tr>
							<td id="td_id">'.$fila_control_prov['marca_clave'] . " "."</td>
							<td>".$fila_control_prov['id_producto'] . " "."</td>
							<td>".$fila_control_prov['nombre_producto'] . " "."</td>
							<td>".$fila_control_prov['cantidad_importada'] . " "."</td>
							<td>".$fila_control_prov['precio_producto'] . " "."</td>
						</tr>";
	  				}
					echo "</table></div></center>";
					echo "<br>";				
		}

		if(isset($_POST['controLpedido'])){
			$instruccion_control_pedido="SELECT * FROM control_pedido";
			$query_all_pedidos=mysqli_query($connect,$instruccion_control_pedido);
			echo "<center><div id='table'>
					<table id='cliente-tbl'>
					<caption>PEDIDOS</caption>
					<tr id='tr_header'>
	    				<th>CLAVE DE PEDIDO</th>
	    				<th>CARRO ID</th>
	    				<th>FECHA DE PEDIDO</th>
	    				<th>CURP</th>
	    				<th>NUMERO DE TARJETA</th>
	    				<th>MONTO FINAL</th>

	  				</tr>";
					while ($fila_pedido_all=mysqli_fetch_assoc($query_all_pedidos)) {
						echo '<tr>
						<td id="td_id">'.$fila_pedido_all['clave_pedido'] . " "."</td>
						<td>".$fila_pedido_all['id_carro'] . " "."</td>
						<td>".$fila_pedido_all['fecha_pedido'] . " "."</td>
						<td>".$fila_pedido_all['curp_cliente'] . " "."</td>
						<td>".$fila_pedido_all['num_tarjeta'] . " "."</td>
						<td>".$fila_pedido_all['monto_final'] . " "."</td>
						<td id='eliminar_td'>
							<a href='eliminar_pedidoADMIN.php?clave_pedido=".$fila_pedido_all['clave_pedido']."'>Eliminar</a>
						</td>
					</tr>";
					}					
					echo "</table></div></center>";
					echo "<br>";
		}
		
		if(isset($_POST['control_carritos'])){
			$instruccion_control_carritos="SELECT * FROM carro_compras";
			$query_carrito=mysqli_query($connect,$instruccion_control_carritos);
			echo "<center><div id='table'>
					<table id='cliente-tbl'>
					<caption>CARRITOS DE COMPRAS</caption>
					<tr id='tr_header'>
	    				<th>#ID CARRITO</th>
	    				<th>Producto ID</th>
	    				<th>TU CURP</th>
	    				<th>Cantidad Comprada</th>
	    				<th>Sub Total</th>
	    				<th>Referencia de Carrito</th>
	  				</tr>";
					while ($fila_all_carrito=mysqli_fetch_assoc($query_carrito)) {
						echo '<tr>
						<td id="td_id">'.$fila_all_carrito['carro_id'] . " "."</td>
						<td>".$fila_all_carrito['producto_id'] . " "."</td>
						<td>".$fila_all_carrito['cliente_curp'] . " "."</td>
						<td>".$fila_all_carrito['cantidad_comprada'] . " "."</td>
						<td>".$fila_all_carrito['sub_total'] . " "."</td>
						<td>".$fila_all_carrito['ref_carro'] . " "."</td>
						<td id='eliminar_td'>
							<a href='eliminar_producto_carroADMIN.php?carro_id=".$fila_all_carrito['carro_id']."'>Eliminar</a>
						</td>
					</tr>";
					}					
					echo "</table></div></center>";
					echo "<br>";
		}

		if(isset($_POST['busqueda_cliente'])){
			$buscar_cliente=$_POST['busqueda_cliente'];
			if($buscar_cliente == ''){
				echo "<p style='display:none;'>NO TIENE NADA</p>";
			}else{
				$sql_buscar_cliente="SELECT * FROM cliente WHERE usuario LIKE '%$buscar_cliente%' OR curp LIKE '%$buscar_cliente%' OR nombre_cliente LIKE '%$buscar_cliente%'";
			$query_buscarC=mysqli_query($connect,$sql_buscar_cliente);
				echo "<center><div id='Gtable'>
				<table id='gestion_cliente_tbl'>
				<caption>TABLA CLIENTES</caption>
				<tr id='tr_header_cliente'>
    				<th>CURP</th>
   	 				<th>Nombre_cliente</th>
    				<th>Usuario</th>
    				<th>Telefono</th>
    				<th>Direccion</th>
    				<th>Ciudad</th>
  				</tr>";
				while ($fila_buscarcliente=mysqli_fetch_assoc($query_buscarC)) {
				//desplegar los registros
				echo '<tr>
					<td id="td_id">'.$fila_buscarcliente['curp'] . " "."</td>
					<td id='tdgc'>".$fila_buscarcliente['nombre_cliente'] . " "."</td>
					<td id='tdgc'>".$fila_buscarcliente['usuario'] . " "."</td>
					<td id='tdgc'>".$fila_buscarcliente['telefono'] . " "."</td>
					<td id='tdgc'>".$fila_buscarcliente['direccion'] . " "."</td>
					<td id='tdgc'>".$fila_buscarcliente['ciudad'] . " "."</td>
				</tr>";
				}
				echo "</table></div></center>";
				echo "<br>";
			}
			
		}

		if(isset($_POST['busqueda_prov'])){
			$buscar_prov=$_POST['busqueda_prov'];
			if($buscar_prov == ''){
				echo "<p style='display:none;'>NO TIENE NADA</p>";
			}else{
				$sql_buscar_prov="SELECT * FROM proveedor WHERE clave_marca LIKE '%$buscar_prov%' OR nombre LIKE '%$buscar_prov%'";
				$query_buscarProv=mysqli_query($connect,$sql_buscar_prov);
				echo "<center><div id='table'>
				<table id='gestion_cliente_tbl'>
				<caption>TABLA PROVEEDORES</caption>
				<tr id='tr_header_cliente'>
    				<th>CLAVE MARCA</th>
   	 				<th>NOMBRE</th>
    				<th>DIRECCION</th>
    				<th>Telefono</th>
  				</tr>";
				while ($fila_buscar_proveedor=mysqli_fetch_assoc($query_buscarProv)) {
				//desplegar los registros
				echo '<tr>
					<td id="td_id">'.$fila_buscar_proveedor['clave_marca'] . " "."</td>
					<td id='tdgc'>".$fila_buscar_proveedor['nombre'] . " "."</td>
					<td id='tdgc'>".$fila_buscar_proveedor['direccion'] . " "."</td>
					<td id='tdgc'>".$fila_buscar_proveedor['telefono'] . " "."</td>
				</tr>";
				}
				echo "</table></div></center>";
				echo "<br>";
			}
		}

		if(isset($_POST['busqueda_producto'])){
			$buscar_producto=$_POST['busqueda_producto'];
			if($buscar_producto == ''){
				echo "<p style='display:none;'>NO TIENE NADA</p>";
			}else{
				$sql_buscar_prod="SELECT * FROM producto WHERE id_producto LIKE '%$buscar_producto%' OR nombre_producto LIKE '%$buscar_producto%'";
				$query_buscarprod=mysqli_query($connect,$sql_buscar_prod);
				echo "<center><div id='table'>
				<table id='gestion_cliente_tbl'>
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
				while ($fila_buscar_productos=mysqli_fetch_assoc($query_buscarprod)) {
				//desplegar los registros
					echo"<tr>
						<td id='td_id'>".$fila_buscar_productos['id_producto'] ."</td>
						<td id='tdgc'>".$fila_buscar_productos['nombre_producto'] ."</td>
						<td id='tdgc'>".$fila_buscar_productos['descripcion_producto'] ."</td>
						<td id='tdgc'>".$fila_buscar_productos['cantidad_importada'] ."</td>
						<td id='tdgc'><img width='50%' src='".$fila_buscar_productos['img_url'] ."'></td>
						<td id='tdgc'>".$fila_buscar_productos['precio_producto'] ."</td>
						<td id='tdgc'>".$fila_buscar_productos['categoria_id'] ."</td>
						<td id='tdgc'>".$fila_buscar_productos['marca_clave'] ."</td>
					</tr>";
				}
				echo "</table></div></center>";
				echo "<br>";
			}
		}


		if(isset($_POST['busqueda_categoria'])){
			$buscar_categoria=$_POST['busqueda_categoria'];
			
			if($buscar_categoria == ''){
				echo "<p style='display:none;'>NO TIENE NADA</p>";
			}else{
				$sql_buscar_cat="SELECT * FROM categoria WHERE id_categoria LIKE '%$buscar_categoria%' OR nombre_categoria LIKE '%$buscar_categoria%'";
				$query_busqueda_cat=mysqli_query($connect,$sql_buscar_cat);
				echo "<center><div id='table'>
				<table id='gestion_cliente_tbl'>
				<caption>TABLA CATEGORIAS</caption>
				<tr id='tr_header_cliente'>
    				<th>ID CATEGORIA</th>
   	 				<th>NOMBRE CATEGORIA</th>
    				<th>DESCRIPCION CATEGORIA</th>
  				</tr>";
				while ($fila_busqueda_categoria=mysqli_fetch_assoc($query_busqueda_cat)) {
				//desplegar los registros
				echo '<tr>
					<td id="td_id">'.$fila_busqueda_categoria['id_categoria'] . " "."</td>
					<td id='tdgc'>".$fila_busqueda_categoria['nombre_categoria'] . " "."</td>
					<td id='tdgc'>".$fila_busqueda_categoria['descripcion_categoria'] . " "."</td>
				</tr>";
				}
				echo "</table></div></center>";
				echo "<br>";
				
			}
		}

		?>

		</div>

	</section>
	<footer>
		<a target="_blank" href="https://github.com/richardpro17"><img id="img6" src="https://i.postimg.cc/mDn2gHB0/github-1000-500-px.png"></a>
		<span>Richard Computer Store<br> 2022-2023 &#169;</span>
		<img id="img7" src='https://i.postimg.cc/d3nx7bhR/sql-1000-500-px.png' border='0' alt='Inicio'/>
	</footer>
</body>
</html>