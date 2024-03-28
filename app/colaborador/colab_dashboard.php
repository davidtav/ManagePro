<?php
     session_start();

     // Verifica se o colaborador está autenticado
     if (!isset($_SESSION['id_colaborador'])) {
         header("Location: colab_form_login.php"); // Redireciona se não estiver autenticado
         exit();
     }

     // Obtém o id_colaborador da sessão
     $id_colaborador = $_SESSION['id_colaborador'];
     include("../../database/conecta.php");
     $dados = mysqli_query($conexao, "SELECT * FROM tarefas WHERE colab_id = $id_colaborador");
     $lista = $dados;

     //consulta para listar o nome do colaborador logado
$consulta_colaborador = mysqli_query($conexao, "SELECT nome_colaborador FROM colaborador WHERE id_colaborador = $id_colaborador");
$colaborador = mysqli_fetch_assoc($consulta_colaborador);
$nome_colaborador = $colaborador['nome_colaborador'];


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/estilo/estilogt.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
           <!-- jQuery  v3.7.1. -->
   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- link do plugin DataTables do jQuery  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <title>Dashboard Colaborador</title>

</head>

<body>
<nav>
        <img src="../../public/imagens/manage_pro_big.jpg" id="logo">

        <h1 id="colab">Colaborador(a)
        <?php echo "<br>". $nome_colaborador; ?>
            </h1>

        </h1>

        <div id="icon">
          
        <a href="colab_logout.php"><img src="../../public/imagens/logout.png"></a>
        </div>

            <div class="menu_colab">
                <a href=>Todas Requisições</a>
                
            </div>
 </nav>


        <div id="dashboardcolab">
            <table width="100%" cellspacing="0">
            <thead id="tabela">   
                <tr>
                    <th>nº da tarefa</th>
                    <th>descrição</th>
                    <th>data da requisicao</th>
                    <th>requisitante</th>
                    <th>prioridade</th>
                    <th>data início execução</th>
                    <th>data da conclusão</th>
                    <th>status</th>
                    <th>Atualizar</th>
                    </tr>
                
            </thead>
            <tbody>
            <tr>
                <?php
                    
function getStatusDescricao($statusId, $conexao) {
    $statusQuery = mysqli_query($conexao, "SELECT descricao FROM status WHERE id_status = " . $statusId);
    $status = mysqli_fetch_assoc($statusQuery);
    return ($status) ? $status["descricao"] : 'N/A';
}

function getReqNome($reqId, $conexao) {
    $reqQuery = mysqli_query($conexao, "SELECT nome_requisitante FROM requisitante WHERE id_requisitante = " . $reqId);
    $req = mysqli_fetch_assoc($reqQuery);
    return ($req) ? $req["nome_requisitante"] : 'N/A';
    }
                    foreach ($lista as $item) { ?>
                        <td><?= $item["id_tarefa"] ?></td>
                        <td><?= $item["descricao"] ?></td>
                        <td><?=date('d/m/Y',strtotime($item['data']))?></td>
                        <td><?= getReqNome($item["requisitante_id"], $conexao) ?></td>
                       
                        <td><?= $item["prioridade"] ?></td>
                        <td><?=date('d/m/Y',strtotime($item['data_inicio']))?></td>
                        <td><?=date('d/m/Y',strtotime($item['data_conclusao']))?></td>
                        <td><?= getStatusDescricao($item["status_id"], $conexao) ?></td>

                       <td align="center" width="15"><a href="colab_editar_tarefas.php?id=<?= $item["id_tarefa"] ?>"><i class="fa fa-pencil"></i></a></td>
                       

                </tr>
            <?php } ?>
                    </tbody>
                  
            </table>
            </div>
            
        <script>
    $(document).ready(
        function() {
            $('table').DataTable({
                "pageLength": 10,
                lengthMenu: [
                    [10, 15, 20, 50],
                    [10, 15, 20, 50]
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json"
                }
            });
        }
    );
</script>


    </body>

</html>