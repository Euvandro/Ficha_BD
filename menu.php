<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/menu.css" rel="stylesheet">
    <title>Ficha RPG</title>
</head>
<body>
<header>
    <div class="header-logo">
        <img src="img/logo.png">
    </div>
    <div class="header-texto">
        <h1>Mighty Blade</h1>

    </div>
</header>
<div class="id-bar-user teste">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="armas.php">Armas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="armaduras.php">Armaduras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="equipamentos.php">Equipamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="habilidades.php">Habilidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="classes.php">Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="racas.php">Raças</a>
                </li>

            </ul>
        </div>

    </nav>
    <nav class="navbar w100">
        <ul class="navbar-nav w100">
            <li class="nav-item">
                <a class="nav-link" href="">@Usuario Logout</a>
            </li>
        </ul>
    </nav>
</div>
<main>
    <h2>Fichas</h2>
    <ul class="list-group">
        <!-- inicio  do loop -->
        <form action="#">
            <button type="submit" name="#id_da_ficha" class="btn btn-lg btn-block">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col">Personagem</div>
                        <div class="col">Raça</div>
                        <div class="col">Classe</div>
                        <div class="col">Nivel</div>
                    </div>
                </li>
            </button>
        </form>
        <!-- fim do loop -->
    </ul>
    <a class="btn btn-outline-success btn-lg btn-block" href="ficha.php">Nova Ficha</a>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>