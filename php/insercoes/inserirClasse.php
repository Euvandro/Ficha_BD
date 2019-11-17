<?php
include '../db.php';

$nome = $_POST['nome'];

mysqli_autocommit($conn, FALSE);


mysqli_query($conn, "INSERT INTO classe(nome) VALUES ('$nome')");

if(mysqli_commit($conn)){
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Item cadastrado com sucesso!');
    window.location.href='../../classes.php';
    </script>");
}else{
    mysqli_rollback($conn);
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Erro ao cadastrar item');
    window.location.href='../../menu.php';
    </script>");
}