<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once './Dispositivo.class.php';

session_start();

if ((!isset($_SESSION['USUARIO']) == true) and ( !isset($_SESSION['SENHA']) == true)) {
    unset($_SESSION['USUARIO']);
    unset($_SESSION['SENHA']);
    header('location: index.html');
}

$logado = $_SESSION['USUARIO'];

$device = $_POST["var1"];
$ip = $_POST["var2"];
$local = $_POST["var3"];
$parents = $_POST["var4"];
$img = $_POST["var5"];

$img = substr($img,9, -4);

if ($device == TRUE && $ip == TRUE && $local == TRUE && $parents == TRUE && $img ==TRUE) {

    $newDecice = new Dispositivo($device, $ip, $local, $parents, $img);
    $newDecice->addDevice();

    $newDecice->restarService();

    header("Location: /NagiosAdd/pages/salvo.php");
} else {
    header('location: /NagiosAdd/pages/formsErro.php');
}
