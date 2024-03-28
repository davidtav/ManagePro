<!-- 
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
    <link href="../../public/estilo/estilogt.css" rel="stylesheet">
</head>

<body>

    <nav>


    <nav>
        <img src="../../public/imagens/manage_pro_big.jpg" id="logo">
       <h1 id="requisitante">Requisitante</h1>
 
       <div id="icon">
            
            <img src="../../public/imagens/logout.png">
        </div>
        <div class="menu_requisitante">
            <a href="#">Requisições</a>
            <a href=>Lista de Tarefas</a>
        </div>
    </nav>

    <form method="get" img scr=>



        <label>
            <textarea name="descricao" placeholder="  Digite aqui a sua requisição" required></textarea>
            <br>
        </label>

        <input type="date" name="data_requisicao" required>Selecione a data da Requisição:<br>

        <label>Prioridade</label>
        <input type="checkbox" name="prioridade" value="sim"><br>
        </label>

        <input type="submit" value="enviar requisição"><br>
    </form>

    <?php
    //vai buscar se há nome registrado na id nome do formulário//
    if (array_key_exists('descricao', $_GET)) {
        $nova_tarefa = [
            'descricao' => $_GET['descricao'],
            'data_requisicao' => $_GET['data_requisicao'],
            'prioridade' => isset($_GET['prioridade']) ? $_GET['prioridade'] : 'não'

        ];

        $_SESSION['lista_tarefas'][] = $nova_tarefa;
    }
    //vai testar se existe uma nova_tarefa dentro da $_SESSION e vai jogar para uma nova variável chamada $lista-tarefas//
    if (array_key_exists('lista_tarefas', $_SESSION)) {
        $lista_tarefas = $_SESSION['lista_tarefas'];
        //passou a lista de tarefas da session para a variável abaixo $lista_tarefas. Essa variável lista de tarefas vai ser puxada no foreach dentro da table
    } else {
        $lista_tarefas = [];
    }
    ?>
    <table id="tabelaarray">
        <tr>
            <th>Data da Requisição</th>
            <th>Descrição</th>
            <th>Prioridade</th>
        </tr>
        <?php
        //o foreach vai lendo as tarefas cadastradas e jogando para a lista de tarefas... vai criando um array
        foreach ($lista_tarefas as $tarefa) : ?>
            <tr>

                <td><?php if (isset($tarefa['data_requisicao'])) {
                        echo $tarefa['data_requisicao'];
                    } else {
                        echo '';
                    } ?></td>

                <td><?php if (isset($tarefa['descricao'])) {
                        echo $tarefa['descricao'];
                    } else {
                        echo '';
                    } ?></td>




                <td><?php if (isset($tarefa['prioridade'])) {
                        echo $tarefa['prioridade'];
                    } else {
                        echo 'não';
                    } ?></td>



            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>
 -->