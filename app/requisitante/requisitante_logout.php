<?php 
session_start();
unset($_SESSION['requisitante']); //desativa uma determinada variável
session_destroy(); // destroi a sessão
header("location:requisitante_form_login.php");

?>