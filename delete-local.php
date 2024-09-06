<?php
require_once 'db\config.php';
require_once 'MVC\Controller\localesController.php';

$controller = new LocaleController($pdo);

if (isset($_GET['id'])) {
    $id_locale = $_GET['id'];
    $controller->deleteLocale($id_sport);
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
exit(); 
}
