<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Banco
 *
 * @author tavares
 */
            header('location: login.php');

class Banco {
       
    function conectaBanco($ip, $base, $usuario, $senha) {
       
        
        try {
            $dsn = "mysql:host={$ip};dbname={$base}";
            $this->conexao = new PDO($dsn, $usuario, $senha);
//            echo 'conectado <br/>';
        } catch (Exception $erroConectaBanco) {
            echo $erroConectaBanco->getMessage();
        }
        
    }

    function buscaLogin($usuario, $senha) {

        try {
            $mostra = $this->conexao->query("select * from autentica where USUARIO = '$usuario' and SENHA = '$senha'");

            foreach ($mostra as $coluna) {
                $admin = $coluna['USUARIO'];
            }

            if ($admin == TRUE) {
                $_SESSION['USUARIO'] = $usuario;
                $_SESSION['SENHA'] = $senha;
                header("Location: ../NagiosAdd/pages/index.php");
            } else {
                unset($_SESSION['USUARIO']);
                unset($_SESSION['SENHA']);
                header("Location: loginErro.php");
            }
            
        } catch (Exception $erroMostraDadosBanco) {
            echo 'Erro ! ' . $erroMostraDadosBanco->getMessage();
        }
    }
    
        function fecharConexaoBancoDados() {
        $this->conexao = null;
//        echo 'conexão fechada <br/>';
    }

}
