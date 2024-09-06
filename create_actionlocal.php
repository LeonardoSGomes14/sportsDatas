<?php

// Incluir o arquivo de configuração e o autoload (ajuste conforme necessário)
require_once 'db\config.php';
require_once 'MVC\Controller\localesController.php';
require_once 'db\config.php';


// Criar uma instância do controlador
$LocalesController = new LocaleController($pdo);

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar e validar os dados do formulário
    $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST, 'neighborhood', FILTER_SANITIZE_NUMBER_INT);
    $numero = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $pais = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);

    // Verificar se todos os dados estão presentes
    if ($rua && $bairro && $numero && $cep && $cidade && $estado && $pais) {
        // Chamar o método do controlador para criar um novo competidor
        $LocalesController->createlocale($rua, $bairro, $numero, $cep, $cidade, $estado, $pais);

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
                    window.location.href = "local.php";
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
