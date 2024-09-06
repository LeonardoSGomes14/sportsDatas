<?php
require_once 'db\config.php';
require_once 'MVC\Controller\SportsController.php';

$controller = new SportsController($pdo);

if (isset($_GET['id'])) {
    $sportId = $_GET['id'];
    $sports = $controller->listSports();
    
    
    $sport = null;
    foreach ($sports as $s) {
        if ($s['id_sport'] == $sportId) {
            $sport = $s;
            break;
        }
    }
    
    if (!$sport) {
        echo "Esporte não encontrado!";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_sport = $_POST['id_sport'];
    $modality = $_POST['modality'];
    $olimpic_year = $_POST['olimpic_year'];

    $controller->updateSport($id_sport, $modality, $olimpic_year);
    
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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Esporte</title>
</head>
<body>
    <h1>Editar Esporte</h1>

    <form action="edit_sport.php" method="POST">
        <input type="hidden" name="id_sport" value="<?php echo $sport['id_sport']; ?>">

        <label for="modality">Modalidade:</label>
        <input type="text" name="modality" id="modality" value="<?php echo $sport['modality']; ?>" required>

        <label for="olimpic_year">Ano Olímpico:</label>
        <input type="number" name="olimpic_year" id="olimpic_year" value="<?php echo $sport['olimpic_year']; ?>" required>

        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
