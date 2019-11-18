<?php
include 'php/db.php';

session_start();
$id_usuario = $_SESSION['id_usuario'];
$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
    header("Location: index.html");
    exit;
}
if($usuario != 'evandroao' && $usuario !== 'arissa' && $usuario != 'gabriel'){
    header("Location: index.html");
    exit;
}

$mysqli = "SELECT e.nome, u.valor FROM utilitario as u,  equipamento as e where u.id_equipamento=e.id_equipamento LIMIT 100;";
$result = mysqli_query($conn,$mysqli);
$row = mysqli_fetch_assoc($result);
?>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/cadastrobd.css" rel="stylesheet">
    <title>Ficha RPG</title>
</head>
<body>
    <header>
        <div class="header-logo">
            <h2>Ficha Online</h2>
        </div>
        <div class="header-texto">
            <h1>Mighty Blade</h1>
        </div>
    </header>
    <div class="id-bar-user teste">
        <?php
        if($usuario === 'evandroao' || $usuario === 'arissa' || $usuario === 'gabriel'){
            ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="menu.php">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="armas.php">Armas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="armaduras.php">Armaduras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="utilitarios.php">Equipamentos</a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="estatisticas.php">Estatisticas</a>
                        </li>

                    </ul>
                </div>
            </nav>
        <?php
        }
        ?>
        <nav class="navbar w100">
            <ul class="navbar-nav w100">
                <li class="nav-item">
                    <span class="nav-link " href=""><?= $usuario ?> <a href="php/logout.php">Logout</a></span>
                </li>
            </ul>
        </nav>
    </div>
    <main>
    <h2 class="mb-3">Equipamentos</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Valor</th>
            </tr>
            </thead>
            <tbody>
            <?php
                do {
                    ?>
                    <tr>
                        <td><?= $row['nome'] ?></td>
                        <td><?= $row['valor'] ?></td>
                    </tr>
                <?php
                }while ($row = mysqli_fetch_assoc($result));
            ?>
            </tbody>
        </table>


        <form method="post" action="php/insercoes/inserirUtilitario.php">
            <h3>Novo</h3>
            <div class="row">
                <div class="col">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" required="" class="form-control mb-3">
                </div>
                <div class="col-2">
                    <label for="custo">Valor:</label>
                    <input type="number" name="valor" required="" class="form-control mb-3">
                </div>
            </div>




            <button type="submit" class="btn btn-outline-success btn-block">Enviar</button>
        </form>

    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/jquery-3.4.1.js"></script>
</body>
</html>