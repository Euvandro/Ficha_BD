<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

if(!$conn = mysqli_connect($servername, $username, $password, $dbname)){
    echo "Não foi possivel conectar ao bd";
}