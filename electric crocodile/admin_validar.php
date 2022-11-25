<?php
	//CONEXION
			$user='root';
			$db='electric crocodile';
			$host='localhost';
			$password='';
			$connect=mysqli_connect($host,$user,$password,$db);
			if($connect){
				echo '<h2>Se realizo la conexion de forma correcta que PRO</h2>';
			}else{
				echo '<h2>Error al conectar la base de datos pro, no se realizo de forma correcta</h2>';
			}

			//COMPROBAR LOGIN
			error_reporting(0);
			$boss=$_POST['boss'];
			$pass=$_POST['pass'];
			if(isset($_POST['login_boss'])){

				if(empty($boss) || empty($pass)){
					echo "<script languaje='JavaScript'>
					alert ('El nombre o el numero de control no han sido ingresados');
					location.assign('admin.php');
					</script>";
				}else{
					//CONFIRMAR JEJE
					if($boss == "RM17" && $pass == "1234"){
						session_start();
						$_SESSION['boss'] = $boss;
						header("Location:admin_panel.php");
					}else{
						echo "<script languaje='JavaScript'>
							alert ('Ingresaste datos incorrectos');
							location.assign('admin.php');
							</script>";
					}
				}
			}

			
			
			

			


		?>