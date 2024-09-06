<?php
require_once 'db\config.php';
require_once 'MVC\Controller\localesController.php';

$controller = new LocaleController($pdo);
$locale = $controller->listLocales();
if (isset($_GET['id'])) {
    $localesId = $_GET['id'];
    $locale = $controller->listLocales();
    
    // Busca o elocalee específico
    $locale = null;
    foreach ($locales as $s) {
        if ($s['id_locale'] == $localeId) {
            $locale = $s;
            break;
        }
    }
    
    if (!$locale) {
        echo "Local não encontrado!";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_locale = $_POST['id_locale'];
    $modality = $_POST['modality'];
    $olimpic_year = $_POST['olimpic_year'];

    $controller->updateLocale($id_locale, $rua, $bairro, $numero, $cep, $cidade, $estado, $pais);
    
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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Local</title>
</head>
<body>
    <h1>Editar Local</h1>

    <form action="edit_local.php" method="POST">
        <input type="hidden" name="id_locale" value="<?php echo $locale['id_locale']; ?>">

        <label for="street">Rua:</label>
        <input type="text" name="street" id="street" value="<?php echo $locale['street']; ?>" required>

        <label for="neighborhood">Bairro:</label>
        <input type="text" name="neighborhood" id="neighborhood" value="<?php echo $locale['neighborhood']; ?>" required>

        <label for="number">Número:</label>
        <input type="text" name="number" id="number" value="<?php echo $locale['number']; ?>" required>

        <label for="cep">Cep:</label>
        <input type="number" name="cep" id="cep" value="<?php echo $locale['cep']; ?>" required>

        <label for="city">Cidade:</label>
        <input type="text" name="city" id="city" value="<?php echo $locale['city']; ?>" required>

        <label for="state">Estado:</label>
        <input type="text" name="state" id="state" value="<?php echo $locale['state']; ?>" required>

        <label for="country">country:</label>
        <input type="text" name="country" id="country" value="<?php echo $locale['country']; ?>" required>


        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
