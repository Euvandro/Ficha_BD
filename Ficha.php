<?php
include 'php/db.php';

session_start();
$id_usuario = $_SESSION['id_usuario'];
$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
    header("Location: index.html");
    exit;
}

$mysqliRaca = "SELECT * FROM raca ORDER BY nome ASC";
$resultadoRaca = mysqli_query($conn, $mysqliRaca);
$linhaRaca = mysqli_fetch_assoc($resultadoRaca);

$mysqliClasse = "SELECT * FROM classe ORDER BY nome ASC";
$resultadoClasse = mysqli_query($conn, $mysqliClasse);
$linhaClasse = mysqli_fetch_assoc($resultadoClasse);

$mysqliArma = "SELECT e.id_equipamento, e.nome FROM equipamento as e, arma as a WHERE e.id_equipamento = a.id_equipamento ORDER BY nome ASC";
$resultadoArma = mysqli_query($conn, $mysqliArma);
$linhaArma = mysqli_fetch_assoc($resultadoArma);

$mysqliUtilitario = "SELECT e.id_equipamento, e.nome FROM equipamento as e, utilitario as u WHERE e.id_equipamento = u.id_equipamento ORDER BY nome ASC";
$resultadoUtilitario = mysqli_query($conn, $mysqliUtilitario);
$linhaUtilitario = mysqli_fetch_assoc($resultadoUtilitario);

$mysqliArmadura = "SELECT e.id_equipamento, e.nome FROM equipamento as e, armadura as a WHERE e.id_equipamento = a.id_equipamento ORDER BY nome ASC";
$resultadoArmadura = mysqli_query($conn, $mysqliArmadura);
$linhaArmadura = mysqli_fetch_assoc($resultadoArmadura);
?>
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
<div class="id-bar-user teste">
    <?php
    if($usuario === 'evandroao'){
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
    <form method="post" action="php/regFicha.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <h3>Personagem</h3>
                    <label for="imagem">Imagem:</label>
                    <div class="custom-file mb-3">
                        <input type="file" accept="image/*" onchange="uploadImage()" class="custom-file-input" name="imagem" id="imagem">
                        <label class="custom-file-label" id="imgText" for="imagem">Escolha seu arquivo...</label>
                    </div>


                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control mb-3">

                <label for="racas">Raça:</label>
                <select class="custom-select mb-3" id="racas" name="raca" onchange="carregaHabilidade()">
                    <!-- inicio loop (value recebe id da raca) -->
                    <?php do{ ?>
                        <option value="<?= $linhaRaca['id_raca'] ?>"><?= $linhaRaca['nome'] ?></option>
                    <?php }while($linhaRaca = mysqli_fetch_assoc($resultadoRaca)); ?>
                    <!-- fim loop -->
                </select>

                <label for="classes">Classe:</label>
                <select class="custom-select mb-3" id="classes" name="classe" onchange="carregaHabilidade()">
                    <!--on change valor da raça -> inicio loop (value recebe id da classe) -->
                    <?php do{ ?>
                        <option value="<?= $linhaClasse['id_classe'] ?>"><?= $linhaClasse['nome'] ?></option>
                    <?php }while($linhaClasse = mysqli_fetch_assoc($resultadoClasse)); ?>
                    <!-- fim loop -->
                </select>

            </div>

            <div class="col-lg-6">
                <h3>Atributos</h3>
                <label for="forca">Força:</label>
                <div class="teste" id="forca">
                <input type="range" name="forca" onchange="attrChange('forca');" value="0" class="custom-range mb-3" min="0" max="20">
                    <span class="ml-4 mb-3 attr">0</span>
                </div>

                <label for="agilidade">Agilidade:</label>
                <div class="teste" id="agilidade">
                    <input type="range" name="agilidade" onchange="attrChange('agilidade');" value="0" class="custom-range mb-3" min="0" max="20">
                    <span class="ml-4 mb-3 attr">0</span>
                </div>

                <label for="inteligencia">Inteligência:</label>
                <div class="teste" id="inteligencia">
                    <input type="range" name="inteligencia" onchange="attrChange('inteligencia');" value="0" class="custom-range mb-3" min="0" max="20">
                    <span class="ml-4 mb-3 attr">0</span>
                </div>

                <label for="vontade">Vontade:</label>
                <div class="teste" id="vontade">
                    <input type="range" name="vontade" onchange="attrChange('vontade')" value="0" class="custom-range mb-3" min="0" max="20">
                    <span class="ml-4 mb-3 attr">0</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3">
                <span class="attr mb-3">Nivel:</span>
                <input type="number" name="nivel" class="form-control mb-3" value="0" min="0"/>
            </div>
            <div class="col-lg-10 col-md-9">
                <span class="attr mb-3">Motivação:</span>
                <input type="text" id="motivacao" name="motivacao" class="form-control mb-3">
            </div>

        </div>
        <div class="row">

            <div class="col-lg-2 mb-3">
                <h5>Geral</h5>
                <div class="row">
                    <div class="col-md-12 col">
                        <span class="attr">Experiencia:</span>
                        <input type="number" name="xp" class="form-control mb-3" value="0" min="0"/>
                    </div>
                    <div class="col-md-12 col">
                        <span class="attr">Gold:</span>
                        <input type="number" name="gold" class="form-control mb-3" value="0" min="0"/>
                    </div>
                </div>


            </div>
            <div class="col-lg-2 mb-3">
                <h5>Defesa</h5>
                <div class="row">
                    <div class="col">
                      <span class="attr">Bloqueio</span>
                        <input type="number" name="bloqueio" class="form-control mb-3" value="0" min="0">
                    </div>
                    <div class="col">
                        <span class="attr">Esquiva</span>
                        <input type="number" name="esquiva" class="form-control mb-3" value="0" min="0">
                    </div>
                    <div class="col-lg-12 col">
                        <span class="attr">Determinação</span>
                        <input type="number" name="determinacao" class="form-control mb-3" value="0" min="0">
                    </div>
                </div>
            </div>
            <div class="col-lg-2 mb-3">
                <h5>Carga</h5>
                <div class="row">

                    <div class="col">
                        <span class="attr">Básica</span>
                        <input type="number" name="carga_basica" class="form-control mb-3" value="0" min="0">
                    </div>
                    <div class="col">
                        <span class="attr">Pesada</span>
                        <input type="number" name="carga_pesada" class="form-control mb-3" value="0" min="0">
                    </div>
                    <div class="col-lg-12 col">
                        <span class="attr">Máxima</span>
                        <input type="number" name="carga_maxima" class="form-control mb-3" value="0" min="0">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 status">
                <h5>Status</h5>
                <span class="attr mb-3">Vida:</span>
                <div class="teste mb-3" id="vida">
                    <input type="range" id="rangeVida" onchange="statChange(id)" value="60" min="0" max="60"/>
                    <input type="number" name="vida" id="numberVida" class="form-control ml-2" onchange="statChange(id)" value="60" min="0" max="60"/>
                </div>
                <span class="attr mb-3">Mana:</span>
                <div class="teste mb-3" id="mana">
                    <input type="range" id="rangeMana" onchange="statChange(id)" value="60" min="0" max="60"/>
                    <input type="number" name="mana" id="numberMana" class="form-control ml-2" onchange="statChange(id)" value="60" min="0" max="60">
                </div>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-lg-4">
                <div id="area-equipamentos">
                    <h3>Utilitarios</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Valor</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <select name="equipamentos[]" onchange="utilitarioValueChange(this)" class="custom-select ola">
                                    <option selected>Escolha...</option>
                                    <!--on change valor da classe -> inicio loop (value recebe id da habilidade) -->
                                    <?php do{ ?>
                                        <option value="<?= $linhaUtilitario['id_equipamento'] ?>"><?= $linhaUtilitario['nome'] ?></option>
                                    <?php }while($linhaUtilitario = mysqli_fetch_assoc($resultadoUtilitario)); ?>
                                    <!-- fim loop -->
                                </select>

                            </td>
                            <td>
                                <span>00</span>
                            </td>
                            <td>
                                <button type="button" onclick="btnRemover(this)" disabled class="btn btn-outline-danger pl-2 pr-2">-</button>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-outline-danger btn-block p-2" onclick="AddAtrib('area-equipamentos')">+ Equipamentos</button>
            </div>

            <div class="col-lg-4">
                <div id="area-armas">
                    <h3>Armas</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Dano</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="equipamentos[]" onchange="armaValueChange(this)" class="custom-select ola">
                                        <option selected>Escolha...</option>
                                        <!--on change valor da classe -> inicio loop (value recebe id da habilidade) -->
                                        <?php do{ ?>
                                            <option value="<?= $linhaArma['id_equipamento'] ?>"><?= $linhaArma['nome'] ?></option>
                                        <?php }while($linhaArma = mysqli_fetch_assoc($resultadoArma)); ?>
                                        <!-- fim loop -->
                                    </select>

                                </td>
                                <td>
                                    <span>00</span>
                                </td>
                                <td>
                                    <button type="button" onclick="btnRemover(this)" disabled class="btn btn-outline-danger pl-2 pr-2">-</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-outline-danger btn-block p-2" onclick="AddAtrib('area-armas')">+ Armas</button>
            </div>

            <div class="col-lg-4">
                <div id="area-armaduras">
                    <h3>Armaduras</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Defesa</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="equipamentos[]" onchange="armaduraValueChange(this)" class="custom-select">
                                        <option selected>Escolha...</option>
                                        <!--on change valor da classe -> inicio loop (value recebe id da habilidade) -->
                                        <?php do{ ?>
                                            <option value="<?= $linhaArmadura['id_equipamento'] ?>"><?= $linhaArmadura['nome'] ?></option>
                                        <?php }while($linhaArmadura = mysqli_fetch_assoc($resultadoArmadura)); ?>
                                        <!-- fim loop -->
                                    </select>
                                </td>
                                <td>
                                    <span>00</span>
                                </td>
                                <td>
                                    <button type="button" onclick="btnRemover(this)" disabled class="btn btn-outline-danger pl-2 pr-2">-</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-outline-danger btn-block p-2" onclick="AddAtrib('area-armaduras')">+ Armaduras</button>
            </div>

        </div>
        <div class="row mb-3">
            <div class="col-lg-12">
                <div id="area-habilidades">
                    <h3>Habilidades</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Mana</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <select name="habilidades[]" class="custom-select ListaHabilidades" onchange="carregaDadosHabilidade(this)">
                                    <option selected>Escolha...</option>
                                    <!--on change valor da classe -> inicio loop (value recebe id da habilidade) -->

                                    <!-- fim loop -->
                                </select>
                            </td>
                            <td style="width: 50%">
                                <span></span>
                            </td>
                            <td>
                                <span></span>
                            </td>
                            <td>
                                <button type="button" onclick="btnRemover(this)" disabled class="btn btn-outline-danger pl-2 pr-2">-</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-outline-danger btn-block p-2" onclick="AddAtrib('area-habilidades')">+ Habilidades</button>
            </div>
        </div>

<br>
        <button type="submit" class="btn btn-outline-success btn-lg p-3">Enviar</button>
    </form>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/jquery-3.4.1.js"></script>
<script>

    function btnRemover(obj){
        if(confirm("Tem certeza que quer excluir esse quipamento?")) {
            alert($(obj).parent().parent().find("select").val() +" passar como parametro para um arquivo php para dar um delete nesse id ");
            $(obj).parent().parent().remove();
        }
    }

    function armaValueChange(obj){
        $(obj).parent().next().find("span").load("php/ajax/armaSelectValue.php", {iden: obj.value});
    }
    function utilitarioValueChange(obj){
        $(obj).parent().next().find("span").load("php/ajax/utilitarioSelectValue.php", {iden: obj.value});
    }
    function armaduraValueChange(obj){
        $(obj).parent().next().find("span").load("php/ajax/armaduraSelectValue.php", {iden: obj.value});
    }
    function carregaHabilidade(){
        raca = $("#racas").val();
        classe = $("#classes").val();
        $(".ListaHabilidades").load("php/ajax/habilidadeSelect.php", {raca: raca, classe: classe})
    }
    function carregaDadosHabilidade(obj){
        $(obj).parent().next().find("span").load("php/ajax/habilidadeDescricaoValue.php", {iden: obj.value});
        $(obj).parent().next().next().find("span").load("php/ajax/habilidadeManaValue.php", {iden: obj.value});
    }
    function statChange($id){
        var idd = $("#"+$id);
        if(idd.attr('type')=='range'){
            idd.next().val(idd.val());
        }else{
            idd.prev().val(idd.val());
        }
    }

    function AddAtrib($div){
        var area = $("#"+$div).find("tbody");
        var areaInput = area.find("tr").last();
        var clone = areaInput.clone();
        area.append(clone);
        clone.find("button").prop('disabled', false);
    }

    function uploadImage(){

        var imgField = $("#imagem").val();
        var nomeImg = $("#imgText");
        var nome = imgField.split("\\");
        nomeImg.text(nome[nome.length-1]);
    }

    function attrChange($nome){
        var atrBox = $("#"+$nome);
        var atr = atrBox.find("input").val();
        atrBox.find("span").text(atr);
    }
</script>
</body>
</html>