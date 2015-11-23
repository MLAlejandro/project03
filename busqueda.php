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
                        <h1>Paso 2</H1>    
                </header>
        	     <section class="formulario">
        	     <form action="reservar.php">
                        <p>
                        <div class="busqueda">
                        <?php
                        	echo "<input type='hidden' name='alua' value='$_REQUEST[alua]'>";
                        	echo "<input type='hidden' name='fecha' value='$_REQUEST[fecha]'>";
							$comprovado=0;
							$sql = "SELECT tbl_recurs.*, tbl_tipus.* FROM tbl_tipus INNER JOIN tbl_recurs ON tbl_recurs.id_tipus = tbl_tipus.id_tipus ";
							if(isset($_REQUEST['alua'])) {
								$aulas = $_REQUEST['alua'];
								$sql.= "WHERE tbl_recurs.id_recurs='$aulas' ";
								$comprovado=1;
							}
							if ($_REQUEST['alua']==0) {
								$sql.="";
							}
								
							if (($_REQUEST['alua'])==0 || ($_REQUEST['fecha'])==0){
								echo"<h1>No hay ningun resultado</h1>";
							}
						
							if(isset($_REQUEST['alua']) AND ($_REQUEST['fecha'])!=0){
							$datos = mysqli_query($con, $sql);
									$filas= mysqli_num_rows($datos);
										while($prod = mysqli_fetch_array($datos))
										{
											echo "<br/><b class='negrita'>Nombre:</b> $prod[nom_recurs]<br/>";
											echo "<b class='negrita'>Tipo:</b> $prod[nom_tipus]<br/>";
											echo "<b class='negrita'>Descripción:</b> $prod[desc_recurs]<br><br>";
											$fichero="img/$prod[img_recurs]";
											if(file_exists($fichero))
											{
												echo "<img class='imag' src='$fichero'><br/>";
											} else 
											{
												echo "<img class='imag' src='img/no_disponible.jpg'><br/>";

											}
										}
							}
						?>
						</div>
						<div class="horas">
							<form action="reservar.php?id_recurs=$aulas" method="GET">
							<?php
								
								if($_REQUEST['alua']>0 AND ($_REQUEST['fecha'])!=0){
									for ($i = 8; $i <= 16; $i++){
										$sql = "SELECT tbl_reservas.* FROM tbl_reservas WHERE tbl_reservas.id_recurs = $_REQUEST[alua] AND tbl_reservas.data_res ='$_REQUEST[fecha]'";
										$datos = mysqli_query($con, $sql);
										$ya=0;
										$a=$i+1;
										if($a<10){
											while($prod = mysqli_fetch_array($datos)) {
												
												if($prod['hora']==$i){
													
													$ya=1;
												}
											}
											if($ya==1){
												echo "<p class='ya'>0$i:00 - 0$a:00</p>";
											}
											else{
												echo "<p><input id='poco' type='radio' name='horas' value='$i'> 0$i:00 - 0$a:00</p>";
											}
										}
										else{
											if($a<11){
												while($prod = mysqli_fetch_array($datos)) {
													
													if($prod['hora']==$i){
														$ya=1;
														
													}
												}
												if($ya==1){
													echo "<p class='ya'>0$i:00 - $a:00</p>";
												}
												else{
													echo "<p><input id='poco' type='radio' name='horas' value='$i'> 0$i:00 - $a:00</p>";
												}
											}
											else{
												while($prod = mysqli_fetch_array($datos)) {
													
													if($prod['hora']==$i){
														$ya=1;
														
													}
												}
												if($ya==1){
													echo "<p class='ya'>$i:00 - $a:00</p>";
												}
												else{
													echo "<p><input id='poco' type='radio' name='horas' value='$i'> $i:00 - $a:00</p>";
												}
											}										
										}
									}
								}
							?>

							
						</div>
                        </p>

                </section>
                <button id="conf" class="form2" type='submit'>confirmar</button>
                <br>
                <form id="botonform" action="form.php"> 
                <button class="form2" type="submit">Volver</button>
                </form>
                </form>
                </form>
                <br/>

                </div>

        </body>
</html>