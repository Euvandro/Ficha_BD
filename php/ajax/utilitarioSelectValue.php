<?php
include '../db.php';


$iden = $_POST['iden'];

$mysqli = "SELECT valor FROM utilitario WHERE id_equipamento='$iden'";
$result = mysqli_query($conn,$mysqli);

while($row = mysqli_fetch_assoc($result)){
    echo $row['valor'];
}

mysqli_close($conn);
