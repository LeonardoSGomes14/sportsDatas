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
    .navegation {
        display: flex;
        flex-direction: column;
    }

    .audios {
        display: flex;
    }

    #bordoesList {
        margin: 0;
    }

    #bordoesList li {
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        font-size: 18px;
        margin-bottom: 15px;
    }

    li.expanded {
        padding-bottom: 60px;
        color: cornflowerblue;
    }

    audio {
        display: none;
        position: absolute;
        bottom: 0;
        left: 0;
    }

    li.expanded audio {
        display: block;

    }

    .carousel-item img {
        width: 100%;
        height: 220px;
    }

    section {
        padding-top: 70px;
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
                    <a class="nav-link" href="./sporte.php">Cadastrar Esportes</a>
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
                        <a class="nav-link" href="./sobrenos.html">Sobre nós</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>


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

    <script>
        const listItems = document.querySelectorAll('#bordoesList li');

        listItems.forEach(item => {
            const audio = item.querySelector('audio');

            item.addEventListener('click', () => {

                listItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('expanded');
                        otherItem.querySelector('audio').pause();
                        otherItem.querySelector('audio').currentTime = 0;
                    }
                });

                item.classList.toggle('expanded');

                if (audio.paused && item.classList.contains('expanded')) {
                    audio.play();
                } else {
                    audio.pause();
                    audio.currentTime = 0;
                    item.classList.remove('expanded');
                }

                // Quando o áudio termina, volta ao estado original
                audio.addEventListener('ended', () => {
                    item.classList.remove('expanded');
                });
            });
        });
    </script>
</body>

</html>