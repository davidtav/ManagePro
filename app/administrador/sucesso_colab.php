<?php
$mensagem = $_GET['mensagem'];
if ($mensagem) {
    echo "<p style='font-family: Arial, Helvetica, sans-serif; color: darkblue;'>Atualização concluída com sucesso!</p>";
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

        <br>
        <a href="./lista_colaborador.php">Voltar para listagem</a>

    </body>

    </html>