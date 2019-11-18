<?php
include 'db.php';

session_start();
$id_usuario = $_SESSION['id_usuario'];
$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
    header("Location: index.html");
    exit;
}
mysqli_autocommit($conn, FALSE);

try{
    $imagem = $_POST['imagem'];
    $nome = $_POST['nome'];
    $raca = $_POST['raca'];
    $classe = $_POST['classe'];

    $forca = $_POST['forca'];
    $agilidade = $_POST['agilidade'];
    $inteligencia = $_POST['inteligencia'];
    $vontade = $_POST['vontade'];

    $nivel = $_POST['nivel'];
    $motivacao = $_POST['motivacao'];

    $xp = $_POST['xp'];
    $gold = $_POST['gold'];

    $bloqueio = $_POST['bloqueio'];
    $esquiva = $_POST['esquiva'];
    $determinacao = $_POST['determinacao'];

    $carga_basica = $_POST['carga_basica'];
    $carga_pesada = $_POST['carga_pesada'];
    $carga_maxima = $_POST['carga_maxima'];

    $vida = $_POST['vida'];
    $mana = $_POST['mana'];

    $equipamentos = $_POST['equipamentos'];
    $habilidades = $_POST['habilidades'];

    mysqli_query($conn, "INSERT INTO status(vida, mana_status, nivel, experiencia, gold, def_bloqueio, def_esquiva, def_determinacao, carga_basica, carga_pesada, carga_maxima)
VALUES ('$vida','$mana', '$nivel', '$xp', '$gold', '$bloqueio', '$esquiva', '$determinacao', '$carga_basica', '$carga_pesada', '$carga_maxima')");
    $id_status = mysqli_insert_id($conn);

    mysqli_query($conn, "INSERT INTO atributos(forca, agilidade, inteligencia, vontade) VALUES('$forca', '$agilidade', '$inteligencia', '$vontade')");
    $id_atributos = mysqli_insert_id($conn);

    mysqli_query($conn, "INSERT INTO ficha(nome, imagem, id_raca, id_classe, id_usuario, id_status, id_atributos, motivacao)
VALUES('$nome', '$imagem', '$raca', '$classe', '$id_usuario', '$id_status', '$id_atributos', '$motivacao')");
    $id_ficha = mysqli_insert_id($conn);

    foreach($habilidades as $h){
        mysqli_query($conn, "INSERT INTO habilidade_ficha(id_habilidade, id_ficha) VALUES('$h', '$id_ficha')");
    }
    foreach($equipamentos as $e){
        mysqli_query($conn, "INSERT INTO ficha_equipamento(id_ficha, id_equipamento) VALUES('$id_ficha', '$e')");
    }


    if(mysqli_commit($conn)){
        mysqli_close($conn);
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Item cadastrado com sucesso!');
        window.location.href='../menu.php';
        </script>");
    }
}catch (Exception $e){
    mysqli_rollback($conn);
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Erro ao cadastrar item');
    window.location.href='../menu.php';
    </script>");
}

