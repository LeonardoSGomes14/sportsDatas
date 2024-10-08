<?php
require_once 'db\config.php';
require_once 'MVC\Controller\SportsController.php';

$controller = new SportsController($pdo);

if (isset($_GET['id'])) {
    $sportId = $_GET['id'];
    $sports = $controller->listSports();


    $sport = null;
    foreach ($sports as $s) {
        if ($s['id_sport'] == $sportId) {
            $sport = $s;
            break;
        }
    }

    if (!$sport) {
        echo "Esporte não encontrado!";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_sport = $_POST['id_sport'];
    $modality = $_POST['modality'];
    $olimpic_year = $_POST['olimpic_year'];

    $controller->updateSport($id_sport, $modality, $olimpic_year);

    echo '<!DOCTYPE html>
          <html lang="pt-br">
          <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Redirecionando...</title>
          </head>
          <body>
              <script type="text/javascript">
                  window.onload = function() {
                      // Redireciona para a página principal
                      window.location.href = "sports.php";
                  }
              </script>
          </body>
          </html>';
    exit();
}
?>

<?php
require_once 'db\config.php';
require_once 'MVC\Controller\SportsController.php';
require_once 'MVC\Model\SportModel.php';

$controller = new SportsController($pdo);
$sports = $controller->listSports();
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <title>Cadastro de esportes</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/sobrenos.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
</head>

<header>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light fixed-top">
        <button class="navbar-toggler" type="button" id="navToggle">
            <span class="navbar-icon"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#f1f1f1"
                    class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg></span>
        </button>
        <a class="navbar-brand" href="#" style="font-weight: bold;"> Sports Data </a>
        <img class="log" src="img/usuarios-logo.png">
    </nav>

    <!-- Offcanvas -->
    <div class="offcanvas-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <span class="nav-icon"><img src="./img/icons/journal-text.svg" alt=""></span>
                <a class="nav-link" href="./sports.php">Cadastrar Esportes</a>
            </li>
            <li class="nav-item">
                <span class="nav-icon"><img src="./img/icons/exclamation-triangle.svg" alt=""></span>
                <a class="nav-link" href="./Competidor.php">Cadastrar Competidor </a>
            </li>
            <li class="nav-item">
                <span class="nav-icon"><img src="./img/icons/motherboard.svg" alt=""></span>
                <a class="nav-link" href="./treinador.php">Cadastrar Treinador</a>
            </li>
            <li class="nav-item">
                <span class="nav-icon"><img src="./img/icons/hypnotize.svg" alt=""></span>
                <a class="nav-link" href="./local.php">Cadastrar Local</a>
            </li>
        </ul>
        <!-- Rodapé do Offcanvas -->
        <div class="offcanvas-footer">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="nav-icon"><img src="./img/icons/info-circle.svg" alt=""></span>
                    <a class="nav-link" href="./sobrenos.php">Sobre nós</a>
                </li>
            </ul>
        </div>
    </div>
</header>
<main>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Esportes</title>
    </head>

    <body>
        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Esportes</title>
            <link rel="stylesheet" href="styles.css">
        </head>

        <body>


            <main class="container mt-5 pt-5">
                <h1>Editar Esporte</h1>

                <form action="edit_sport.php" method="POST">
                    <input type="hidden" name="id_sport" value="<?php echo $sport['id_sport']; ?>">

                    <label for="modality">Modalidade:</label>
                    <input type="text" name="modality" id="modality" value="<?php echo $sport['modality']; ?>" required>

                    <label for="olimpic_year">Ano Olímpico:</label>
                    <input type="number" name="olimpic_year" id="olimpic_year" value="<?php echo $sport['olimpic_year']; ?>" required>

                    <button type="submit">Salvar Alterações</button>
                </form>

               
            </main>

            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="./js/app.js"></script>
            <script src="./js/sobrenos.js"></script>

            <body>

            </body>

        </html>