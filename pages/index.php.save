<!DOCTYPE html>
<html lang="en">

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

        <!-- Timeline CSS -->
        <link href="../dist/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

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
                                <a href="forms.php"><i class="fa fa-edit fa-fw"></i> Remover Dispositivos</a>
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
                    <!--sistema-->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-linux fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div> <?php
                                            $nomeSistema = "lsb_release -a| awk '{print $2}'| grep -n ^ | grep ^2: | cut -d: -f2";
                                            $versaoSistema = "lsb_release -a| awk '{print $2}'| grep -n ^ | grep ^3: | cut -d: -f2";
                                            $arquiteturaSistema = "uname -m";

                                            echo "Sistema   " . '<br>';
                                            echo "Nome: " . exec($nomeSistema) . '<br>';
                                            echo "Versão: " . exec($versaoSistema) . '<br>';
                                            echo "Arquitetura: " . exec($arquiteturaSistema) . '<br>';
                                            ?></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--memória-->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-oil fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div> <?php
                                            $memoryTotal = " ";
                                            $memoryUsed = "free -m | tr -s ' ' | sed '/^Mem/!d' | cut -d" . '" " -f3';
                                            $memoryFree = "free -m | tr -s ' ' | sed '/^Mem/!d' | cut -d" . '" " -f4';

                                            echo "MEMÓRIA    " . '<br>';
                                            echo "Total: " . exec($memoryTotal) . " MB " . '<br>';
                                            echo "Usada: " . exec($memoryUsed) . " MB " . '<br>';
                                            echo "Livre: " . exec($memoryFree) . " MB " . '<br>';
                                            ?></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--HD partição / -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-hdd fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div> <?php
                                            $used = "df -kh  | grep -n ^ | grep ^2: | cut -d: -f2 | awk '{print $3}'";
                                            $total = "df -kh  | grep -n ^ | grep ^2: | cut -d: -f2 | awk '{print $2}'";
                                            $free = "df -kh  | grep -n ^ | grep ^2: | cut -d: -f2 | awk '{print $4}'";

                                            echo "Particão \     " . '<br>';
                                            echo "Total: " . exec($total) . '<br>';
                                            echo "Usado: " . exec($used) . '<br>';
                                            echo "Livre: " . exec($free) . '<br>';
                                            ?></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--HD partição home-->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-hdd fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div> <?php
                                            $hdUsed = "df -h . | awk '{print $3}'";
                                            $hdTotal = "df -h . | awk '{print $2}'";
                                            $hdFree = "df -h . | awk '{print $4}'";

                                            echo "Particão \home     " . '<br>';
                                            echo "Total: " . exec($hdTotal) . '<br>';
                                            echo "Usado: " . exec($hdUsed) . '<br>';
                                            echo "Livre: " . exec($hdFree) . '<br>';
                                            ?></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">

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

        <!-- Morris Charts JavaScript -->
        <script src="../bower_components/raphael/raphael-min.js"></script>
        <script src="../bower_components/morrisjs/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>

    </body>

</html>

