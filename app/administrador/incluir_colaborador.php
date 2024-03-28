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

if(isset ($_FILES['arquivo'])){
    $arquivo=$_FILES['arquivo'];
    if ($arquivo['error']){
    die ("falha ao enviar o arquivo");
}else{
    if ($arquivo['size']>6000000){
        die("arquivo muito grande!!! Max:6Mb");
}
}
    $pasta = "fotos/";
    $nomedoarquivo = $arquivo['name'];
    $novoNomedoArquivo = uniqid(); // aqui o nome do arquivo é alterado.
    $extensao=strtolower(pathinfo($nomedoarquivo, PATHINFO_EXTENSION));


    if ($extensao !="jpg" && $extensao !="png" && $extensao !="jpeg")
        die ("Tipo de arquivo não aceito");
    $deu_certo = move_uploaded_file($arquivo['tmp_name'],$pasta.$novoNomedoArquivo.".".$extensao);
    
    
    if($deu_certo){
        echo "<p style='font-family: Arial, Helvetica, sans-serif; color: darkblue;'Arquivo enviado com sucesso!</p>";
           
       
    }else{
        echo "<p style='font-family: Arial, Helvetica, sans-serif; color: red;'>Falha ao enciar o arquivo.</p>";
        }
}


//o campo entre os colchetes deve ser idêntico ao "name" do formulário
$nome_colaborador = $_POST['nome_colab'];
$telefone = $_POST['fone_colab'];
$email = $_POST['email_colab'];
$senha = $_POST['senha_colab'];
$hash = password_hash($senha, PASSWORD_DEFAULT);
$foto =$novoNomedoArquivo.'.'.$extensao;



mysqli_query($conexao, "INSERT INTO `colaborador`(`id_colaborador`, `nome_colaborador`, `telefone`,`email`,`senha`,`foto` ) VALUES (default, '$nome_colaborador','$telefone','$email','$hash','$foto')");
?>
<DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sucesso</title>
        <link href="style.css" rel="stylesheet">
        <style>
          a{
            font-family: Arial, Helvetica, sans-serif;
          }
        </style>

    </head>

    <body>

        <br>
        <a href="../administrador/form_colaborador.php">Voltar para Cadastro de novo colaborador</a>

    </body>

    </html>