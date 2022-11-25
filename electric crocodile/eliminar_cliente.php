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
	<title>ELIMINAR CLIENTE</title>
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
		$curp=$_GET['curp'];
		?>

		<div class="warning_div">
			<form method="post">
			<h1>CONFIRMAR ACCION!!</h1>
			<span>Seguro que quieres eliminar al usuario <?php echo $curp?>?</span>
			<input id="eliminar_btn" type="submit" name="eliminar" value="SI, ELIMINAR">
			<input  type="submit" name="cancelar" value="NO,CANCELAR">
			</form>
		</div>
		<?php
		if(isset($_POST['eliminar'])){
			$instruccion_cliente="DELETE FROM cliente WHERE curp = '$curp'";
			$query_cliente=mysqli_query($connect,$instruccion_cliente);
			if($query_cliente){
				 echo "<script languaje='JavaScript'>
				      alert('SE REALIZO LA BAJA CORRECTAMENTE');
				       location.assign('admin_panel.php');
				       </script>";
			}else{
				 echo "<script languaje='JavaScript'>
				      alert('NO SE REALIZO LA BAJA CORRECTAMENTE');
				      alert('EL USUARIO QUE INGRESASTE NO EXISTE O ESTA MAL ESCRITO');
				       location.assign('admin_panel.php');
				       </script>";
			}
		}

		if(isset($_POST['cancelar'])){
			header("Location:admin_panel.php");
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