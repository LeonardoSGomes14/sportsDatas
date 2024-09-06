<?php

// Incluir o arquivo de configuração e o autoload (ajuste conforme necessário)
require_once 'db\config.php';
require_once 'MVC\Controller\CompetitorsController.php';
require_once 'db\config.php';


// Criar uma instância do controlador
$competitorController = new CompetitorController($pdo);

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar e validar os dados do formulário
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_STRING);
    $weight = filter_input(INPUT_POST, 'weight', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
    $team = filter_input(INPUT_POST, 'team', FILTER_SANITIZE_STRING);

    // Verificar se todos os dados estão presentes
    if ($name && $age && $height && $weight && $gender && $cpf && $rg && $team) {
        // Chamar o método do controlador para criar um novo competidor
        $competitorController->createCompetitor($name, $age, $height, $weight, $gender, $cpf, $rg, $team);

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
                    window.location.href = "competidor.php";
                }
            </script>
        </body>
        </html>';
  exit(); // Certifica-se de que o PHP não continua executando após o JavaScript
}
    } else {
        // Tratar erro: dados incompletos
        echo 'Error: All fields are required.';
    }

?>
