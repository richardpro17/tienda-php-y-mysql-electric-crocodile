<?php
error_reporting(0);
	session_start();
	$sesionuser= $_SESSION['usuario'];
	if($sesionuser == null || $sesionuser ==''){
		$sesionuser='N/A';
		
	}
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
			<li><a href="historial_carrito.php">PEDIDOS</a></li>
			
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

			//DESPLEGAR PRODUCTOS
			$instruccion_mostrar_productos="SELECT * FROM producto";
			$query_productos=mysqli_query($connect,$instruccion_mostrar_productos);
			
		?>
	<section style="height: auto;" class="cliente_section">
		<div id="titles_div_store">
			<h1 id="store_title">TIENDA DE ELECTRIC CROCODILE</h1>
			<span id="store_span">Bienvenido a la tienda de Electric Crocodile, podras añadir produtos a tu pedido y proceder con el formato de pago correspondiente.</span>
		</div><br>
		<div class="tienda_mostrar_producto">
			<?php 		
			while($product_item=mysqli_fetch_assoc($query_productos)){
				?>
				<div class="contenedor_producto">

					<h1 id="tittle_product"><?php echo $product_item['nombre_producto'];?></h1>
					<h1 id="tittle_product">Categoria: <?php echo $product_item['categoria_id'];?></h1>
					<h2 id="id_product">ID: <?php echo $product_item['id_producto'];?>.</h2>
					<img id="item_img" src="<?php echo $product_item['img_url'];?>">
					<h3 id="id_product"><?php echo $product_item['descripcion_producto'];?></h3>
					<h3 id="id_product">PRECIO:<?php echo $product_item['precio_producto'];?>$</h3>
					<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
						<input type="hidden" value="<?php echo $product_item['precio_producto'];?>" name="precio_producto"><br>
						<input pattern="[0-9]{6}" value="<?php echo $product_item['id_producto'];?>"  type="hidden" name="id_producto" required>
						<h3 id="id_product">CANTIDAD</h3>
						<input type="number" min="1" max="<?php echo $product_item['cantidad_importada'];?>" name="cantidad_importada"><br>
						<input name="agregar" id="comprar_button" value="Agregar al carro" type="submit">
					</form>

				</div>
				
				<?php
			}

			?>
			<?php
			
			$agregar=$_POST['agregar'];
			$id_producto=$_POST['id_producto'];
			$cantidad_importada=$_POST['cantidad_importada'];
			$precio_producto = $_POST['precio_producto'];
			if(isset($agregar)){
				$instruccion_curp="SELECT curp FROM cliente where usuario='$sesionuser'";
				$confirmar_busqueda_query=mysqli_query($connect,$instruccion_curp);
				$curpm=mysqli_fetch_assoc($confirmar_busqueda_query);
				$curp_cliente=$curpm['curp'];
				echo $curp_cliente;
				$_SESSION['cantidad_importada']=$cantidad_importada;
				$_SESSION['precio_producto']=$precio_producto;
				$_SESSION['id_producto'] =$id_producto;
				$_SESSION['ref_carro']="HJYUBN75";
				$subtotal = $_SESSION['cantidad_importada'] * $_SESSION['precio_producto'];
				$_SESSION['subtotal']= $subtotal;

				$agregar_al_carrito="INSERT INTO carro_compras (producto_id,cliente_curp,cantidad_comprada,sub_total,ref_carro)
				VALUES('$id_producto','$curp_cliente','$cantidad_importada','".$_SESSION['subtotal']."','".$_SESSION['ref_carro']."')";
				/*echo "<span style='background:white;'>".$agregar_al_carrito."</span>";*/
				$query_registro_producto=mysqli_query($connect,$agregar_al_carrito);

				//validacion de la instruccion
				if(!$query_registro_producto){
					$validacion=0;				
				}else{
					/*echo "<h2>Registro el producto de forma correcta</h2>";*/
					$validacion=1;
				}
				
				echo "<a class='btn ver_btn1' href='agregar_al_carrito.php'>Ver el carro</a>";	
			}else

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