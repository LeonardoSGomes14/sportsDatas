<!-- C:\xampp\htdocs\SportData\sportsDatas\MVC\View\Competitors\update.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Competitor</title>
</head>
<body>
    <h1>Update Competitor</h1>
    <?php if (isset($competitor)): ?>
    <form action="update_action.php" method="post">
        <input type="hidden" name="id_competitor" value="<?php echo htmlspecialchars($competitor['id_competitor']); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($competitor['name']); ?>" required><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($competitor['age']); ?>" required><br>
        <label for="height">Height:</label>
        <input type="text" id="height" name="height" value="<?php echo htmlspecialchars($competitor['height']); ?>" required><br>
        <label for="weight">Weight:</label>
        <input type="text" id="weight" name="weight" value="<?php echo htmlspecialchars($competitor['weight']); ?>" required><br>
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" value="<?php echo htmlspecialchars($competitor['gender']); ?>" required><br>
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($competitor['cpf']); ?>" required><br>
        <label for="rg">RG:</label>
        <input type="text" id="rg" name="rg" value="<?php echo htmlspecialchars($competitor['rg']); ?>" required><br>
        <label for="team">Team:</label>
        <input type="text" id="team" name="team" value="<?php echo htmlspecialchars($competitor['team']); ?>" required><br>
        <input type="submit" value="Update Competitor">
    </form>
    <a href="view.php">Back to List</a>
    <?php else: ?>
    <p>Competitor not found.</p>
    <?php endif; ?>
</body>
</html>
