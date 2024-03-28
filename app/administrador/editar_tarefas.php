<?php 
session_start();

// Verifica se o colaborador está autenticado
if (!isset($_SESSION['id_administrador'])) {
    header("Location:admin_form_login.php"); // Redireciona se não estiver autenticado
    exit();
}

// Obtém o id_colaborador da sessão
$id_administrador = $_SESSION['id_administrador'];

//a variavel $id vai carregar o id do usuário que clicamos no editar do formulário lista_usuarios.
$id=$_GET['id'];
include("../../database/conecta.php");

//consulta para listar o nome do administrador logado
$consulta_administrador = mysqli_query($conexao, "SELECT nome_administrador FROM administrador WHERE id_administrador = $id_administrador");
$administrador = mysqli_fetch_assoc($consulta_administrador);
$nome_administrador = $administrador['nome_administrador'];




$query = "SELECT * FROM `tarefas` WHERE `id_tarefa`=$id";
//a função abaixo vai percorrer o array query e armazenar no $sql
$sql = mysqli_query($conexao,$query);
//$item busca os dados da função $sql e recebe os dados (que serão expressos no form no campo "value")
$item= mysqli_fetch_assoc($sql);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/estilo/estilogt.css" rel="stylesheet">
    <title>Editar Tarefas Administrador</title>
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

            <div class="menu_colab">
            <a href="lista_tarefa.php">Lista de Tarefas</a>
            <a href="admin_dashboard.php">Dashboard</a>
                
            </div>
        </nav>

<section class="colaborador">
<form  method="POST">
    
<h1 >Atualização da Tarefa pelo Colaborador</h1><br>

<label>Id Tarefa:</label>
            <input type="text" name="id" value="<?=$item['id_tarefa']?>">


<label>data início execução:</label>
        <input type="date" id="date" name="data_inicio" value="<?=$item['data_inicio']?>">
</label>

<label>data conclusão execução:</label>
        <input type="date" name="data_conclusao" value="<?=$item['data_conclusao']?>"><br>
</label>

<label>status:</label>
       
        <select name="status_id">
                    <option value="<?=$item["status_id"]?>"><?=$item["status_id"]?></option>
                        <?php
                        $query = mysqli_query($conexao, "SELECT * FROM status");
                        while ($status = mysqli_fetch_assoc($query)) {
                            echo "<option value=" . $status["id_status"] . ">" . $status["descricao"] .  "</option>";
                        }
                        ?>

                    </select><br>
                   

        
                    <label>responsável    </label>
       
       <select name="colab_id">
                   <option value="<?=$item["colab_id"]?>"><?=$item["colab_id"]?></option>
                       <?php
                       $query = mysqli_query($conexao, "SELECT * FROM colaborador");
                       while ($colab = mysqli_fetch_assoc($query)) {
                           echo "<option value=" . $colab["id_colaborador"] . ">" . $colab["nome_colaborador"] .  "</option>";
                       }
                       ?>

                   </select>
               

<input type="submit" value="Atualizar"><br>
</form>
</body>
</html>
         
<?php


                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $data_inicio = $_POST['data_inicio'];
                        $data_conclusao = $_POST['data_conclusao'];
                        $status_id = $_POST['status_id'];
                        $colab_id = $_POST['colab_id'];

                       
                  
                        $query_update = "UPDATE `tarefas` SET `data_inicio`='$data_inicio', 
                        `data_conclusao`='$data_conclusao', 
                        `status_id`='$status_id',
                        `colab_id`='$colab_id'
                       WHERE `id_tarefa`= $id"; 

             $resultado_update = mysqli_query($conexao, $query_update);

             if($resultado_update){
             header("Location:lista_tarefa.php");
             exit();
             }else{
             echo "Erro ao atualizar os dados: ".mysqli_error($conexao);
             }
             }
                        
                        ?>