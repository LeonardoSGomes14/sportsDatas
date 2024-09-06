<!-- C:\xampp\htdocs\SportData\sportsDatas\MVC\View\Competitors\delete.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Competitor</title>
</head>
<body>
    <h1>Delete Competitor</h1>
    <?php if (isset($competitor)): ?>
    <p>Are you sure you want to delete the competitor <strong><?php echo htmlspecialchars($competitor['name']); ?></strong>?</p>
    <form action="delete_action.php" method="post">
        <input type="hidden" name="id_competitor" value="<?php echo htmlspecialchars($competitor['id_competitor']); ?>">
        <input type="submit" value="Delete">
    </form>
    <a href="view.php">Back to List</a>
    <?php else: ?>
    <p>Competitor not found.</p>
    <?php endif; ?>
</body>
</html>
