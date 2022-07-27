<?php

include_once './Banco.class.php';

session_start();

$user = $_POST['login'];
$key = $_POST['password'];


if ($user == FALSE || $key == FALSE) {
    header("Location: loginErro.php");
} else {

    $login = new Banco();
    $login->conectaBanco('177.36.34.84', 'login', 'root', 'aDimInC3ntr0N3t');
    $login->buscaLogin($user, md5($key));
    $login->fecharConexaoBancoDados();
    

}
?>
