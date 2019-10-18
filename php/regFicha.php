<?php
/**
 * Created by PhpStorm.
 * User: Evandro
 * Date: 17/10/2019
 * Time: 16:36
 */

$campo = $_POST['habilidades'];
$forca = $_POST['forca'];
echo "$forca";
foreach($campo as $f){
    echo "$f<br>";
}