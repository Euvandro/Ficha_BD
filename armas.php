<?php
include 'php/db.php';

session_start();
$id_usuario = $_SESSION['id_usuario'];
$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
    header("Location: index.html");
    exit;
}

$mysqli = "SELECT * FROM arma LIMIT 100";
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
        <img src="img/logo.png">
    </div>
    <div class="header-texto">
        <h1>Mighty Blade</h1>
    </div>
</header>
<div class="id-bar-user">
    <p>@Usuario <a href="#">Logout</a></p>
</div>
<main>
    <h2 class="mb-3">Armas</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Dano</th>
        </tr>
        </thead>
        <tbody>
        <?php
        do {
            ?>
            <tr>
                <td><?= $row['Nome'] ?></td>
                <td><?= $row['Dano'] ?></td>
            </tr>
        <?php
        }while ($row = mysqli_fetch_assoc($result));
        ?>
        </tbody>
    </table>


    <form method="post" action="">
        <h3>Novo</h3>
        <div class="row">
            <div class="col">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control mb-3">
            </div>
            <div class="col">
                <label for="armas">Dano:</label>
                <input type="number" name="armas" class="form-control mb-3">
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