<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta author="Ricardo Montalvo">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN CLIENTE</title>
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
error_reporting(0);
			//COMPROBAR LOGIN
		
			if(isset($_POST['login_usuario'])){

				if(empty($_POST['usuario']) || empty($_POST['telefono'])){
					echo "<script languaje='JavaScript'>
					alert ('El nombre o el numero de control no han sido ingresados');
					location.assign('cliente_login.php');
					</script>";
				}else{
					$usuario=$_POST['usuario'];
					$telefono=$_POST['telefono'];
					$confirmar_usuario="SELECT * from cliente WHERE usuario='$usuario' AND telefono='$telefono'";
					$resultado=mysqli_query($connect,$confirmar_usuario);
					if($fila=mysqli_fetch_assoc($resultado)){
						echo "<script languaje='JavaScript'>
							alert ('Bienvenido al sistema');
						</script>";
						session_start();
						$_SESSION['usuario']=$usuario;
						header("Location:main_cliente.php");
					}else{
						echo "<script languaje='JavaScript'>
							alert ('Ingresaste datos incorrectos');
						location.assign('cliente_login.php');
						</script>";
					}
				}
			}else{

			


		?>
	<section class="cliente_section">
		<div class="form_g">
			<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
				<h1>INICIO DE SESION CLIENTE</h1>
				<h3 id="main_label">Inicia sesion en tu cuenta introduciendo tu <em>Usuario</em> y tu <em>Telefono.</em></h3>
				<div>
					<label>Usuario:</label><input  type="text" name="usuario" ><br>
				</div>
				<div>
					<label>Telefono:</label><input type="password" name="telefono" ><br>
				</div>
				
				
				<input id="submit_button" type="submit" name="login_usuario" value="Iniciar Sesion">
			</form>
		</div>
	</section>

	<footer>
		<a target="_blank" href="https://github.com/richardpro17"><img id="img6" src="https://i.postimg.cc/mDn2gHB0/github-1000-500-px.png"></a>
		<span>Richard Computer Store<br> 2022-2023 &#169;</span>
		<img id="img7" src='https://i.postimg.cc/d3nx7bhR/sql-1000-500-px.png' border='0' alt='Inicio'/>
	</footer>
	<?php
}
	?>
</body>
</html>