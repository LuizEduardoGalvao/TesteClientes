<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuário - Criar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Adicionar usuário
                <a href="site.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
              <form action="acoes.php" method="POST">
                <div class="mb-3">
                  <label>Nome</label>
                  <input type="text" name="Name" class="form-control">
                </div>
                <div class="mb-3">
                  <label>cpf</label>
                  <input type="text" name="Cpf" class="form-control">
                </div>
                <div class="mb-3">
                  <label>email</label>
                  <input type="text" name="Email" class="form-control">
                </div>
                <div class="mb-3">
                  <label>telefone</label>
                  <input type="text" name="Numero" class="form-control">
                </div>
                <div class="mb-3">
                  <label>endereco</label>
                  <input type="text" name="Endereco" class="form-control">
                </div>
                <div class="mb-3">
                  <button type="submit" name="create_usuario" class="btn btn-primary">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>