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
    $id_ficha = $_POST['id_ficha'];

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

    mysqli_query($conn, "UPDATE status, ficha, atributos SET vida='$vida', mana_status='$mana', nivel='$nivel', experiencia='$xp', gold='$gold', def_bloqueio='$bloqueio', def_esquiva='$esquiva', def_determinacao='$determinacao', carga_basica='$carga_basica', carga_pesada='$carga_pesada', carga_maxima='$carga_maxima', motivacao='$motivacao', forca='$forca', agilidade='$agilidade', inteligencia='$inteligencia', vontade='$vontade' WHERE id_ficha='$id_ficha' and ficha.id_status = status.id_status and ficha.id_atributos = atributos.id_atributos");

    mysqli_query($conn,"DELETE FROM ficha_equipamento WHERE id_ficha='$id_ficha'");
    foreach($equipamentos as $e){
        mysqli_query($conn, "INSERT INTO ficha_equipamento(id_ficha, id_equipamento) VALUES('$id_ficha', '$e')");
    }
    mysqli_query($conn, "DELETE FROM habilidade_ficha WHERE id_ficha='$id_ficha'");
    foreach($habilidades as $h){
        mysqli_query($conn, "INSERT INTO habilidade_ficha(id_habilidade, id_ficha) VALUES('$h', '$id_ficha')");
    }

    if(mysqli_commit($conn)){
        mysqli_close($conn);
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Ficha atualizada!');
        window.location.href='../menu.php';
        </script>");
    }
}catch (Exception $e){
    mysqli_rollback($conn);
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Ocorreu algum erro');
    window.location.href='../menu.php';
    </script>");
}

