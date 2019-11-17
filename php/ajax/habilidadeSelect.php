<?php
include '../db.php';


$raca = $_POST['raca'];
$classe = $_POST['classe'];

$mysqliClasse = "SELECT h.id_habilidade, h.nome FROM habilidade as h, habilidade_classe as hc WHERE h.id_habilidade=hc.id_habilidade and hc.id_classe='$classe'";
$resultClasse = mysqli_query($conn,$mysqliClasse);
$linhaClasse = mysqli_fetch_assoc($resultClasse);

$mysqliRaca = "SELECT h.id_habilidade, h.nome FROM habilidade as h, habilidade_raca as hr WHERE h.id_habilidade=hr.id_habilidade and hr.id_raca='$raca'";
$resultRaca = mysqli_query($conn,$mysqliRaca);
$linhaRaca = mysqli_fetch_assoc($resultRaca);

if(mysqli_num_rows($resultRaca)>0){
    do{
        echo '<option value="'.$linhaRaca['id_habilidade'].'">'.$linhaRaca['nome'].'</option> ';
    }while($linhaRaca = mysqli_fetch_assoc($resultRaca));
}

if(mysqli_num_rows($resultClasse)>0){
    do{
        echo '<option value="'.$linhaClasse['id_habilidade'].'">'.$linhaClasse['nome'].'</option> ';
    }while($linhaClasse = mysqli_fetch_assoc($resultClasse));
}
mysqli_close($conn);