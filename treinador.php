<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gerenciar Treinadores</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#" style="font-weight: bold;">SportsData</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./sports.php">Cadastrar Esportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./competidor.php">Cadastrar Competidor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./treinador.php">Cadastrar Treinador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./local.php">Cadastrar Local</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container mt-5 pt-5">
        <?php
        require_once 'MVC/Controller/TrainersController.php';

        // Configuração do PDO
        $dsn = 'mysql:host=localhost;dbname=sportsdata;charset=utf8';
        $username = 'root';
        $password = '';
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $pdo = new PDO($dsn, $username, $password, $options);

        $trainerController = new TrainerController($pdo);

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

        <h1 class="text-center mb-4">Cadastro de Treinadores</h1>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Idade:</label>
                        <input type="number" class="form-control" id="age" name="age" required>
                    </div>
                    <div class="form-group">
                        <label for="height">Altura:</label>
                        <input type="number" class="form-control" id="height" name="height" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="weight">Peso:</label>
                        <input type="number" class="form-control" id="weight" name="weight" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>
                    <div class="form-group">
                        <label for="rg">RG:</label>
                        <input type="text" class="form-control" id="rg" name="rg" required>
                    </div>
                    <button type="submit" name="create" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>

        <h2 class="text-center mt-5 mb-4">Lista de Treinadores</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
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
                                <a href="update_trainer.php?id=<?php echo htmlspecialchars($trainer['id_trainer']); ?>" >
                                    <img class="btn_action" src='img/icons8-editar-24.png' alt="Editar">
                                </a>
                                <a href="delete_trainer.php?id=<?php echo htmlspecialchars($trainer['id_trainer']); ?>"  onclick="return confirm('Tem certeza que deseja excluir este treinador?');">
                                    <img class="btn_action" src='img/icons8-remover-16.png' alt="Excluir">
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php if (isset($_POST['edit'])): ?>
            <?php
            $id_trainer = $_POST['id_trainer'];
            $trainer = array_filter($trainers, fn($t) => $t['id_trainer'] == $id_trainer);
            $trainer = reset($trainer);
            ?>
            <h2 class="text-center mt-5 mb-4">Editar Treinador</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="POST">
                        <input type="hidden" name="id_trainer" value="<?php echo htmlspecialchars($trainer['id_trainer']); ?>">
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($trainer['name']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Idade:</label>
                            <input type="number" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($trainer['age']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="height">Altura:</label>
                            <input type="number" class="form-control" id="height" name="height" step="0.01" value="<?php echo htmlspecialchars($trainer['height']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="weight">Peso:</label>
                            <input type="number" class="form-control" id="weight" name="weight" step="0.01" value="<?php echo htmlspecialchars($trainer['weight']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo htmlspecialchars($trainer['cpf']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="rg">RG:</label>
                            <input type="text" class="form-control" id="rg" name="rg" value="<?php echo htmlspecialchars($trainer['rg']); ?>" required>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </main>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./js/app.js"></script>
</body>
</html>
