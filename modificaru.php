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
                        <h1>MODIFICAR USUARIO</H1>    
                </header>
        	     <section class="formulario" id="mod">
        	     <form action="modificaru2.php">
                        <p>
                        <div class="busqueda">

                        	<?php
								//realizamos la conexión con mysql
								$con = mysqli_connect('localhost', 'root', '', 'bd_project03');

								//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
								$sql = "SELECT * FROM tbl_usuaris WHERE id_usuari=$_REQUEST[id_usuari]";

								//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
								//echo "$sql<br/>";

								//lanzamos la sentencia sql que devuelve el producto en cuestión
								$datos = mysqli_query($con, $sql);
								if(mysqli_num_rows($datos)>0){
									$prod=mysqli_fetch_array($datos);
									?>
									<form name="formulario1" action="modificaru2.php" method="get">
									<input type="hidden" name="id" value="<?php echo $prod['id']; ?>">
									Email:<br/>
									<input type="text" name="email" size="20" maxlength="25" value="<?php echo $prod['email_usuari']; ?>"><br/>
									Password:<br/>
									<input type="text" name="pass" size="20" maxlength="25" value="<?php echo $prod['pass_usuari']; ?>"><br><br/>
									Administrador:
									<input type="checkbox" name="admin" size="5" maxlength="8" value="<?php echo $prod['admin']; ?>"><br/>
									</select><br/><br/>
									<input type="submit" value="Guardar">
									</form>
									<?php
								} else {
									echo "Usuario con id=$_REQUEST[id_usuari] no encontrado!";
								}
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
                <form id="botonform" action="usuaris.php"> 
                <button class="form2" type="submit">Volver</button>
                </form>
                </form>
                </form>
                <br/>

                </div>

        </body>
</html>