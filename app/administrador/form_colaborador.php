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


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de colaborador</title>
    <link href="../../public/estilo/estilogt.css" rel="stylesheet">
</head>

<body>

    <nav>
    <a href="admin_dashboard.php"><img src="../../public/imagens/manage_pro_big.jpg" id="logo"></a>

    <h1 id="adm">Administrador(a)
            <?php echo "<br>". $nome_administrador; ?>
            </h1>

        <div id="icon">
        <a href="admin_logout.php"><img src="../../public/imagens/logout.png"></a>
        </div>

        <div class="menu_admin">
        <a href="admin_dashboard.php">Dashboard</a>
  
        </div>
    </nav>


    <!-- incluir action (vai executar o arquivo incluir) e method="post" no form -->
    <section class="colaborador">
        <form action="incluir_colaborador.php" enctype="multipart/form-data" method="POST">

        <label>Nome do colaborador:
            <input type="text" name="nome_colab" required>
            </label>
        <label>Telefone:
            <input type="text" name="fone_colab" required><br>
        </label>
        <label>E-mail:        
            <input type="email" name="email_colab" required><br>
        </label>
        <label>Senha:
            <input type="password" name="senha_colab" required><br>
        </lable>
        <p><label for="">Selecione uma foto:</label>
        <input name="arquivo" type="file"></p>

            <input type="submit" value="Cadastrar">
        </form>
    </section>



</body>



<!-- para enviar as informações do formulário, vamos criar 2 novos arquivos:
- conecta.php = irá fazer a conexão com o BD
- incluir_usuario.php = será executado qdo clicar no "cadastrar" do form-->

</html>