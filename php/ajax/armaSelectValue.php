<?php
include '../db.php';


    $iden = $_POST['iden'];

    $mysqli = "SELECT dano FROM arma WHERE id_equipamento='$iden'";
    $result = mysqli_query($conn,$mysqli);

    while($row = mysqli_fetch_assoc($result)){
        echo $row['dano'];
    }

    mysqli_close($conn);
