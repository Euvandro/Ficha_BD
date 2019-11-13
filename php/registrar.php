<?php
include 'db.php';

$nome = $_POST['nome'];
$data_nasc = $_POST['data-nasc'];
$sexo = $_POST['sexo'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];

$senha = md5($_POST['senha']);


$mysqli = "INSERT INTO usuario(nome, data_nascimento, sexo, usuario, email, senha) VALUES ('$nome', '$data_nasc', '$sexo', '$usuario', '$email', '$senha')";
if(mysqli_query($conn, $mysqli)){
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Usuario cadastrado com sucesso!');
    window.location.href='../index.html';
    </script>");
}else{
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Usuario ou e-mail ja existentes');
    window.location.href='../index.html';
    </script>");
};

