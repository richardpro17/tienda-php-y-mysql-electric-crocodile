<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta author="Ricardo Montalvo">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN CLIENTE</title>
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
			<li><a href="admin.php">BOSS</a></li>
		</ul>
	</nav>
	<section>
		<div class="form_g">
		<form action="admin_validar.php" method="POST">
			<h1>BOSS LOGIN</h1>
			<div><label>Usuario:</label><input type="text" name="boss" ><br></div>
			<div><label>Contraseña:</label><input type="password" name="pass" ><br></div>
			<center><input id="submit_button" type="submit" name="login_boss" value="Iniciar Sesion"></center>
		</form>
	</div>
		
	</section>
	<footer>
		<a target="_blank" href="https://github.com/richardpro17"><img id="img6" src="https://i.postimg.cc/mDn2gHB0/github-1000-500-px.png"></a>
		<span>Richard Computer Store<br> 2022-2023 &#169;</span>
		<img id="img7" src='https://i.postimg.cc/d3nx7bhR/sql-1000-500-px.png' border='0' alt='Inicio'/>
	</footer>
</body>
<script type="text/javascript">
	if (window.history.replaceState){
	window.history.replaceState(null, null, window.location.href);
}
</script>
</html>