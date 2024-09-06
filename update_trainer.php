<?php
require_once 'C:\xampp\htdocs\sportsDatas\MVC\Controller\TrainersController.php';

// Configuração do PDO
$dsn = 'mysql:host=localhost;dbname=sportsdata;charset=utf8';
$username = 'root';
$password = '';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$pdo = new PDO($dsn, $username, $password, $options);

$trainerController = new trainerController($pdo);

// Verifica se o formulário foi enviado para atualizar os dados do treinador
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_trainer = $_POST['id_trainer'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];

    // Atualiza os dados do treinador no banco de dados
    $trainerController->updateTrainer($id_trainer, $name, $age, $height, $weight, $cpf, $rg);

    // Redireciona de volta para a página de gerenciamento de treinadores
    header('Location: treinador.php');
    exit();
}

// Verifica se o ID do treinador foi passado via GET para carregar os dados
if (isset($_GET['id'])) {
    $id_trainer = $_GET['id'];

    // Obtém a lista de treinadores e encontra o treinador correspondente
    $trainers = $trainerController->listTrainers();
    $trainer = array_filter($trainers, fn($t) => $t['id_trainer'] == $id_trainer);

    // Se o treinador não for encontrado, exibe uma mensagem de erro
    if (empty($trainer)) {
        echo "Treinador não encontrado.";
        exit();
    }

    // Pega o primeiro treinador correspondente
    $trainer = reset($trainer);
} else {
    echo "ID de treinador não foi fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Treinador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Treinador</h1>
        <form method="POST">
            <input type="hidden" name="id_trainer" value="<?php echo htmlspecialchars($trainer['id_trainer']); ?>">

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($trainer['name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="age">Idade:</label>
                <input type="number" id="age" name="age" class="form-control" value="<?php echo htmlspecialchars($trainer['age']); ?>" required>
            </div>

            <div class="form-group">
                <label for="height">Altura:</label>
                <input type="number" id="height" name="height" class="form-control" step="0.01" value="<?php echo htmlspecialchars($trainer['height']); ?>" required>
            </div>

            <div class="form-group">
                <label for="weight">Peso:</label>
                <input type="number" id="weight" name="weight" class="form-control" step="0.01" value="<?php echo htmlspecialchars($trainer['weight']); ?>" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" class="form-control" value="<?php echo htmlspecialchars($trainer['cpf']); ?>" required>
            </div>

            <div class="form-group">
                <label for="rg">RG:</label>
                <input type="text" id="rg" name="rg" class="form-control" value="<?php echo htmlspecialchars($trainer['rg']); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
