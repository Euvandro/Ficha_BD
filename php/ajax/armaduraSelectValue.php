<?php
include '../db.php';


$iden = $_POST['iden'];

$mysqli = "SELECT defesa FROM armadura WHERE id_equipamento='$iden'";
$result = mysqli_query($conn,$mysqli);

while($row = mysqli_fetch_assoc($result)){
    echo $row['defesa'];
}

mysqli_close($conn);
