<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/ficha.css" rel="stylesheet">
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
    <form method="post" action="php/regFicha.php">

        <label for="personagem">Personagem:</label>
        <input type="text" id="personagem" name="personagem" class="form-control mb-3">

        <label for="racas">Raça:</label>
        <select class="custom-select mb-3" id="racas">
            <option selected>Escolha...</option>
            <!-- inicio loop (value recebe id da raca) -->
            <option value="1">Humano</option>
            <option value="2">Elfo</option>
            <option value="3">Anão</option>
            <!-- fim loop -->
        </select>

        <label for="classes">Classe:</label>
        <select class="custom-select mb-3" id="classes">
            <option selected>Escolha...</option>
            <!--on change valor da raça -> inicio loop (value recebe id da classe) -->
            <option value="1">Guerreiro</option>
            <option value="2">Paladino</option>
            <option value="3">Ranger</option>
            <!-- fim loop -->
        </select>
        <div class="row">
            <div id="area-habilidades" class="col-lg-5">
                <label>Habilidades</label>
                    <select name="habilidade[]" class="custom-select mb-3">
                        <option selected>Escolha...</option>
                        <!--on change valor da classe -> inicio loop (value recebe id da habilidade) -->
                        <option value="1">Nome habilidade 1</option>
                        <option value="2">Nome habilidade 2</option>
                        <option value="3">Nome habilidade 3</option>
                        <!-- fim loop -->
                    </select>
            </div>
        </div>
        <button type="button" class="btn btn-outline-danger btn-lg p-3" onclick="AddAtric()">Duplicar</button>
<br>
        <button type="submit" class="btn btn-outline-success btn-lg p-3">Enviar</button>
    </form>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/jquery-3.4.1.js"></script>
<script>

    function AddAtric(){
        var area = $("#area-habilidades");
        var habilidadeInput = area.find("select").last();
        area.append(habilidadeInput.clone());
    }
</script>
</body>
</html>