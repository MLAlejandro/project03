<?php
include('session.php');
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
                <p class="username"><?php echo "Bievenido ".$login_session."  ||  <a href='logout.php'>Cerrar sesión</a>"?></p>
        		<div><a class="tit" href="form.php"><h1>RESERVA</H1></a></div>
                <div><a class="tit2" href="mis_reservas.php"><h1>HISTORIAL</H1></a></div>
                <?php
                if($id_session==1){
                echo "<div><a class='tit3' href='usuaris.php'><h1>USUARIOS</H1></a></div>";
                }
                ?>
                <h1>Paso 1</h1>
        	</header>
        	<section>
        		<form class="formulario" id="paso1" action="busqueda.php">
        			<label class="tex">
                        Que dia quieres hacer la reserva?
                    </label>
                    <input type="date" min="" class="fecha" name="fecha"></input><br><br>
        			<select class="formul"  type="text" name="alua">
                        <option value="0" selected>QUE QUIERES RESERVAR?</option>
                        <?php
                            //$con = mysqli_connect('localhost', 'root', '', 'bd_project03');
                            $con = mysqli_connect('mysql.2freehosting.com', 'u976451306_root', '9603496034', 'u976451306_pr03');
                            $sql = "SELECT tbl_recurs.*, tbl_tipus.* FROM tbl_recurs, tbl_tipus";
                            $query = mysqli_query($con,$sql);
                            if(mysqli_num_rows($query)>0){
                                while($recurs=mysqli_fetch_array($query)){
                                    $valor = utf8_encode($recurs['nom_recurs']);
                                    $id_prod = utf8_encode($recurs['id_recurs']);
                                    echo "<option value='$id_prod'>". $valor ."</option>";
                                }
                            }
                        ?>   
                    </select>
					<button id="botons" class="form2" type="submit" value="ENVIAR"/>ENVIAR</button>
				</form>
        		</div>
        	</section>
        <script src='js/main.js'></script>
        <script src="js/index.js"></script>
        </body>
</html>