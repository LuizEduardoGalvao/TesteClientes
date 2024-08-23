<?php
session_start();
require 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuário - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Editar usuário
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
              <form action="acoes.php" method="POST">
                <input type="hidden" name="dados_id" value="<?=$dados['id']?>">
                <div class="mb-3">
                  <label>Nome</label>
                  <input type="text" name="name" value="<?=$dados['name']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Cpf</label>
                  <input type="text" name="cpf" value="<?=$dados['cpf']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Email</label>
                  <input type="text" name="email" value="<?=$dados['email']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Telefone</label>
                  <input type="text" name="numero" value="<?=$dados['numero']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Endereço</label>
                  <input type="text" name="endereco" value="<?=$dados['endereco']?>" class="form-control">
                </div>
                <div class="mb-3">
                  <button type="submit" name="update_usuario" class="btn btn-primary">Salvar</button>
                </div>
              </form>
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