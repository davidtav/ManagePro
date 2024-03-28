<?php 
session_start();

if (!isset($_SESSION['id_administrador'])) {
    header("Location:admin_form_login.php"); // Redireciona se não estiver autenticado
    exit();
}

// Obtém o id_colaborador da sessão
$id_administrador = $_SESSION['id_administrador'];
//a variavel $id vai carregar o id do usuário que clicamos no editar do formulário lista_usuarios.
$id=$_GET['id'];
include("../../database/conecta.php");
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
    <title>Editar Tarefas Colaborador</title>
</head>

<body>



        <nav>
            <img src="../../public/imagens/manage_pro_big.jpg" id="logo">

            <h1 id="colab">Colaborador</h1>

            <div id="icon">
            <a href="colab_logout.php"><img src="../../public/imagens/logout.png"></a>
            </div>

            <div class="menu_colab">
                <a href="colab_dashboard.php">Requisições</a>
                <a href="admin_dashboard.php">Dashboard</a>
            </div>
        </nav>

<section class="colaborador">
<form  method="POST">
    
<h1 >Atualização da Tarefa pelo Colaborador</h1><br>

<label>Id Tarefa</label>
            <input type="text" name="id" value="<?=$item['id_tarefa']?>"><br>




<label>Colaborador responsável</label>
       <select name="colab_id">
                   <option value="<?=$item["colab_id"]?>"><?=$item["colab_id"]?></option>
                       <?php
                       $query = mysqli_query($conexao, "SELECT * FROM colaborador");
                       while ($colaborador = mysqli_fetch_assoc($query)) {
                        echo "<option value=" . $colaborador["id_colaborador"] . ">" . $colaborador["nome_colaborador"] .  "</option>";
                           
                                          }
                       ?>

                   </select>        

        

<input type="submit" value="Atualizar"><br>
</form>
</body>
</html>
         
<?php




                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        
                        $colab_id = $_POST['colab_id'];

                       
                  
                        $query_update = "UPDATE `tarefas` SET 
                        `colab_id`='$colab_id'

                       WHERE `id_tarefa`= $id"; 

             $resultado_update = mysqli_query($conexao, $query_update);

             if($resultado_update){
             header("Location:admin_lista_tarefa.php");
             exit();
             }else{
             echo "Erro ao atualizar os dados: ".mysqli_error($conexao);
             }
             }
                        
                        ?>