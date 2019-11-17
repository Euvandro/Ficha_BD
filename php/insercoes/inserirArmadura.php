<?php
include '../db.php';

$nome = $_POST['nome'];
$defesa = $_POST['defesa'];

mysqli_autocommit($conn, FALSE);


mysqli_query($conn, "INSERT INTO equipamento(nome) VALUES ('$nome')");
mysqli_query($conn, "INSERT INTO armadura(defesa, id_equipamento) VALUES('$defesa', LAST_INSERT_ID())");


if(mysqli_commit($conn)){
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Item cadastrado com sucesso!');
    window.location.href='../../armaduras.php';
    </script>");
}else{
    mysqli_rollback($conn);
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Erro ao cadastrar item');
    window.location.href='../../menu.php';
    </script>");
}