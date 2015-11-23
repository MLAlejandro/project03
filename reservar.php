<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	</head>
	<body class="fondo">
		<?php
			//realizamos la conexión con mysql
		$con = mysqli_connect('mysql.2freehosting.com', 'u976451306_root', '9603496034', 'u976451306_pr03');

			//$con = mysqli_connect('localhost', 'root', '', 'bd_project03');
			$sql = "INSERT INTO tbl_reservas (id_recurs, data_res, id_usuari, hora) VALUES ('$_REQUEST[alua]', '$_REQUEST[fecha]', $id_session, $_REQUEST[horas])";

			//echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			header("location: form.php")
		?>
	</body>
</html>