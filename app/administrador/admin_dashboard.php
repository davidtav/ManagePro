<?php
session_start();


// Verifica se o colaborador está autenticado
if (!isset($_SESSION['id_administrador'])) {
    header("Location:admin_form_login.php"); // Redireciona se não estiver autenticado
    exit();
}

// Obtém o id_colaborador da sessão
$id_administrador = $_SESSION['id_administrador'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de colaborador</title>
    <link href="../../public/estilo/estilogt.css" rel="stylesheet">
    


  

<style>

body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    font-family: 'Prompt', sans-serif;
    font-size: 30px;
}

section {
    background-image: url('../../public/imagens/fundo.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding-top: 20px;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column; /* Adicionado para alinhar os botões verticalmente */
    align-items: center; /* Adicionado para centralizar os botões */
}

nav {
    margin-top: 20px;
    margin-bottom: 50px;
    display: flex;
    justify-content: space-around;
    width: 100%;
    font-family: 'Prompt', sans-serif;
    }

section a {
    text-decoration: none;
    color: inherit;
    display: block; /* Transforma os links em blocos para estilizar como botões */
    padding: 10px;
    margin: 5px;
    border-radius: 5px; /* Borda arredondada */
  /* Cor de fundo */
    text-align: center; /* Centraliza o texto dentro do botão */
    width: 150px; /* Defina a largura desejada para os botões */
}

#adm{background-color: #063940;
    text-align: center;
    border-radius: 10px;
    padding: 1% 5% 1% 5%;
    margin-left: 2%;
    color: white;
    height: 45px;
    margin-bottom: 20px;
}

#colab{
    text-align: center;
    background-color: #8EBDB6;
    border-radius: 10px;
    padding: 1% 5% 1% 5%;
    color: white;
    margin-left: 2%;
    margin-top: 30px;
    height: 35px;
    margin-bottom: 40px;
}

#req{
    background-color: #3E838C;
    text-align: center;
    border-radius: 10px;
    padding: 1% 5% 1% 5%;
    margin-left: 2%;
    color: white;
    width:300px;
    height: 45px;
    margin-bottom: 40px;
}

#tarefa{background-color: #5ccda7;
    text-align: center;
    border-radius: 10px;
    padding: 1% 5% 1% 5%;
    margin-left: 2%;
    color: white;
    width:300px;
    height: 45px;
    
}

h1 {
    font-size: 48px;
}

#icone{ float: right;
    margin-top: 30px;
    margin-right: 20px;
}

</style>
</head>




<body>

    <nav>
        <img src="../../public/imagens/manage_pro_big.jpg" id="logo">

    

        <div id="icone">
        <a href="admin_logout.php"><img src="../../public/imagens/logout.png"></a>
        </div>

        
    </nav>



   
    
    
    <section >
    
    <a href="lista_administrador.php" id="adm">Administradores</a>
    <a href="lista_colaborador.php" id="colab">Colaboradores</a>
    <a href="lista_requisitante.php" id="req">Requisitantes</a>
    <a href="lista_tarefa.php" id="tarefa">Painel de Tarefas</a>

    </section>



</body>



</html>