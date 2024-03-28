<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../../public/estilo/estilogt.css" rel="stylesheet">
    <title>Lista de Tarefas Administrador</title>
</head>

<body>

<nav class=colaborador>
            <img src="../../public/imagens/manage_pro_big.jpg" id="logo">

            <h1 id="adm">Administrador</h1>

            <div id="icon">
            <a href="admin_logout.php"><img src="../../public/imagens/logout.png"></a>
            </div>

            <div class="menu_admin">
            <a href="">Todas as requisições</a>
                
            </div>
        </nav>




    <div id="dashboardadm">
    <table width="100%" cellspacing="0">
        <tr >
        <th>nº da tarefa</th>
        <th>descrição</th>
        <th>data da requisicao</th>
        <th>prioridade</th>
        <th>data início execução</td>
        <th>data da conclusão</th>
        <th>status</th>
        <th>Colaborador Responsável</th>
        <th>Atualizar</th>
      
           <!--  <th>Requisitante</th>
         
            <th>Administrador</th>
            <th>Status</th> -->
        </tr>
        <tr>
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
            //variavel $dados vai armazenar todas as colunas da tabela usuarios
            $dados = mysqli_query($conexao, "SELECT * FROM tarefas  ");

            //a variável $item recebeu todos os dados da consulta ao usuário e armazena em array
            //abaixo vamos extrair as informações do array, puxando pelo índice = name do html
            while ($item = mysqli_fetch_array($dados)) { ?>
                <td><?= $item["id_tarefa"] ?></td>
                <td><?= $item["descricao"] ?></td>
                <td><?=date('d/m/Y',strtotime($item['data']))?></td>
                <td><?= $item["prioridade"] ?></td>
                <td><?=date('d/m/Y',strtotime($item['data_inicio']))?></td>
                <td><?=date('d/m/Y',strtotime($item['data_conclusao']))?></td>
                <td><?= $item["status_id"] ?></td>
                <td><?= $item["colab_id"] ?></td>
                <?php
    // Consulta para obter o nome do colaborador com base no colab_id
    $colab_query = mysqli_query($conexao, "SELECT nome_colaborador FROM colaborador WHERE id_colaborador = " . $item["colab_id"]);
    $colab_data = mysqli_fetch_assoc($colab_query);
    $nome_colaborador = $colab_data["nome_colaborador"];
    ?>
    
    <td><?= $nome_colaborador ?></td>




               <td align="center" width="15"><a href="admin_editar_tarefas.php?id=<?= $item["id_tarefa"] ?>"><i class="fa fa-pencil"></i></a></td>

        </tr>
    <?php } ?>


    </table>
    
</div>
 

</body>

</html>