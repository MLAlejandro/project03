<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Proyecto 2">
        <meta name="keywords" content="HTML5, CSS3, JavaScript">
        <link rel="stylesheet" href="css/style.css">
		<title>Reservar</title>
	</head>
	<body class="fondo">
		<div class="fondo">
			<header>
			<p class="username"><?php echo $login_session; ?> ||  <a href="index.php">Cerrar sesión</a></p>
	        </header>
			<div class="centrado">

			<?php
				$con = mysqli_connect('mysql.2freehosting.com', 'u791364826_root', '123456', 'u791364826_pr02');
				$sql = "UPDATE tbl_recurs SET estado = 'no disponible' , id_usuari = $_SESSION[login_user] WHERE nom_recurs = '$_REQUEST[nom_recurs]'";
				$datos = mysqli_query($con, $sql);
				if ($datos) {
					echo "Se ha reservado correctamente.";
				} else {
					echo "ERROR.";
				}
			?>
			<br>
			<form action="form.php" id="botonform"> 
    <button class="form2" type="submit">Volver</button>
    </form>
			</div>
		</div>
	
	</body>
</html>