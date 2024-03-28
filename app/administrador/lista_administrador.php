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
$dados=mysqli_query($conexao, "SELECT * FROM administrador");
$lista = $dados;


$consulta_administrador = mysqli_query($conexao, "SELECT nome_administrador FROM administrador WHERE id_administrador = $id_administrador");
$administrador = mysqli_fetch_assoc($consulta_administrador);
$nome_administrador = $administrador['nome_administrador'];


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../../public/estilo/estilogt.css" rel="stylesheet">

    
   <!-- jQuery  v3.7.1. -->
   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- link do plugin DataTables do jQuery  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <title>listagem de administradores</title>
</head>

<body>

<nav class=colaborador>
            <a href="admin_dashboard.php"><img src="../../public/imagens/manage_pro_big.jpg" id="logo"></a>

            <h1 id="adm">Administrador(a)
            <?php echo "<br>". $nome_administrador; ?>
            </h1>

            <div id="icon">
            <a href="admin_logout.php"><img src="../../public/imagens/logout.png"></a>
            </div>

            <div class="menu_admin">
                <a href="form_administrador.php">Novo Administrador</a>
                <a href="admin_dashboard.php">Dashboard</a>
               
                
            </div>
        </nav>




    <div id="dashboardadm">
    <table width="100%" cellspacing="0">
    <thead id="tabela">
        <tr >
            <th>Código do Administrador</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>e-mail</th>
            <th>Foto</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <?php foreach ($lista as $item) { ?>
                <td><?= $item["id_administrador"] ?></td>
                <td><?= $item["nome_administrador"] ?></td>
                <td><?= $item["telefone"] ?></td>
                <td><?= $item["email"] ?></td>
                <td> <?php //verifica se a foto está definida
                if(!empty($item["foto"])){
                //exibe a miniatura da foto
                echo "<img src='fotos/{$item["foto"]}' alt='Foto do Usuário'  style='max-width: 50px; max-height: 50px; border-radius:50%'>";
                }else{//caso não tenha foto, exibe uma imagem padrão ou mensagem
                echo "sem foto";
                }
                ?>
    </td>

                <td align="center" width="15"><a href="editar_administrador.php?id=<?= $item["id_administrador"] ?>"><i class="fa fa-pencil"></i></a>
                <span align="center" width="15" onClick="verifica('<?=$item["id_administrador"] ?>')"> <a href="#"><i class="fa fa-trash"></i></a></td>
                                     
        </tr>
   


    <?php } ?>
</tbody>

</table>
    
</div>
 
    <script>
        function verifica(id) {
            if (confirm("Tem certeza que deseja Excluir permanentemente este administrador?")) {
                window.location = "excluir_administrador.php?id_administrador=" + id;
            }
        }
    </script>
    
<script>
    $(document).ready(
        function() {
            $('table').DataTable({
                "pageLength": 5,
                lengthMenu: [
                    [5, 10, 20, 50],
                    [5, 10, 20, 50]
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