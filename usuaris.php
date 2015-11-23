<?php
include('session.php');
//$con = mysqli_connect('localhost', 'root', '', 'bd_project03');
$con = mysqli_connect('mysql.2freehosting.com', 'u976451306_root', '9603496034', 'u976451306_pr03');
$sql = "SELECT * FROM tbl_recurs";
$query = mysqli_query($con,$sql);
if(!isset($id_session)){
	header('Location: index.php');
}
?>
<html>

		<head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="description" content="Proyecto 2">
                <meta name="keywords" content="HTML5, CSS3, JavaScript">
                <title>Proyecto 2</title>       
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        </head>
        <body>

           <div class="fondo">
           	
                <header>
                	<div><a class="tit" href="form.php"><h1>RESERVA</H1></a></div>
                <div><a class="tit2" href="mis_reservas.php"><h1>HISTORIAL</H1></a></div>
                <?php
                if($id_session==1){
                echo "<div><a class='tit3' href='usuaris.php'><h1>USUARIOS</H1></a></div>";
                }
                ?>
                       <p class="username"><?php echo $login_session; ?> ||  <a href="logout.php">Cerrar sesión</a></p>
                        <h1>USUARIOS</H1>    
                </header>
        	     <section class="formulario">
        	     <form action="reservar.php">
                        <p>
                        <div class="busqueda">
                        	<?php
								//realizamos la conexión con mysql
								//$con = mysqli_connect('localhost', 'root', '', 'bd_project03');
$con = mysqli_connect('mysql.2freehosting.com', 'u976451306_root', '9603496034', 'u976451306_pr03');

								//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
								$sql = "SELECT tbl_usuaris.* FROM tbl_usuaris ORDER BY id_usuari ASC";

								//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
								//echo "$sql<br/>";

								//lanzamos la sentencia sql
								$datos = mysqli_query($con, $sql);

								?>
								<table border class="users">
									<tr>
										<th>Id usuari</th>
										<th>Password</th>
										<th>Email</th>
										<th>Admin</th>
										<th>Acciones</th>
									</tr>

									<?php

									//recorremos los resultados y los mostramos por pantalla
									//la función substr devuelve parte de una cadena. A partir del segundo parámetro (aquí 0) devuelve tantos carácteres como el tercer parámetro (aquí 25)
									while ($prod = mysqli_fetch_array($datos)){
										echo "<td>";

										echo "$prod[id_usuari]";
										echo "</td><td>$prod[pass_usuari]</td><td>$prod[email_usuari]</td><td>$prod[admin]</td><td>";
										
										//enlace a la página que modifica el producto pasándole la id (clave primaria)
											echo "<a href='modificaru.php?id_usuari=$prod[id_usuari]'>MODIFICAR</a>";
											echo " / ";
											echo "<a href='DESAVILITAR.php?id_user=$prod[id_usuari]'>DESAVILITAR</a>";
											

										//enlace a la página que elimina el producto pasándole la id (clave primaria)

											
											

										//enlace a la página que modifica el producto (poniendo el campo pro_actiu a 0 o a 1, lo activa o lo desactiva) pasándole la id (clave primaria)
										
											echo "";
										
										

										echo "</td></tr>";
									}

									?>

								</table>

								

									<?php
								//cerramos la conexión con la base de datos
								mysqli_close($con);
							?>
						</div>
                        </p>

                </section>
                <br>
                <form id="botonform" action="crearu.php"> 
                <button class="form2" type="submit">Crear usuario</button>
                </form>
                <form id="botonform" action="form.php"> 
                <button class="form2" type="submit">Volver</button>
                </form>
                </form>
                </form>
                <br/>

                </div>

        </body>
</html>