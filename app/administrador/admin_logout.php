<?php 
session_start();
unset($_SESSION['administrador']); //desativa uma determinada variável
session_destroy(); // destroi a sessão
header("location:admin_form_login.php");

?>