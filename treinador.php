<!doctype html>
<html lang="pt-BR">

<head>
    <title>Pesquisa da Geração</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
</head>



<body>
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
            <a class="navbar-brand" href="#" style="font-weight: bold;">  SportsData  </a>
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
                    <a class="nav-link" href="./competidor.php">Cadastrar Competidor </a>
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
<?php
require_once 'MVC\Controller\TrainersController.php';

// Configuração do PDO
$dsn = 'mysql:host=localhost;dbname=sportsdata;charset=utf8';
$username = 'root';
$password = '';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$pdo = new PDO($dsn, $username, $password, $options);

$trainerController = new trainerController($pdo);

// Processar o formulário de cadastro
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        
        $trainerController->createTrainer($name, $age, $height, $weight, $cpf, $rg);
    } elseif (isset($_POST['update'])) {
        $id_trainer = $_POST['id_trainer'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        
        $trainerController->updateTrainer($id_trainer, $name, $age, $height, $weight, $cpf, $rg);
    } elseif (isset($_POST['delete'])) {
        $id_trainer = $_POST['id_trainer'];
        
        $trainerController->deleteTrainer($id_trainer);
    }
}

// Listar treinadores
$trainers = $trainerController->listTrainers();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Treinadores</title>
</head>
<body>
<table class="table table-striped">
    <h1>Cadastro de Treinadores</h1>
    <form method="POST">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="age">Idade:</label>
        <input type="number" id="age" name="age" required>
        <br>
        <label for="height">Altura:</label>
        <input type="number" id="height" name="height" step="0.01" required>
        <br>
        <label for="weight">Peso:</label>
        <input type="number" id="weight" name="weight" step="0.01" required>
        <br>
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required>
        <br>
        <label for="rg">RG:</label>
        <input type="text" id="rg" name="rg" required>
        <br>
        <input type="submit" name="create" value="Cadastrar">
    </form>

    <h2>Lista de Treinadores</h2>
    
    <table border="1">
        <thead>
            <tr>
            <table class="table table-striped">
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Altura</th>
                <th>Peso</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($trainers as $trainer): ?>
                <tr>
                    <td><?php echo htmlspecialchars($trainer['id_trainer']); ?></td>
                    <td><?php echo htmlspecialchars($trainer['name']); ?></td>
                    <td><?php echo htmlspecialchars($trainer['age']); ?></td>
                    <td><?php echo htmlspecialchars($trainer['height']); ?></td>
                    <td><?php echo htmlspecialchars($trainer['weight']); ?></td>
                    <td><?php echo htmlspecialchars($trainer['cpf']); ?></td>
                    <td><?php echo htmlspecialchars($trainer['rg']); ?></td>
                    <td>
                   
                    <a href="update_trainer.php?id=<?php echo htmlspecialchars($trainer['id_trainer']); ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="delete_trainer.php?id=<?php echo htmlspecialchars($trainer['id_trainer']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este treinador?');">Excluir</a> </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (isset($_POST['edit'])): ?>
        <?php
        $id_trainer = $_POST['id_trainer'];
        $trainer = array_filter($trainers, fn($t) => $t['id_trainer'] == $id_trainer);
        $trainer = reset($trainer);
        ?>
        <h2>Editar Treinador</h2>
        <form method="POST">
            <input type="hidden" name="id_trainer" value="<?php echo htmlspecialchars($trainer['id_trainer']); ?>">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($trainer['name']); ?>" required>
            <br>
            <label for="age">Idade:</label>
            <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($trainer['age']); ?>" required>
            <br>
            <label for="height">Altura:</label>
            <input type="number" id="height" name="height" step="0.01" value="<?php echo htmlspecialchars($trainer['height']); ?>" required>
            <br>
            <label for="weight">Peso:</label>
            <input type="number" id="weight" name="weight" step="0.01" value="<?php echo htmlspecialchars($trainer['weight']); ?>" required>
            <br>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($trainer['cpf']); ?>" required>
            <br>
            <label for="rg">RG:</label>
            <input type="text" id="rg" name="rg" value="<?php echo htmlspecialchars($trainer['rg']); ?>" required>
            <br>
            <input type="submit" name="update" value="Atualizar">
        </form>
    <?php endif; ?>
</body>
</html>

</main>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
































    <button id="backToTopBtn" title="Voltar ao Topo">↑</button>


    <!-- Optional JavaScript -->
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
</body>

</html>