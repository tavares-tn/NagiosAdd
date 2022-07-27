<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//header('location: login.php');

class Dispositivo {

    private $ip;
    private $device;
    private $local;
    private $parents;
    private $img;

    function __construct($device, $ip, $local, $parents, $img) {
        $this->ip = $ip;
        $this->device = $device;
        $this->img = $img;
        $this->local = $local;
        $this->parents = $parents;
    }

    function addDevice() {



        session_start();
        if ((!isset($_SESSION['USUARIO']) == true) and ( !isset($_SESSION['SENHA']) == true)) {
            unset($_SESSION['USUARIO']);
            unset($_SESSION['SENHA']);
            header('location: login.php');
        }

        $logado = $_SESSION['USUARIO'];


        $texto = "define host{ \r
 	        use                     generic-host\r	
 	        host_name               ".$this->device."\r
 	        alias                   ".$this->device."\r
 	        address                 ".$this->ip."\r
                notes                   ".$this->local."\r
                parents                 ".$this->parents."\r
 	        check_command           check-host-alive\r
 	        max_check_attempts      20\r
 	        notification_interval   60\r
 	        notification_period     24x7\r
 	        notification_options    d,u,r\r
                #EMAIL                  VAI_MANDAR_EMAIL_AINDA\r
                icon_image              ".$this->img.".gif\r
                statusmap_image         ".$this->img.".gd2\r
 	        }\r\n";



        $fp = fopen("router.cfg", "a");


        $escreve = fwrite($fp, $texto);

        fclose($fp);

//        exec('cp host.cfg /etc/nagios3/objects/host.cfg');
    }

    function restarService() {

        exec('sudo /etc/init.d/nagios3 restart');
    }

    function criaTabela() {

        $dispositivo = file('../router.cfg');

        $qtd = count($dispositivo); //conta o numero de linhas

        $inicio = 1;
        $i = $inicio;
        $id = 1;

        while ($i < $qtd) {

            $tabela = '<tr class = "odd gradeX">

                                                            </td>
                                                            <td>' . substr(serialize($dispositivo[$i + 2]), 21, -3) . "</td>
                                                            <td>" . substr(serialize($dispositivo[$i + 3]), 24, -3) . '</td>
                                                            <td class = "center">' . substr(serialize($dispositivo[$i + 4]), 27, -3) . '</td>
                                                            </tr>';
            $i = $i + 16;
            $id++;


            echo $tabela;
        }
    }

    function deletaDispositivo() {

        $dispositivo = file('../router.cfg');

        $qtd = count($dispositivo); //conta o numero de linhas

        $inicio = 1;
        $i = $inicio;
        $id = 1;

        while ($i < $qtd) {

            $tabela = '<tr class = "odd gradeX">
                                                            <td>
                                                            <form role="form" action="../pages/apaga.php" method="post" > 
                                                            <button type="submit" class="btn btn-danger"  name="linha" value="' . $id . '" >
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                             </button>
                                                             </form>
                                                            </td>
                                                            
                                                            <td>' . substr(serialize($dispositivo[$i + 2]), 21, -3) . "</td>
                                                            <td>" . substr(serialize($dispositivo[$i + 3]), 24, -3) . '</td>
                                                            <td class = "center">' . substr(serialize($dispositivo[$i + 4]), 27, -3) . '</td>
                                                            </tr>';
            $i = $i + 16;
            $id = $i;


            echo $tabela;
        }
    }

}

