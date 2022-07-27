<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">



        <title>Centro Net</title>

        <!-- Bootstrap Core CSS -->
        <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


        <script type="text/javascript">
            function swapImage() {
                var image = document.getElementById("imageToSwap");
                var dropd = document.getElementById("dlist");
                image.src = dropd.value;
            }
            ;
        </script>
    </head>

    <body>
        <?php
        session_start();
        if ((!isset($_SESSION['USUARIO']) == true) and ( !isset($_SESSION['SENHA']) == true)) {
            unset($_SESSION['USUARIO']);
            unset($_SESSION['SENHA']);
            header('location: login.php');
        }

        $logado = $_SESSION['USUARIO'];
        ?>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"> Centro Net - <?php echo exec('date "+%d/%m/%Y"'); ?></a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">


                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="../index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <li>
                                <a href="tables.php"><i class="fa fa-table fa-fw"></i> Listar Dispositivos</a>
                            </li>
                            <li>
                                <a href="forms.php"><i class="fa fa-edit fa-fw"></i> Adicionar Dispositivos</a>
                            </li>
                            <li>
                                <a href="delete.php"><i class="fa fa-edit fa-fw"></i> Remover Dispositivos</a>
                            </li>




                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Centro Net</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Adicionar dispositivos
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" action="../submit.php" method="post" >
                                            <div class="form-group">
                                                <label>Nome do Dispositivo</label>
                                                <input class="form-control" type="text" placeholder="Exemplo: rb torre 'x'" name="var1">
                                                <!--<p class="help-block">Examplo: rb torre 'x'.</p>-->
                                            </div>
                                            <div class="form-group">
                                                <label>Endereço IP</label>
                                                <input class="form-control" placeholder="xx.xx.xx.xx" type="text" name="var2">
                                            </div>
                                            <div class="form-group">
                                                <label>Localização do Dispositivo</label>
                                                <input class="form-control" placeholder="Exemplo: sala XYZ" type="text" name="var3">
                                            </div>
                                            <div class="form-group">
                                                 <label>dependente ou ligação</label>
                                                 <br>
                                                 <select  <select class="form-control"  name="var4" >
                                                 <option selected disabled class="hideoption">Selecione uma ligação</option>
                                                 <option  value="    ">default</option>
                                                     <?php
                                                     $dispositivo = file('../router.cfg');

                                                     $qtd = count($dispositivo); //conta o numero de linhas

                                                     $inicio = 1;
                                                     $i = $inicio;
                                                     $id = 1;


                                                     while ($i < $qtd) {
                                                         echo '<option value="' . substr(serialize($dispositivo[$i + 1]), 25, -3) . '">' . substr(serialize($dispositivo[$i + 4]), 25, -3) . '</option>';
                                                         $i = $i + 16;
                                                         $id = $i;
                                                     }
                                                     ?> 
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Imagem do Dispositivo</label>
                                                <img id="imageToSwap"  />
                                                <select class="form-control" id="dlist" onChange="swapImage()" name="var5" >
                                                    <option selected disabled class="hideoption">Selecione uma imagem</option>                                                    
                                                    <option  value="../logos/workstation.gif">workstation</option>
                                                    <option  value="../logos/notebook.gif">notebook</option>
                                                    <option  value="../logos/desktop-server.gif">desktop-server</option>
                                                    <option  value="../logos/wifi.gif">wifi</option>                                                    
                                                    <option  value="../logos/switch.gif">switch</option>
                                                    <option  value="../logos/sunlogo.gif">sun</option>
                                                    <option  value="../logos/slackware.gif">slackware</option>
                                                    <option  value="../logos/router.gif">router</option>
                                                    <option  value="../logos/redhat.gif">redhat</option>
                                                    <option  value="../logos/mac40.gif">mac</option>
                                                    <option  value="../logos/linux40.gif">linux</option>
                                                    <option  value="../logos/win40.gif">win40</option>
                                                    <option  value="../logos/freebsd40.gif">freebsd</option>
                                                    <option  value="../logos/hub.gif">hub</option>
                                                    <option  value="../logos/hp-printer40.gif">printer</option>
                                                    <option  value="../logos/firewall.gif">firewall</option>
                                                    <option  value="../logos/debian.gif">debian</option>
                                                    <option  value="../logos/database.gif">data base</option>
                                                    <option  value="../logos/unknown.gif">unknown</option>

                                                </select>

                                            </div>
                                            <div class="form-group">
                                                 <button type="submit" class="btn btn-success" value="salvar" >
                                                 <span class=" fa fa-floppy-o"> Salvar</span>
                                                </button>
                                                <button type="reset" class="btn btn-danger" value="cancelar">
                                                    <span class="glyphicon glyphicon-remove"> Cancelar</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>

    </body>

</html>


