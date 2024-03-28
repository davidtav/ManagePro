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

//consulta para listar o nome do administrador logado
$consulta_administrador = mysqli_query($conexao, "SELECT nome_administrador FROM administrador WHERE id_administrador = $id_administrador");
$administrador = mysqli_fetch_assoc($consulta_administrador);
$nome_administrador = $administrador['nome_administrador'];



//a variavel $id vai carregar o id do usuário que clicamos no editar do formulário lista_usuarios.
$id = $_GET['id'];
$query = "SELECT * FROM `requisitante` WHERE `id_requisitante`=$id";
//a função abaixo vai percorrer o array query e armazenar no $sql
$sql = mysqli_query($conexao, $query);
//$item busca os dados da função $sql e recebe os dados (que serão expressos no form no campo "value")
$item = mysqli_fetch_assoc($sql);


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Requisitante</title>
    <link href="../../public/estilo/estilogt.css" rel="stylesheet">
    <style>
        /* Estilo para aumentar a altura do input type date */
        input[type="date"] {
            height: 25px; /* Ajuste a altura conforme necessário */
            width: 180px;
            margin-right: 30px;
            margin-left: 10px;
            
        }
        select{
          margin-top: 20px;
    font-family: 'Prompt', sans-serif;
    color: black;
    font-size: 1.2em;
    border-radius: 4px;
    border-color: #063940;
    width: 800px;
    height: 30px;
    margin-top: 2px;
    margin-bottom: 20px;
           
        }

    </style>
</head>

<body>

<nav>
        <img src="../../public/imagens/manage_pro_big.jpg" id="logo">

        <h1 id="adm">Administrador(a)
            <?php echo "<br>". $nome_administrador; ?>
            </h1>

        <div id="icon">
            
        <a href="admin_logout.php"><img src="../../public/imagens/logout.png"></a>
        </div>

        <div class="menu_admin">
            <a href="lista_requisitante.php">Lista de Requisitantes</a>
            <a href="admin_dashboard.php">Dashboard</a>
        </div>
    </nav>



    <!-- incluir action (vai executar o arquivo incluir) e method="post" no form -->
    
    <section class="colaborador">
        <form method="POST">

        <h1 >Alteração de Dados do Requisitante</h1>
      
            <label>
                Nome:
                <input type="text" name="nome_req" value="<?= $item['nome_requisitante'] ?>">
            </label>
            <label>
                Telefone:
                <input type="text" name="fone_req" value="<?= $item['telefone'] ?>">
            </label>

            <label>
                e-mail:
                <input type="email" name="email_req" value="<?= $item['email'] ?>">          
            </label>

            <label>
                Senha:
                <input type="text" name="senha_req" value="<?= $item['senha'] ?>">
            </label>

                <input type="submit" value="Atualizar">
                </form>
</section>
</body>

</html>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome_req'];
    $telefone = $_POST['fone_req'];
    $email = $_POST['email_req'];
    $senha = $_POST['senha_req'];
    $hash = password_hash($senha, PASSWORD_DEFAULT);



    //nesse IF foi testado se existe dados repassados pelo metodo POST
    //ENTÃO = havendo dados repassado pelo método post, serão repassados, para as variáveis
    //a partir daqui, utilizamos o comando SQL para alterar (update)
    $query_update = "UPDATE `requisitante` SET `nome_requisitante`='$nome', 
`telefone`='$telefone', 
`email`='$email',
`senha`='$hash'
WHERE `id_requisitante`= $id";

    $resultado_update = mysqli_query($conexao, $query_update);

    if ($resultado_update) {
        header("Location:sucesso_requisitante.php?mensagem=ok");
        exit();
    } else {
        echo "Erro ao atualizar os dados: " . mysqli_error($conexao);
    }
}
?>