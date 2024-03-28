<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Colaborador</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@1,500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../public/estilo/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <script src="../../public/scripts/alert01.js"></script>

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
</head>

<body>
  <header>
    <!-- place navbar here -->
    <nav class="nav nav-pills flex-column flex-sm-row">
      <div class="img-header lg"><a href="../../public/index.php"> <img src="../../public/imagens/logo.jpg" /></a></div>
      <div class="d-flex justify-content-center align-items-center w-100 m-2 p-lg-3" id="rotulo-funcao">
        <h1 class="rotuloColaborador">Colaborador</h1>
      </div>
    </nav>
  </header>
  <!-- place main here -->
  <main>
    <div class="container">
      <div class="row justify-content-center align-items-center gap-lg-3">
        <div class="col-sm-4">



          <h1 class="text-center w-60">Faça o login</h1>

          <form action="../../database/colab_processa_login.php" method="post" class="w-100 m-3 p-lg-3">

            <div class="form-outline mb-4">
              <div class="input-wrapper">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" name="email" id="form2Example11" class="form-control" placeholder="digite seu e-mail" />
              </div>
              <br>
              <div class="input-wrapper">
                <img src="../../public/imagens/cadeado.png" />
                <input type="password" name="senha" id="form2Example11" class="form-control" placeholder="digite sua senha" />
              </div>
            </div>

            <div class="text-center pt-1 mb-5 pb-1">
              <button class="btn btn-primary btn-lg w-100 m-1" id="btn3">Entrar
              </button>
            </div>
          </form>
          <div class=" text-center pt-1 mb-5 pb-1" id="botaoAlinhamento">
            <button class="btn btn-primary btn-lg w-100  p-lg-2 active" id="btn3" onclick="alertaPadrao01()">esqueceu sua senha?
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer>
    <!-- place footer here -->
  </footer>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>