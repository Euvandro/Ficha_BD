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

$mysqliQtdeHabilidadeClasse = "SELECT
	COUNT(DISTINCT h.id_habilidade) as nro_habilidades
    , c.nome
FROM habilidade h
	INNER JOIN habilidade_classe hc ON hc.id_habilidade = h.id_habilidade
    INNER JOIN classe c ON c.id_classe = hc.id_classe
GROUP BY 2
ORDER BY 1 DESC";
$resultadoQtdeHabilidadeClasse = mysqli_query($conn, $mysqliQtdeHabilidadeClasse);
$linhaQtdeHabilidadeClasse = mysqli_fetch_assoc($resultadoQtdeHabilidadeClasse);

$mysqliQtdeGoldClasse = "SELECT
	SUM(s.gold) as total_gold
    , c.nome
FROM status s
	INNER JOIN ficha f ON f.id_status = s.id_status
    INNER JOIN classe c ON c.id_classe = f.id_classe
GROUP BY 2
ORDER BY 1 DESC";
$resultadoQtdeGoldClasse = mysqli_query($conn, $mysqliQtdeGoldClasse);
$linhaQtdeGoldClasse= mysqli_fetch_assoc($resultadoQtdeGoldClasse);

$mysqliQtdeItenPlayer = "SELECT
	COUNT(DISTINCT e.id_equipamento) as nro_equips
    , f.nome
FROM ficha f
	INNER JOIN ficha_equipamento fe ON f.id_ficha = fe.id_ficha
    INNER JOIN equipamento e ON fe.id_equipamento = e.id_equipamento
GROUP BY 2
ORDER BY 1 DESC";
$resultadoQtdeItenPlayer = mysqli_query($conn, $mysqliQtdeItenPlayer);
$linhaQtdeItenPlayer= mysqli_fetch_assoc($resultadoQtdeItenPlayer);

$mysqliQtdeGoldPlayer = "SELECT
	s.gold AS quantidade_de_ouro,
    f.nome AS nome_do_jogador,
    c.nome AS nome_da_classe
FROM status s
	INNER JOIN ficha f ON f.id_status = s.id_status
	INNER JOIN classe c ON f.id_classe = c.id_classe";
$resultadoQtdeGoldPlayer = mysqli_query($conn, $mysqliQtdeGoldPlayer);
$linhaQtdeGoldPlayer= mysqli_fetch_assoc($resultadoQtdeGoldPlayer);
?>
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
                        <a class="nav-link" href="estatisticas.php.php">Estatisticas</a>
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
    <h2 class="mb-5">Estatisticas</h2>
    <h3>Quantidade de habilidades por classe</h3>

            <table class="table table-striped mb-5">
                <thead>
                <tr>
                    <th width="20%">Quantidade</th>
                    <th>Classe</th>
                </tr>
                </thead>
                <tbody>
                <?php
                do {
                    ?>
                    <tr>
                        <td><?= $linhaQtdeHabilidadeClasse['nro_habilidades'] ?></td>
                        <td><?= $linhaQtdeHabilidadeClasse['nome'] ?></td>
                    </tr>
                <?php
                }while($linhaQtdeHabilidadeClasse = mysqli_fetch_assoc($resultadoQtdeHabilidadeClasse));
                ?>
                </tbody>
            </table>

    <h3>Total de ouro por classe</h3>

    <table class="table table-striped mb-5">
        <thead>
        <tr>
            <th width="20%">Quantidade</th>
            <th>Classe</th>
        </tr>
        </thead>
        <tbody>
        <?php
        do {
            ?>
            <tr>
                <td><?= $linhaQtdeGoldClasse['total_gold'] ?></td>
                <td><?= $linhaQtdeGoldClasse['nome'] ?></td>
            </tr>
        <?php
        }while($linhaQtdeGoldClasse = mysqli_fetch_assoc($resultadoQtdeGoldClasse));
        ?>
        </tbody>
    </table>

    <h3>Total de equipamentos por ficha</h3>

    <table class="table table-striped mb-5">
        <thead>
        <tr>
            <th width="20%">Quantidade</th>
            <th>Personagem</th>
        </tr>
        </thead>
        <tbody>
        <?php
        do {
            ?>
            <tr>
                <td><?= $linhaQtdeItenPlayer['nro_equips'] ?></td>
                <td><?= $linhaQtdeItenPlayer['nome'] ?></td>
            </tr>
        <?php
        }while($linhaQtdeItenPlayer = mysqli_fetch_assoc($resultadoQtdeItenPlayer));
        ?>
        </tbody>
    </table>

    <h3>Total de ouro por ficha</h3>

    <table class="table table-striped mb-5">
        <thead>
        <tr>
            <th width="20%">Quantidade</th>
            <th>Personagem</th>
            <th>Classe</th>
        </tr>
        </thead>
        <tbody>
        <?php
        do {
            ?>
            <tr>
                <td><?= $linhaQtdeGoldPlayer['quantidade_de_ouro'] ?></td>
                <td><?= $linhaQtdeGoldPlayer['nome_do_jogador'] ?></td>
                <td><?= $linhaQtdeGoldPlayer['nome_da_classe'] ?></td>
            </tr>
        <?php
        }while($linhaQtdeGoldPlayer = mysqli_fetch_assoc($resultadoQtdeGoldPlayer));
        ?>
        </tbody>
    </table>


</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>