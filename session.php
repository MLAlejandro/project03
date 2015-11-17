<?php
$con = mysqli_connect('mysql.2freehosting.com', 'u791364826_root', '123456', 'u791364826_pr02');
session_start();
$user_check=$_SESSION['login_user'];
$sql = "SELECT * FROM tbl_usuaris WHERE id_usuari = '$user_check'";
$datos = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($datos);
$login_session =$row['email_usuari'];
?>