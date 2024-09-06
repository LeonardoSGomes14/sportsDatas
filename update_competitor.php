<?php
require_once 'db\config.php'; // Ajuste o caminho conforme necessário

// Verifica se a requisição é do tipo POST para processar o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coleta os dados do formulário
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $age = intval($_POST['age']);
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $gender = $_POST['gender'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $team = $_POST['team'];

    try {
        // Atualiza os dados do competidor
        $sql = "UPDATE competitors SET name = :name, age = :age, height = :height, weight = :weight, gender = :gender, cpf = :cpf, rg = :rg, team = :team WHERE id_competitor = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':height', $height);
        $stmt->bindParam(':weight', $weight);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':team', $team);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Redireciona após a atualização
        header('Location: competidor.php');
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} elseif (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']); // Garante que o ID é um número inteiro

    try {
        // Verifica se o competidor existe
        $sql = "SELECT * FROM competitors WHERE id_competitor = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $competitor = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$competitor) {
            echo "Competitor not found.";
            exit();
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "No ID specified.";
    exit();
}
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <title>Update Competitor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Update Competitor</h1>
        <form action="update_competitor.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($competitor['id_competitor']); ?>">

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($competitor['name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($competitor['age']); ?>" required>
            </div>

            <div class="form-group">
                <label for="height">Height:</label>
                <input type="text" class="form-control" id="height" name="height" value="<?php echo htmlspecialchars($competitor['height']); ?>" required>
            </div>

            <div class="form-group">
                <label for="weight">Weight:</label>
                <input type="text" class="form-control" id="weight" name="weight" value="<?php echo htmlspecialchars($competitor['weight']); ?>" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="text" class="form-control" id="gender" name="gender" value="<?php echo htmlspecialchars($competitor['gender']); ?>" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo htmlspecialchars($competitor['cpf']); ?>" required>
            </div>

            <div class="form-group">
                <label for="rg">RG:</label>
                <input type="text" class="form-control" id="rg" name="rg" value="<?php echo htmlspecialchars($competitor['rg']); ?>" required>
            </div>

            <div class="form-group">
                <label for="team">Team:</label>
                <input type="text" class="form-control" id="team" name="team" value="<?php echo htmlspecialchars($competitor['team']); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Competitor</button>
        </form>
    </div>
</body>
</html>
