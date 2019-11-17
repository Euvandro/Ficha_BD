<?php
include '../db.php';

$nome = $_POST['nome'];
$mana = $_POST['mana'];
$descricao = $_POST['descricao'];
$associacao = $_POST['associacao'];

mysqli_autocommit($conn, FALSE);

mysqli_query($conn, "INSERT INTO habilidade(nome, descricao, mana_habilidade) VALUES('$nome', '$descricao', '$mana')");

if($associacao=="classe"){
    $idAssociado = $_POST['classe'];
    mysqli_query($conn, "INSERT INTO habilidade_classe(id_habilidade, id_classe) VALUES(LAST_INSERT_ID(), '$idAssociado')");
}else{
    $idAssociado = $_POST['raca'];
    mysqli_query($conn, "INSERT INTO habilidade_raca(id_habilidade, id_raca) VALUES(LAST_INSERT_ID(), '$idAssociado')");
}

if(mysqli_commit($conn)){
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Item cadastrado com sucesso!');
    window.location.href='../../habilidades.php';
    </script>");
}else{
    mysqli_rollback($conn);
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Erro ao cadastrar item');
    window.location.href='../../menu.php';
    </script>");
}
