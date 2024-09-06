<?php
require_once 'db/config.php';
require_once 'MVC/Controller/LocalesController.php';
require_once 'MVC/Model/localeModel.php';

// Verifica se o parâmetro 'id' está presente na URL
if (isset($_GET['id'])) {
    $id_locale = $_GET['id'];

    // Cria uma instância do controlador e modelo
    $controller = new LocaleController($pdo);

    // Chama a função para excluir o local
    $controller->deleteLocale($id_locale);

    // Redireciona de volta para a página de listagem
    header("Location: local.php");
    exit();
} else {
    // Caso o parâmetro 'id' não esteja presente, redireciona para a página de listagem
    header("Location: local.php");
    exit();
}
?>
