<?php
require 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuário - Visualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Visualizar usuário
                <a href="site.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
                <?php
              if (isset($_GET['id'])) {
                  $dados_id = mysqli_real_escape_string($conn, $_GET['id']);
                  $sql = "SELECT * FROM dados WHERE id='$dados_id'";
                  $query = mysqli_query($conn, $sql);
                if (mysqli_num_rows($query) > 0) {
                  $dados = mysqli_fetch_array($query);
                ?>
                <div class="mb-3">
                  <label>Nome</label>
                  <p class="form-control">
                    <?=$dados['name'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Cpf</label>
                  <p class="form-control">
                    <?=$dados['cpf'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Email</label>
                  <p class="form-control">
                    <?=$dados['email'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>telefone</label>
                  <p class="form-control">
                    <?=$dados['numero'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Endereco</label>
                  <p class="form-control">
                    <?=$dados['endereco'];?>
                  </p>
                </div>
                <?php
                } else {
                  echo "<h5>Usuário não encontrado</h5>";
                } 
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>