<?php
require_once 'db/config.php';
require_once 'MVC/Controller/LocalesController.php';  
require_once 'MVC/Model/localeModel.php';  

$controller = new LocaleController($pdo);

$locale = null;

if (isset($_GET['id'])) {
    $localesId = $_GET['id'];
    
    // Busca todos os locais
    $allLocales = $controller->listLocales();
    
    // Verifica se o local específico existe
    foreach ($allLocales as $s) {
        if ($s['id_locale'] == $localesId) {
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
    $street = $_POST['street'];
    $neighborhood = $_POST['neighborhood'];
    $number = $_POST['number'];
    $cep = $_POST['cep'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];

    $controller->updateLocale($id_locale, $street, $neighborhood, $number, $cep, $city, $state, $country);
    
    header('Location: local.php');
    exit(); 
}
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <title>Editar Local</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Local</h1>
        
        <?php if ($locale): ?>
        <form method="post">
            <input type="hidden" name="id_locale" value="<?php echo htmlspecialchars($locale['id_locale']); ?>">

            <div class="form-group">
                <label for="street">Rua:</label>
                <input type="text" class="form-control" id="street" name="street" value="<?php echo htmlspecialchars($locale['street']); ?>" required>
            </div>
            <div class="form-group">
                <label for="neighborhood">Bairro:</label>
                <input type="text" class="form-control" id="neighborhood" name="neighborhood" value="<?php echo htmlspecialchars($locale['neighborhood']); ?>" required>
            </div>
            <div class="form-group">
                <label for="number">Número:</label>
                <input type="number" class="form-control" id="number" name="number" value="<?php echo htmlspecialchars($locale['number']); ?>" required>
            </div>
            <div class="form-group">
                <label for="cep">Cep:</label>
                <input type="text" class="form-control" id="cep" name="cep" value="<?php echo htmlspecialchars($locale['cep']); ?>" required>
            </div>
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlspecialchars($locale['city']); ?>" required>
            </div>
            <div class="form-group">
                <label for="state">Estado:</label>
                <input type="text" class="form-control" id="state" name="state" value="<?php echo htmlspecialchars($locale['state']); ?>" required>
            </div>
            <div class="form-group">
                <label for="country">País:</label>
                <input type="text" class="form-control" id="country" name="country" value="<?php echo htmlspecialchars($locale['country']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
        <?php else: ?>
        <p>Local não encontrado!</p>
        <?php endif; ?>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
