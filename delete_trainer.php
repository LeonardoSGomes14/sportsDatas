<?php
require_once 'C:\xampp\htdocs\sportsDatas\MVC\Controller\TrainersController.php';


$dsn = 'mysql:host=localhost;dbname=sportsdata;charset=utf8';
$username = 'root';
$password = '';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$pdo = new PDO($dsn, $username, $password, $options);

$trainerController = new trainerController($pdo);


if (isset($_GET['id'])) {
    $id_trainer = $_GET['id'];

    $trainerController->deleteTrainer($id_trainer);

   
    header('Location: treinador.php');
    exit();
} else {
    echo "ID de treinador não foi fornecido.";
}
