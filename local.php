<?php
require_once 'db\config.php';
require_once 'MVC\Controller\LocalesController.php';  
require_once 'MVC\Model\localeModel.php';  

$controller = new LocaleController($pdo);
$locales = $controller->listlocales();  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $street = $_POST['street'];
    $neighborhood = $_POST['neighborhood'];
    $number = $_POST['number'];
    $cep = $_POST['cep'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];

    $controller-> createLocale($street, $neighborhood, $number, $cep, $city, $state, $country);
}

?>


<!doctype html>
<html lang="pt-BR">

<head>
    <title>Pesquisa da Geração</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
</head>

<style>
    .accordion-button {
        width: 100%;
        transition: 0.3s;
        display: flex;
        justify-content: space-between;
        padding: 5px 10px;
        border-radius: 5px;
    }

    #ulDesafios li {
        margin-bottom: 10px;
    }

    .accordion-button.collapsed .icon {
        transform: rotate(-180deg);
        transition: 0.3s ease-in;
    }

    .accordion-button .icon {
        transition: 0.3s ease-in;
    }
</style>

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-light bg-light fixed-top">
            <button class="navbar-toggler" type="button" id="navToggle">
                <span class="navbar-icon"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#f1f1f1"
                        class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                    </svg></span>
            </button>
            <a class="navbar-brand" href="#" style="font-weight: bold;">  Sports Data   </a>
            <img class="log" src="img/usuarios-logo.png">
        </nav>
    
        <!-- Offcanvas -->
        <div class="offcanvas-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="nav-icon"><img src="./img/icons/journal-text.svg" alt=""></span>
                    <a class="nav-link" href="./sports.php">Cadastrar Esportes</a>
                </li>
                <li class="nav-item">
                    <span class="nav-icon"><img src="./img/icons/exclamation-triangle.svg" alt=""></span>
                    <a class="nav-link" href="./competidor.php">Cadastrar Competidor </a>
                </li>
                <li class="nav-item">
                    <span class="nav-icon"><img src="./img/icons/motherboard.svg" alt=""></span>
                    <a class="nav-link" href="./treinador.php">Cadastrar Treinador</a>
                </li>
                <li class="nav-item">
                    <span class="nav-icon"><img src="./img/icons/hypnotize.svg" alt=""></span>
                    <a class="nav-link" href="./local.php">Cadastrar Local</a>
                </li>
            </ul>
            <!-- Rodapé do Offcanvas -->
            <div class="offcanvas-footer">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <span class="nav-icon"><img src="./img/icons/info-circle.svg" alt=""></span>
                        <a class="nav-link" href="./sobrenos.php">Sobre nós</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>


    <main class="container mt-5 pt-5">
        <h1>Adicionar Novo Local</h1>
        <form method="post">
            <div class="form-group">
                <label for="street">Rua:</label>
                <input type="text" class="form-control" id="street" name="street" required>
            </div>
            <div class="form-group">
                <label for="neighborhood">Bairro:</label>
                <input type="text" class="form-control" id="neighborhood" name="neighborhood" required>
            </div>
            <div class="form-group">
                <label for="number">Número:</label>
                <input type="number" class="form-control" id="number" name="number" required>
            </div>
            <div class="form-group">
                <label for="cep">Cep:</label>
                <input type="text" class="form-control" id="cep" name="cep" required>
            </div>
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="state">Estado:</label>
                <input type="text" class="form-control" id="state" name="state" required>
            </div>
            <div class="form-group">
                <label for="country">País:</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Local</button>
        </form>

        <h2 class="mt-5">Lista de Locais</h2>
        <?php if (!empty($locales)) : ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>Número</th>
                    <th>Cep</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>País</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach  ($locales as $locale) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($locale['street']); ?></td>
                    <td><?php echo htmlspecialchars($locale['neighborhood']); ?></td>
                    <td><?php echo htmlspecialchars($locale['number']); ?></td>
                    <td><?php echo htmlspecialchars($locale['cep']); ?></td>
                    <td><?php echo htmlspecialchars($locale['city']); ?></td>
                    <td><?php echo htmlspecialchars($locale['state']); ?></td>
                    <td><?php echo htmlspecialchars($locale['country']); ?></td>
                    <td>
                    <a href="edit_local.php?id=<?php echo $locale['id_locale']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="delete-local.php?id=<?php echo $locale['id_locale']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este local?');">Excluir</a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else : ?>
        <p>Nenhum local cadastrado!</p>
        <?php endif; ?>
    </main>



    <button id="backToTopBtn" title="Voltar ao Topo">↑</button>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/app.js"></script>
</body>

</html>