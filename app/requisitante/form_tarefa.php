<?php
session_start();

// Verifica se o requisitante está autenticado
if (!isset($_SESSION['id_requisitante'])) {
header("Location: requisitante_form_login.php"); // Redireciona se não estiver autenticado
exit();
}
// Obtém o id_requisitante da sessão
$id_requisitante = $_SESSION['id_requisitante'];

include("../../database/conecta.php");
//consulta para listar o nome do colaborador logado
$consulta_requisitante = mysqli_query($conexao, "SELECT nome_requisitante FROM requisitante WHERE id_requisitante = $id_requisitante");
$requisitante = mysqli_fetch_assoc($consulta_requisitante);
$nome_requisitante = $requisitante['nome_requisitante'];

?>

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
        <h1 id="colab">Requisitante
            <?php echo "<br>". $nome_requisitante; ?>
            </h1>
 
       <div id="icon">
            
       <a href="requisitante_logout.php"><img src="../../public/imagens/logout.png"></a>
        </div>
        <div class="menu_requisitante">
            <a href="requisitante_dashboard.php">Lista de Tarefas</a>
            
        </div>
    </nav>

    <form  action="incluir_tarefa.php" enctype="multipart/form-data" method="POST">



        <label>
            <textarea name="descricao" placeholder="  Digite aqui a sua requisição" required></textarea>
            <br>
        </label>

        <label>Prioridade</label>
        <input type="checkbox" name="prioridade" value="sim"><br>
        </label>

        <input type="submit" value="enviar requisição"><br>
    </form>

</body>

</html>