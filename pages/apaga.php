<?php

include_once '../Dispositivo.class.php';

$inicio = $_POST['linha'];

if ($inicio == TRUE){
$arr = file('../router.cfg'); // Lê todo o arquivo para um vetor 

for ($i = $inicio -1 ; $i < $inicio + 15; $i++) {
    unset($arr[$i]);
}
file_put_contents('../router.cfg', $arr);

$restart = new Dispositivo();
$restart->restarService();

header('location: delete.php');
}
else{
    header('location: login.php');
}
?>
