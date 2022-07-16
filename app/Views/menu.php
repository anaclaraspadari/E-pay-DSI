<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Pay - Home</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .navbar-custom{
            min-height: 40px;
            padding-right: 20px;
            padding-left: 20px;
            background-color: #fafafa;
            background-image: -moz-linear-gradient(top,#fff,#f2f2f2);
            background-image: -webkit-gradient(linear,0 0,0 100%,from(#fff),to(#f2f2f2));
            background-image: -webkit-linear-gradient(top,#fff,#f2f2f2);
            background-image: -o-linear-gradient(top,#fff,#f2f2f2);
            background-image: linear-gradient(to bottom,#3DB536,#111);
            background-repeat: repeat-x;
            border: 1px solid #d4d4d4;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffffff',endColorstr='#fff2f2f2',GradientType=0);
            *zoom: 1;
            -webkit-box-shadow: 0 1px 4px rgba(0,0,0,0.065);
            -moz-box-shadow: 0 1px 4px rgba(0,0,0,0.065);
            box-shadow: 0 1px 4px rgba(0,0,0,0.065);
        }
    </style>
</head>
<body>
    <div class="container-fluid justify-content-around">
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container justify-content-around">
                <ul class="nav navbar-nav flex-fill justify-content-around"> 
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Olá, <?php echo session()->get('nome')?></a>
                    </li>
                    <li class="nav-item"><a class="navbar-brand text-light" href="#">E-Pay - Pagamentos Bancários</a></li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?php echo base_url('logoutSessaoUsuario');?>">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <?php
        if (session()->get('messageRegisterOk')){
            ?>
            <div class="alert alert-success" role="alert">
                <?php echo `<strong>`. session()->getFlashdata('messageRegisterOk')."</strong>"; ?>
            </div>
        <?php
        }
    ?>
    <?php
        if (session()->get('operacaoFail')){
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo `<strong>`. session()->getFlashdata('operacaoFail')."</strong>"; ?>
            </div>
        <?php
        }
    ?>
    <div class="container" style="margin-top: 50px">
        <div class="card text-white bg-success mb-3" style="margin-top: 40px; margin-right: 200px; margin-left: 200px;">
            <div class="card-header">
                <h4><b>Saldo da conta nº<?php echo session()->get('conta')->numero_conta?>:</b></h4>
            </div>
            <div class="card-body">
                <h1 class="card-title" style="margin-left:40px">R$ <?php echo number_format($saldo_final, 2, ',', '.'); ?></h1>
            </div>
        </div>
    </div>
    <div id="menu">
        <div class="container">
            <div id="menu-row" class="row">
                <div id="menu-column" class="col-md-6">
                    <div id="menu-box" class="col-md-12">
                        <div class="card border-success mb-3" style="width: 13rem;margin-top: 30px;margin-left:300px">
                            <div class="card-body">
                                <center><h5 class="card-title">Extrato</h5></center>
                                <center><a href="<?php echo base_url('extrato');?>" class="btn btn-success">Escolher</a></center>
                            </div>
                        </div>
                        <div class="card border-success mb-3" style="width: 13rem;margin-top: 30px;margin-left:300px">
                            <div class="card-body">
                                <center><h5 class="card-title">Pagamento</h5></center>
                                <center><a href="<?php echo base_url('pagamento');?>" class="btn btn-success">Escolher</a></center>
                            </div>
                        </div>
                        <div class="card border-success mb-3" style="width: 30rem;margin-top: 30px;margin-left:300px">
                            <div class="card-body">
                                <center><h5 class="card-title">Depósito</h5></center>
                                <center><a href="<?php echo base_url('deposito');?>" class="btn btn-success">Escolher</a></center>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu-column" class="col-md-6">
                    <div id="menu-box" class="col-md-12">
                        <div class="card border-success mb-3" style="width: 13rem;margin-top: 30px">
                            <div class="card-body">
                                <center><h5 class="card-title">Poupança</h5></center>
                                <center><a href="<?php echo base_url('poupanca');?>" class="btn btn-success">Escolher</a></center>
                            </div>
                        </div>
                        <div class="card border-success mb-3" style="width: 13rem;margin-top: 30px">
                            <div class="card-body">
                                <center><h5 class="card-title">Transferência</h5></center>
                                <center><a href="<?php echo base_url('transferencia');?>" class="btn btn-success">Escolher</a></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>