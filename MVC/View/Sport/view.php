<?php
    echo "<h2>Esportes Cadastrados</h2>";
    echo "<table>";
    echo "<tr><th>Modalidade</th><th>Ano da Olimpíada</th></tr>";

    try {
        $stmt = $pdo->query("SELECT * FROM locales");
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
</body>