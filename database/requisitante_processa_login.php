<?php
session_start();
include("./conecta.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  $query = "SELECT * FROM `requisitante` WHERE email='$email'";
  $resultado = $conexao->query($query);

  if ($resultado) {
    $requisitante = $resultado->fetch_assoc();
    if ($requisitante && password_verify($senha, $requisitante['senha'])) {
      $_SESSION['id_requisitante'] = $requisitante['id_requisitante'];
      $_SESSION['email'] = $requisitante['email'];

      header("location:../app/requisitante/form_tarefa.php");
    } else {
      echo "<p style='font-family: Arial, Helvetica, sans-serif; color: red;'>Login inválido: Verifique o e-mail ou a senha</p>";
    }
  }else {
    // Tratamento de erro caso a consulta SQL falhe
    echo "<p style='font-family: Arial, Helvetica, sans-serif; color: red;'>Erro na consulta SQL</p>";
  }
}

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


<script>
  setTimeout(() => {   window.location.href = "../app/requisitante/requisitante_form_login.php"; }, 2000);
</script>


    </body>

    </html>