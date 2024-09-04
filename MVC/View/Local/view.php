<?php
    echo "<h2>Localidades Cadastradas</h2>";
    echo "<table>";
    echo "<tr><th>Rua</th><th>Bairro</th><th>Número</th><th>CEP</th><th>Cidade</th><th>estado</th><th>País</th></tr>";

    try {
        $stmt = $pdo->query("SELECT * FROM locales");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['street']) . "</td>";
            echo "<td>" . htmlspecialchars($row['neighborhood']) . "</td>";
            echo "<td>" . htmlspecialchars($row['number']) . "</td>";
            echo "<td>" . htmlspecialchars($row['cep']) . "</td>";
            echo "<td>" . htmlspecialchars($row['city']) . "</td>";
            echo "<td>" . htmlspecialchars($row['state']) . "</td>";
            echo "<td>" . htmlspecialchars($row['country']) . "</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "<p>Erro ao exibir localidades: " . $e->getMessage() . "</p>";
    }

    echo "</table>";
    ?>
</body>