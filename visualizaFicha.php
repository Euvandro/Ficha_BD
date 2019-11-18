<?php
include 'php/db.php';

session_start();
$id_usuario = $_SESSION['id_usuario'];
$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
    header("Location: index.html");
    exit;
}

$id_ficha = $_POST['id_ficha'];

$mysqli = "select * FROM ficha as f
INNER JOIN status as s on f.id_status=s.id_status
INNER JOIN atributos as a on f.id_atributos=a.id_atributos
WHERE f.id_ficha='$id_ficha'";
$resultado = mysqli_query($conn, $mysqli);
$linha = mysqli_fetch_assoc($resultado);

$mysqliRC = "SELECT r.id_raca, r.nome as raca, c.id_classe, c.nome as classe from ficha as f
INNER JOIN raca as r on f.id_raca=r.id_raca
INNER JOIN classe as c on f.id_classe=c.id_classe
WHERE f.id_ficha='$id_ficha'";
$resultadoRC = mysqli_query($conn, $mysqliRC);
$linhaRC = mysqli_fetch_assoc($resultadoRC);

$mysqliArmasAssociadas = "SELECT e.id_equipamento, e.nome, a.dano FROM equipamento as e
INNER JOIN arma as a on a.id_equipamento=e.id_equipamento
INNER JOIN ficha_equipamento as fe ON e.id_equipamento=fe.id_equipamento and fe.id_ficha='$id_ficha'";
$resultadoArmasAssociadas = mysqli_query($conn, $mysqliArmasAssociadas);
$linhaArmasAssociadas = mysqli_fetch_assoc($resultadoArmasAssociadas);

$mysqliUtilitariosAssociados = "SELECT e.id_equipamento, e.nome, u.valor FROM equipamento as e
INNER JOIN utilitario as u on u.id_equipamento=e.id_equipamento
INNER JOIN ficha_equipamento as fe ON e.id_equipamento=fe.id_equipamento and fe.id_ficha='$id_ficha'";
$resultadoUtilitariosAssociados = mysqli_query($conn, $mysqliUtilitariosAssociados);
$linhaUtilitariosAssociados = mysqli_fetch_assoc($resultadoUtilitariosAssociados);

$mysqliArmadurasAssociadas = "SELECT e.id_equipamento, e.nome, a.defesa FROM equipamento as e
INNER JOIN armadura as a on a.id_equipamento=e.id_equipamento
INNER JOIN ficha_equipamento as fe ON e.id_equipamento=fe.id_equipamento and fe.id_ficha='$id_ficha'";
$resultadoArmadurasAssociadas = mysqli_query($conn, $mysqliArmadurasAssociadas);
$linhaArmadurasAssociadas = mysqli_fetch_assoc($resultadoArmadurasAssociadas);

$mysqliHabilidadesAssociadas = "SELECT h.id_habilidade, h.nome, h.descricao, h.mana_habilidade FROM habilidade as h
INNER JOIN habilidade_ficha as hf on hf.id_habilidade=h.id_habilidade and hf.id_ficha='$id_ficha'";
$resultadoHabilidadesAssociadas = mysqli_query($conn, $mysqliHabilidadesAssociadas);
$linhaHabilidadesAssociadas = mysqli_fetch_assoc($resultadoHabilidadesAssociadas);



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
    <form method="post" action="php/alterarFicha.php">
        <div class="row">
            <div class="col-lg-6">
                <h3>Personagem</h3>
                    <label for="imagem">Imagem:</label>
                    <div class="custom-file mb-3">
                        <input type="file" accept="image/*" onchange="uploadImage()" class="custom-file-input" name="imagem" id="imagem">
                        <label class="custom-file-label" id="imgText" for="imagem">Escolha seu arquivo...</label>
                    </div>


                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control mb-3" disabled value="<?= $linha['nome'] ?>">

                <label for="racas">Raça:</label>
                <select class="custom-select mb-3" id="racas" name="raca" disabled>
                    <option selected value="<?= $linhaRC['id_raca'] ?>"><?= $linhaRC['raca'] ?></option>
                </select>

<label for="classes">Classe:</label>
<select class="custom-select mb-3" id="classes" name="classe" disabled>
        <option selected value="<?= $linhaRC['id_classe'] ?>"><?= $linhaRC['classe'] ?></option>
</select>

</div>

<div class="col-lg-6">
    <h3>Atributos</h3>
    <label for="forca">Força:</label>
    <div class="teste" id="forca">
        <input type="range" name="forca" onchange="attrChange('forca');" value="<?= $linha['forca'] ?>" class="custom-range mb-3" min="0" max="20">
        <span class="ml-4 mb-3 attr"><?= $linha['forca'] ?></span>
    </div>

    <label for="agilidade">Agilidade:</label>
    <div class="teste" id="agilidade">
        <input type="range" name="agilidade" onchange="attrChange('agilidade');" value="<?= $linha['agilidade'] ?>" class="custom-range mb-3" min="0" max="20">
        <span class="ml-4 mb-3 attr"><?= $linha['agilidade'] ?></span>
    </div>

    <label for="inteligencia">Inteligência:</label>
    <div class="teste" id="inteligencia">
        <input type="range" name="inteligencia" onchange="attrChange('inteligencia');" value="<?= $linha['inteligencia'] ?>" class="custom-range mb-3" min="0" max="20">
        <span class="ml-4 mb-3 attr"><?= $linha['inteligencia'] ?></span>
    </div>

    <label for="vontade">Vontade:</label>
    <div class="teste" id="vontade">
        <input type="range" name="vontade" onchange="attrChange('vontade')" value="<?= $linha['vontade'] ?>" class="custom-range mb-3" min="0" max="20">
        <span class="ml-4 mb-3 attr"><?= $linha['vontade'] ?></span>
    </div>
</div>
</div>
<div class="row">
    <div class="col-lg-2 col-md-3">
        <span class="attr mb-3">Nivel:</span>
        <input type="number" name="nivel" class="form-control mb-3" value="<?= $linha['nivel'] ?>" min="0"/>
    </div>
    <div class="col-lg-10 col-md-9">
        <span class="attr mb-3">Motivação:</span>
        <input type="text" id="motivacao" name="motivacao" value="<?= $linha['motivacao'] ?>" class="form-control mb-3">
    </div>

</div>
<div class="row">

    <div class="col-lg-2 mb-3">
        <h5>Geral</h5>
        <div class="row">
            <div class="col-md-12 col">
                <span class="attr">Experiencia:</span>
                <input type="number" name="xp" class="form-control mb-3" value="<?= $linha['experiencia'] ?>" min="0"/>
            </div>
            <div class="col-md-12 col">
                <span class="attr">Gold:</span>
                <input type="number" name="gold" class="form-control mb-3" value="<?= $linha['gold'] ?>" min="0"/>
            </div>
        </div>


    </div>
    <div class="col-lg-2 mb-3">
        <h5>Defesa</h5>
        <div class="row">
            <div class="col">
                <span class="attr">Bloqueio</span>
                <input type="number" name="bloqueio" class="form-control mb-3" value="<?= $linha['def_bloqueio'] ?>" min="0">
            </div>
            <div class="col">
                <span class="attr">Esquiva</span>
                <input type="number" name="esquiva" class="form-control mb-3" value="<?= $linha['def_esquiva'] ?>" min="0">
            </div>
            <div class="col-lg-12 col">
                <span class="attr">Determinação</span>
                <input type="number" name="determinacao" class="form-control mb-3" value="<?= $linha['def_determinacao'] ?>" min="0">
            </div>
        </div>
    </div>
    <div class="col-lg-2 mb-3">
        <h5>Carga</h5>
        <div class="row">

            <div class="col">
                <span class="attr">Básica</span>
                <input type="number" name="carga_basica" class="form-control mb-3" value="<?= $linha['carga_basica'] ?>" min="0">
            </div>
            <div class="col">
                <span class="attr">Pesada</span>
                <input type="number" name="carga_pesada" class="form-control mb-3" value="<?= $linha['carga_pesada'] ?>" min="0">
            </div>
            <div class="col-lg-12 col">
                <span class="attr">Máxima</span>
                <input type="number" name="carga_maxima" class="form-control mb-3" value="<?= $linha['carga_maxima'] ?>" min="0">
            </div>
        </div>
    </div>
    <div class="col-lg-6 status">
        <h5>Status</h5>
        <span class="attr mb-3">Vida:</span>
        <div class="teste mb-3" id="vida">
            <input type="range" id="rangeVida" onchange="statChange(id)" value="<?= $linha['vida'] ?>" min="0" max="60"/>
            <input type="number" name="vida" id="numberVida" class="form-control ml-2" onchange="statChange(id)" value="<?= $linha['vida'] ?>" min="0" max="60"/>
        </div>
        <span class="attr mb-3">Mana:</span>
        <div class="teste mb-3" id="mana">
            <input type="range" id="rangeMana" onchange="statChange(id)" value="<?= $linha['mana_status'] ?>" min="0" max="60"/>
            <input type="number" name="mana" id="numberMana" class="form-control ml-2" onchange="statChange(id)" value="<?= $linha['mana_status'] ?>" min="0" max="60">
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
                <?php do{?>
                <tr>
                    <td>
                        <select name="equipamentos[]" onchange="utilitarioValueChange(this)" class="custom-select ola">
                            <option selected value="<?= $linhaUtilitariosAssociados['id_equipamento'] ?>"><?= $linhaUtilitariosAssociados['nome'] ?></option>
                        </select>

                    </td>
                    <td>
                        <span><?= $linhaUtilitariosAssociados['valor'] ?></span>
                    </td>
                    <td>
                        <button type="button" onclick="btnRemover(this)" class="btn btn-outline-danger pl-2 pr-2">-</button>
                    </td>
                </tr>
                <?php
                }while($linhaUtilitariosAssociados = mysqli_fetch_assoc($resultadoUtilitariosAssociados));
                ?>
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
                <?php do{?>
                <tr>
                    <td>
                        <select name="equipamentos[]" onchange="armaValueChange(this)" class="custom-select ola">
                            <option selected value="<?= $linhaArmasAssociadas['id_equipamento'] ?>"><?= $linhaArmasAssociadas['nome'] ?></option>
                        </select>

                    </td>
                    <td>
                        <span><?= $linhaArmasAssociadas['dano'] ?></span>
                    </td>
                    <td>
                        <button type="button" onclick="btnRemover(this)" class="btn btn-outline-danger pl-2 pr-2">-</button>
                    </td>
                </tr>
                <?php
                }while($linhaArmasAssociadas = mysqli_fetch_assoc($resultadoArmasAssociadas));
                ?>


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
                <?php
                do{
                ?>
                <tr>
                    <td>
                        <select name="equipamentos[]" onchange="armaduraValueChange(this)" class="custom-select">
                            <option selected value="<?= $linhaArmadurasAssociadas['id_equipamento'] ?>"><?= $linhaArmadurasAssociadas['nome'] ?></option>
                        </select>
                    </td>
                    <td>
                        <span><?=$linhaArmadurasAssociadas['defesa']?></span>
                    </td>
                    <td>
                        <button type="button" onclick="btnRemover(this)" class="btn btn-outline-danger pl-2 pr-2">-</button>
                    </td>
                </tr>
                <?php
                }while($linhaArmadurasAssociadas = mysqli_fetch_assoc($resultadoArmadurasAssociadas));
                ?>
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
                <?php do{ ?>
                <tr>
                    <td>
                        <select name="habilidades[]" class="custom-select ListaHabilidades" onchange="carregaDadosHabilidade(this)">
                            <option selected value="<?= $linhaHabilidadesAssociadas['id_habilidade'] ?>"><?= $linhaHabilidadesAssociadas['nome'] ?></option>
                            <!--on change valor da classe -> inicio loop (value recebe id da habilidade) -->

                            <!-- fim loop -->
                        </select>
                    </td>
                    <td style="width: 50%">
                        <span><?= $linhaHabilidadesAssociadas['descricao'] ?></span>
                    </td>
                    <td>
                        <span><?= $linhaHabilidadesAssociadas['mana_habilidade'] ?></span>
                    </td>
                    <td>
                        <button type="button" onclick="btnRemover(this)" class="btn btn-outline-danger pl-2 pr-2">-</button>
                    </td>
                </tr>
                <?php }while($linhaHabilidadesAssociadas = mysqli_fetch_assoc($resultadoHabilidadesAssociadas)); ?>
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-outline-danger btn-block p-2" onclick="AddAtrib('area-habilidades')">+ Habilidades</button>
    </div>
</div>

<br>
<button type="submit" name="id_ficha" class="btn btn-outline-success btn-lg p-3" value="<?= $id_ficha ?>">Salvar Ficha</button>
</form>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/jquery-3.4.1.js"></script>
<script>


    function btnRemover(obj){

            $(obj).parent().parent().remove();

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
        var areaInput = area.find("tr").first();
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

    $( document ).ready(function() {
        carregaHabilidade();
    });
</script>
</body>
</html>