<?php
include 'db.php';


    $iden = $_POST['iden'];

    $mysqli = "SELECT dano FROM armas WHERE id='$iden'";
    $result = mysqli_query($conn,$mysqli);

    while($row = mysqli_fetch_assoc($result)){
        echo $row['dano'];
    }
