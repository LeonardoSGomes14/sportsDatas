<?php
require_once 'C:\xampp\htdocs\sportsDatas\db\config.php'; 
require_once 'C:\xampp\htdocs\sportsDatas\MVC\Controller\SportsController.php';  
$controller = new SportsController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modality = $_POST['modality'];
    $olimpic_year = $_POST['olimpic_year'];

    
    $controller->createSport($modality, $olimpic_year);
    header("Location:C:\xampp\htdocs\sportsDatas\sporte.php  ");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Esporte</title>
</head>
<body>
    <h1>Adicionar Novo Esporte</h1>

    <form action="add_sport.php" method="POST">
        <label for="modality">Modalidade:</label>
        <input type="text" name="modality" id="modality" required>
        
        <label for="olimpic_year">Ano Olímpico:</label>
        <input type="number" name="olimpic_year" id="olimpic_year" required>

        <button type="submit">Adicionar Esporte</button>
    </form>

    <a href="view.php">Voltar para a lista de esportes</a>
</body>
</html>
