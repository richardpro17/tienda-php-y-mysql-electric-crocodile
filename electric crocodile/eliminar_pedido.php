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
	<title>ELIMINAR CATEGORIA</title>
	<link rel="stylesheet" type="text/css" href="electricstyles.css">
	<link rel="icon" type="image/png" href="icon_crocodile.png">
</head>
<body>

	<header>
			<img id="header-img"src="https://i.postimg.cc/B62C9j9t/Copia-de-LOGO-ELECTRIC-CROCODILE-500-160-px-500-140-px.png" alt="electric crocodile store">
			<div CLASS="user_state">
				<img width="20%" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZ7TKHo1NrGHSRkso1dt1oE04qoPOGEKCiUA&usqp=CAU">
				<span>Usuario: <?php echo $sesionuser;?></span>
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
	<section>
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
		//ELIMINACION DE CLIENTE
		$clave_pedido=$_GET['clave_pedido'];
		?>

		<div class="warning_div">
			<form method="post">
			<h1>CONFIRMAR ACCION!!</h1>
			<span>Seguro que quieres eliminar el PEDIDO con ID: <?php echo $clave_pedido?>?</span>
			<input id="eliminar_btn" type="submit" name="eliminar" value="SI, ELIMINAR">
			<input type="submit" name="cancelar" value="NO,CANCELAR">
			</form>
		</div>
		<?php
		if(isset($_POST['eliminar'])){
			$instruccion_pedido="DELETE FROM control_pedido WHERE clave_pedido = '$clave_pedido'";
			$query_eliminar_pedido=mysqli_query($connect,$instruccion_pedido);
			if($query_eliminar_pedido){
				 echo "<script languaje='JavaScript'>
				      alert('SE REALIZO LA BAJA CORRECTAMENTE');
				       location.assign('main_cliente.php');
				       </script>";
			}else{
				 echo "<script languaje='JavaScript'>
				      alert('NO SE REALIZO LA BAJA CORRECTAMENTE');
				      alert('EL CARRO ID QUE INGRESASTE NO EXISTE O ESTA MAL ESCRITO');
				       location.assign('pedidos.php');
				       </script>";
			}
		}

		if(isset($_POST['cancelar'])){
			header("Location:main_cliente.php");
		}
		?>

	</section>
	<footer>
		<a target="_blank" href="https://github.com/richardpro17"><img id="img6" src="https://i.postimg.cc/mDn2gHB0/github-1000-500-px.png"></a>
		<span>Richard Computer Store<br> 2022-2023 &#169;</span>
		<img id="img7" src='https://i.postimg.cc/d3nx7bhR/sql-1000-500-px.png' border='0' alt='Inicio'/>
	</footer>
</body>
</html>