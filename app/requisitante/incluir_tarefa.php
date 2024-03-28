<?php
session_start(); //starta a sessão se o requisitante está conecatado

// Verifica se o requisitante está autenticado
if (!isset($_SESSION['id_requisitante'])) {
    header("Location: requisitante_form_login.php"); // Redireciona se não estiver autenticado
    exit();
}

$descricao = $_POST['descricao'];

if (isset($_POST['prioridade'])) {
    $prioridade = "sim";
} else {
    $prioridade = "não";
}

include("../../database/conecta.php");

// Obtém o id_requisitante da sessão
$id_requisitante = $_SESSION['id_requisitante'];

// Insere a tarefa vinculada ao id_requisitante
$query = "INSERT INTO `tarefas` (`id_tarefa`, `descricao`, `data`, `prioridade`, `status_id`, `colab_id`, `requisitante_id`) 
          VALUES (default, '$descricao', NOW(), '$prioridade', '1', '1', '$id_requisitante')";

mysqli_query($conexao, $query);

header("location: form_tarefa.php?mensagem=Tarefa cadastrada com sucesso");
?>
