<?php
$host = "localhost";
$usuario = "root"; //qdo conectada a um servidor, este definirá o nome do usuário
$senha = "";
$nomedobanco = "gt_manager"; //nome do BD
$conexao = mysqli_connect($host, $usuario, $senha, $nomedobanco);

if ($conexao) {
    //echo ("conexão efetuada com sucesso");
} else {
    echo ("erro na conexão");
}
//agora executar o arquivo conecta lá no localhost para ver se conectou
