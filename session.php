<?php
//$con = mysqli_connect('localhost', 'root', '', 'bd_project03');
$con = mysqli_connect('mysql.2freehosting.com', 'u976451306_root', '9603496034', 'u976451306_pr03');
session_start();
$user_check=$_SESSION['login_user'];
$sql = "SELECT * FROM tbl_usuaris WHERE id_usuari = '$user_check'";
$datos = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($datos);
$login_session =$row['email_usuari'];
$id_session =$row['id_usuari'];
$id_admin =$row['admin'];
?>