<?php 
session_start();
unset($_SESSION['colaborador']); //desativa uma determinada variável
session_destroy(); // destroi a sessão
header("location:colab_form_login.php");

?>