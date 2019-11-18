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
try {

    $id_ficha = $_POST['id_ficha'];

    mysqli_query($conn, "DELETE FROM ficha_equipamento WHERE id_ficha='$id_ficha'");
    mysqli_query($conn, "DELETE FROM habilidade_ficha WHERE id_ficha='$id_ficha'");

    mysqli_query($conn, "DELETE s,f,a FROM status as s INNER JOIN ficha as f on f.id_status=s.id_status and f.id_ficha='$id_ficha' INNER JOIN atributos as a WHERE a.id_atributos=f.id_atributos and f.id_ficha='$id_ficha'");

    mysqli_commit($conn);
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Ficha deletada!');
    window.location.href='../menu.php';
    </script>");
}catch (Exception $e){
    mysqli_rollback($conn);
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Ocorreu algum erro');
    window.location.href='../menu.php';
    </script>");
}