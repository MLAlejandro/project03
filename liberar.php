<?php
include('session.php');
if(!isset($id_session)){
	header('Location: index.php');
}
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
		$con = mysqli_connect('mysql.2freehosting.com', 'u976451306_root', '9603496034', 'u976451306_pr03');

		//$con = mysqli_connect('localhost', 'root', '', 'bd_project03');
		$sql = "DELETE FROM tbl_reservas WHERE id_reserva=$_REQUEST[id_reserva]";
		$datos = mysqli_query($con, $sql);
		if ($datos) {
			echo "Se ha anulado satisfactoriamente.";
		} else {
			echo "ERROR.";
		}
	?>
	<br>
	<form action="mis_reservas.php" id="botonform"> 
    <button class="form2" type="submit">Volver</button>
    </form>
</div>
		</div>
	
	</body>
</html>