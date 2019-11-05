<?php
include 'db.php';

$nome = $_POST['nome'];
$data_nasc = $_POST['data-nasc'];
$sexo = $_POST['sexo'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];

//Usando metodo bcrypt para criptografar senha
$senha = crypt($_POST['senha']);
$custo = '06';
$salt = 'P0kopLePAnI8hMi8j0FIo9';
$senha_cript = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');


$mysqli = "INSERT INTO usuario(nome, data_nascimento, sexo, usuario, email, senha) VALUES ('$nome', '$data_nasc', '$sexo', '$usuario', '$email', '$senha_cript')";
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
    window.location.href='../registrar.html';
    </script>");
};

