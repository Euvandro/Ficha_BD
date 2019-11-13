<?php
include 'db.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$mysqli = "SELECT id_usuario, usuario, email, senha FROM usuario WHERE email = '$email'";
if($result = mysqli_query($conn, $mysqli)){

    $linha = mysqli_fetch_assoc($result);
    $senha_cript = $linha['senha'];

    if (md5($senha)==$senha_cript) {
        mysqli_close($conn);
        session_start();
        $_SESSION['usuario']=$linha['usuario'];
        $_SESSION['id_usuario']=$linha['id_usuario'];
        echo"
";
        header("Location: ../menu.php");
    } else {
        mysqli_close($conn);
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('E-mail ou senha incorretos');
    window.location.href='../index.html';
    </script>");
    }
}else{
    mysqli_close($conn);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Ocorreu um erro na requisicao');
    window.location.href='../registrar.html';
    </script>");
}
/*$linha = mysql_fetch_assoc($mysqli);
$row = mysql_num_rows($sql);


if($row>0){
    session_start();
    $_SESSION['usuario']=$linha['user'];
    $_SESSION['id_user']=$linha['id'];
    echo"
";
    header("Location: ../menu.php");
}else{
    echo"
    <script>
        document.getElementById('loader').onpageshow = alertfunc();
        function alertfunc() {
            alert('Usuario ou senha inválidos!');
        }
        </script>
    ";
    echo"
    <script>
        loginerrado();
    </script>
    ";
}
*/
?>

