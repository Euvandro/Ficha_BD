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
        <div class="row">
            <div class="col-lg-6">
                <h3>Personagem</h3>
                    <label for="imagem">Imagem:</label>
                    <div class="custom-file mb-3">
                        <input type="file" accept="image/*" onchange="uploadImage()" class="custom-file-input" id="imagem">
                        <label class="custom-file-label" id="imgText" for="imagem">Escolha seu arquivo...</label>
                    </div>


                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control mb-3">

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
                    <h3>Equipamentos</h3>
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
                                <select name="equipamentos[]" onchange="" class="custom-select ola">
                                    <option selected>Escolha...</option>
                                    <!--on change valor da classe -> inicio loop (value recebe id da habilidade) -->
                                    <option value="1">Nome equipamento 1</option>
                                    <option value="2">Nome equipamento 2</option>
                                    <option value="3">Nome equipamento 3</option>
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
                                    <select name="armas[]" onchange="armaValueChange(this)" class="custom-select ola">
                                        <option selected>Escolha...</option>
                                        <!--on change valor da classe -> inicio loop (value recebe id da habilidade) -->
                                        <option value="1">Nome arma 1</option>
                                        <option value="2">Nome arma 2</option>
                                        <option value="3">Nome arma 3</option>
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
                                    <select name="armaduras[]" onchange="" class="custom-select">
                                        <option selected>Escolha...</option>
                                        <!--on change valor da classe -> inicio loop (value recebe id da habilidade) -->
                                        <option value="1">Nome armadura 1</option>
                                        <option value="2">Nome armadura 2</option>
                                        <option value="3">Nome armadura 3</option>
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
                            <th>Tipo</th>
                            <th>Mana</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <select name="habilidades[]" class="custom-select">
                                    <option selected>Escolha...</option>
                                    <!--on change valor da classe -> inicio loop (value recebe id da habilidade) -->
                                    <option value="1">Nome habilidade 1</option>
                                    <option value="2">Nome habilidade 2</option>
                                    <option value="3">Nome habilidade 3</option>
                                    <!-- fim loop -->
                                </select>
                            </td>
                            <td style="width: 50%">
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab consequatur culpa dolorem eaque est eum facilis itaque laudantium magnam modi molestias odio perspiciatis quae, sequi unde, voluptas, voluptates. Aliquid, consequuntur!</span>
                            </td>
                            <td>
                                <span>Ativa</span>
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
        $(obj).parent().next().find("span").load("php/armaSelectValue.php", {iden: obj.value});
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