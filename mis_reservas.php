<?php
include('session.php');
if(!isset($id_session)){
    header('Location: index.php');
}
?>
<html lang="en">
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
                    <p class="username"><?php echo $login_session; ?> ||  <a href="index.php">Cerrar sesión</a></p>
                    <h1>Tus reservas</H1>    
                </header>
                <section class="formulario" id="res">
                		
                        <p>
           				<?php
                        //$con = mysqli_connect('localhost', 'root', '', 'bd_project03');
                        $con = mysqli_connect('mysql.2freehosting.com', 'u976451306_root', '9603496034', 'u976451306_pr03');

                        if($id_admin!=1){
                            $sql = "SELECT * from tbl_reservas inner join tbl_recurs on tbl_reservas.id_recurs=tbl_recurs.id_recurs inner join tbl_usuaris on tbl_reservas.id_usuari=tbl_usuaris.id_usuari WHERE tbl_usuaris.id_usuari = $id_session group by tbl_reservas.id_reserva ";
                        }
                        else{
                            $sql = "SELECT * from tbl_reservas inner join tbl_recurs on tbl_reservas.id_recurs=tbl_recurs.id_recurs inner join tbl_usuaris on tbl_reservas.id_usuari=tbl_usuaris.id_usuari group by tbl_reservas.id_reserva ";
                        }
                        // $sql = "SELECT tbl_usuaris.*, tbl_reservas.* FROM tbl_reservas INNER JOIN tbl_usuaris ON tbl_usuaris.id_usuari = tbl_reservas.id_usuari ";
						// $sql =  $sql = "SELECT * FROM tbl_recurs, tbl_usuaris WHERE `tbl_usuaris`.`id_usuari` = $_SESSION[login_user] AND `tbl_recurs`.`id_usuari` = `tbl_usuaris`.`id_usuari` ORDER BY `tbl_recurs`.`id_recurs` ASC";
						$datos = mysqli_query($con, $sql);
						// echo "$sql";
								if (mysqli_num_rows($datos)>0) {
                                    echo "<br>";
									while($prod = mysqli_fetch_array($datos)) {
                                        if($id_admin==1){
                                            echo "<b class='negrita'>Usuari:</b> ";
                                            echo "$prod[email_usuari]<br/>";
                                        }
										echo "<b class='negrita'>Nombre:</b> ";
                                        echo "$prod[nom_recurs]<br/>";
										echo "<b class='negrita'>Dia de reserva:</b> ";
                                        echo "$prod[data_res]<br/>";
                                        echo "<b class='negrita'>Hora reservada:</b> ";
                                        $i=$prod['hora'];
                                        $a=$i+1;
                                        if($a<10){
                                            echo "0$i:00 - 0$a:00<br>";
                                        }
                                        else{
                                            if($a<11){
                                                echo "0$i:00 - $a:00<br>";
                                            }
                                            else{
                                                echo "$i:00 - $a:00<br>";
                                            }
                                        }                                       
										$fichero="img/$prod[img_recurs]";
										if(file_exists($fichero)){
											echo "<img class='imag' src='$fichero'><br/>";
											echo "<a href='liberar.php?id_reserva=$prod[id_reserva]'> Anular </a><br/><br/>";
										} 
									}
								}else{
									echo "<h1 class='pad'>No has reservado nada</h1>";
								}
							mysqli_close($con);
						?>
                        </p>
                        
                </section>
                <form id="botonform" action="form.php"> 
                </form>
                <br>
                </div>
        </body>
</html>