<?php
include '../db.php';

$iden = $_POST['iden'];

$mysqli = "SELECT descricao FROM habilidade WHERE id_habilidade='$iden'";
$result = mysqli_query($conn, $mysqli);

while($row = mysqli_fetch_assoc($result)){
    echo $row['descricao'];
}

mysqli_close($conn);

