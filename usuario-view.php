
<?php
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ferramenta - Visualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Visualizar Ferramenta
                <a href="home.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
                <?php
              if (isset($_GET['id'])) {
                  $usuario_id = mysqli_real_escape_string($conexao, $_GET['id']);
                  $sql = "SELECT * FROM ferramentas WHERE id='$usuario_id'";
                  $query = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($query) > 0) {
                  $usuario = mysqli_fetch_array($query);
                ?>
                <div class="mb-3">
                  <label>Ferramenta</label>
                  <p class="form-control">
                    <?=$usuario['ferramenta'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Obra</label>
                  <p class="form-control">
                    <?=$usuario['obra'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Data Locação</label>
                  <p class="form-control">
                    <?=date('d/m/Y', strtotime($usuario['data_locacao']));?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Loja</label>
                  <p class="form-control">
                  <?=$usuario['loja'];?>
                  </p>
                </div>
                <?php
                } else {
                  echo "<h5>Ferramenta não encontrada</h5>";
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