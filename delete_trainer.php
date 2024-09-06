<?php
require_once 'C:\xampp\htdocs\sportsDatas\MVC\Controller\TrainersController.php';

// Configuração do PDO
$dsn = 'mysql:host=localhost;dbname=sportsdata;charset=utf8';
$username = 'root';
$password = '';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$pdo = new PDO($dsn, $username, $password, $options);

$trainerController = new trainerController($pdo);

// Verifica se o ID do treinador foi passado via GET
if (isset($_GET['id'])) {
    $id_trainer = $_GET['id'];

    // Chama a função para deletar o treinador
    $trainerController->deleteTrainer($id_trainer);

    // Redireciona de volta para a página de gerenciamento de treinadores
    header('Location: treinador.php');
    exit();
} else {
    echo "ID de treinador não foi fornecido.";
}
