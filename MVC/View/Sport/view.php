<?php
    echo "<h2>Esportes Cadastrados</h2>";
    echo "<table class='table table-striped'>";
    echo "<tr><th>Modalidade</th><th>Ano da Olimpíada</th></tr>";

    try {
        // Certifique-se de que $pdo está definido e correto
        $stmt = $pdo->query("SELECT * FROM sports");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['modality']) . "</td>";
            echo "<td>" . htmlspecialchars($row['olimpic_year']) . "</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "<p>Erro ao exibir esportes: " . $e->getMessage() . "</p>";
    }

    echo "</table>";
?>
