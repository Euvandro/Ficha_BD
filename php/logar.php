<?php
include 'db.php';

$email = $_POST['email'];
$senha_digitada = $_POST['senha'];

$mysqli = "SELECT * FROM usuario WHERE email = '$email'";
if($result = mysqli_query($conn, $mysqli)){
    $linha = mysqli_fetch_assoc($result);

    $senha_guardada = $linha['senha'];
    echo "Senha digitada: ".$senha_digitada
        ."<br>Senha no banco: ".$senha_guardada;

    if(crypt($senha_digitada, $senha_guardada) === $senha_guardada){
        echo "Senha confere";
    }else{
        echo "Senha nao confere";
    }
}
/*$linha = mysql_fetch_assoc($mysqli);
$row = mysql_num_rows($sql);


if($row>0){
    session_start();
    $_SESSION['usuario']=$linha['user'];
    $_SESSION['senha']=$linha['password'];
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

