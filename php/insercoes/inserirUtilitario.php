<?php
include '../db.php';

$nome = $_POST['nome'];
$valor = $_POST['valor'];

mysqli_autocommit($conn, FALSE);


mysqli_query($conn, "INSERT INTO equipamento(nome) VALUES ('$nome')");
mysqli_query($conn, "INSERT INTO utilitario(valor, id_equipamento) VALUES('$valor', LAST_INSERT_ID())");


if(mysqli_commit($conn)){
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Item cadastrado com sucesso!');
    window.location.href='../../utilitarios.php';
    </script>");
}else{
    mysqli_rollback($conn);
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Erro ao cadastrar item');
    window.location.href='../../menu.php';
    </script>");
}