<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
		$con = mysqli_connect('mysql.2freehosting.com', 'u976451306_root', '9603496034', 'u976451306_pr03');

			//$con = mysqli_connect('localhost', 'root', '', 'BD_exemple');
			$sql = "UPDATE tbl_usuaris.* SET email_usuari='$_REQUEST[email]', pass_usari='$_REQUEST[pass]', admin='$_REQUEST[admin]' WHERE id=$_REQUEST[id_usuari]";

			//echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

				
		?>
	</body>
</html>