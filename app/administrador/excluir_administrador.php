<?php 
session_start();

// Verifica se o colaborador está autenticado
if (!isset($_SESSION['id_administrador'])) {
    header("Location:admin_form_login.php"); // Redireciona se não estiver autenticado
    exit();
}

// Obtém o id_colaborador da sessão
$id_administrador = $_SESSION['id_administrador'];


include("../../database/conecta.php");

if(isset($_GET['id_administrador']) && is_numeric($_GET['id_administrador'])){
    //o intval vai converter o ID em número inteiro -- considera parte inteira.
    $recebeId = intval($_GET['id_administrador']); 

    mysqli_query($conexao, "DELETE FROM `administrador` WHERE id_administrador=$recebeId");
    
    header("location:lista_administrador.php");
    // var_dump($recebeId);
}
else
{
echo "Id inválido ou inexistente !!!";
}