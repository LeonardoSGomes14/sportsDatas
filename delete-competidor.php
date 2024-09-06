<?php
require_once 'C:\xampp\htdocs\sportsDatas\db\config.php'; // Certifique-se de que o caminho está correto

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepara a consulta SQL para excluir o competidor
        $sql = "DELETE FROM competitors WHERE id_competitor = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Executa a consulta
        $stmt->execute();

        // Verifica se a exclusão foi bem-sucedida
        if ($stmt->rowCount() > 0) {
            header('Location: competidor.php'); // Redireciona após a exclusão
            exit();
        } else {
            echo "Competitor not found.";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "No ID specified.";
}
