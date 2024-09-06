<?php
require_once 'C:\xampp\htdocs\sportsDatas\db\config.php';
require_once 'C:\xampp\htdocs\sportsDatas\MVC\Controller\SportsController.php';

$controller = new SportsController($pdo);

if (isset($_GET['id'])) {
    $id_sport = $_GET['id'];
    $controller->deleteSport($id_sport);
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
