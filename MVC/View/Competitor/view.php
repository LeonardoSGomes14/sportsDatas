<?php
    echo "<h2>Competidores Cadastrados</h2>";
    echo "<table>";
    echo "<tr><th>Nome</th><th>Idade</th><th>Altura</th><th>Peso</th><th>gênero</th><th>CPF</th><th>RG</th><th>Equipe</th></tr>";

    try {
        $stmt = $pdo->query("SELECT * FROM competitors");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['age']) . "</td>";
            echo "<td>" . htmlspecialchars($row['height']) . "</td>";
            echo "<td>" . htmlspecialchars($row['weight']) . "</td>";
            echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
            echo "<td>" . htmlspecialchars($row['cpf']) . "</td>";
            echo "<td>" . htmlspecialchars($row['rg']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team']) . "</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "<p>Erro ao exibir competidores: " . $e->getMessage() . "</p>";
    }

    echo "</table>";
    ?>
</body>