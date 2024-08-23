<?php

if(!isset($_SESSION)){
    session_start();
    }
    require_once "config.php";

    function logout()
    {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit;
    }

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("Location: index.php");
        exit;
    }

?>

<?php
if(!isset($_SESSION)){
    session_start();
    }
require 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
      <?php include('mensagem.php'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4> Lista de Clientes
                <a href="index.php" class="btn btn-secondary float-end"> logout </a>
                <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar Clientes</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>EMAIL</th>
                    <th>NUMERO</th>
                    <th>Endereco</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = 'SELECT * FROM dados';
                  $dados = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($dados) > 0) {
                    foreach($dados as $dados) {
                  ?>
                  <tr>
                    <td><?=$dados['id']?></td>
                    <td><?=$dados['name']?></td>
                    <td><?=$dados['cpf']?></td>
                    <td><?=$dados['email']?></td>
                    <td><?=$dados['numero']?></td>
                    <td><?=$dados['endereco']?></td>
                    <td>
                      <a href="usuario-view.php?id=<?=$dados['id']?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp;Visualizar</a> 
                      <a href="usuario-edit.php?id=<?=$dados['id']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                      <form action="acoes.php" method="POST" class="d-inline">
                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_usuario" value="<?=$dados['id']?>" class="btn btn-danger btn-sm">
                          <span class="bi-trash3-fill"></span>&nbsp;Excluir
                        </button>
                      </form>
                      
                    </td>
                  </tr>
                  <?php
                  }
                 } else {
                   echo '<h5>Nenhum usuário encontrado</h5>';
                 }
                 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>