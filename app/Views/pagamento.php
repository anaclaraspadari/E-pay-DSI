<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-pay - Pagamento</title>
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="container-fluid justify-content-center">
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container justify-content-center">
                <ul class="nav navbar-nav flex-fill justify-content-center">
                    <li class="nav-item"><a class="navbar-brand text-light" href="#">E-Pay - Pagamentos Bancários</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container" style="margin-top: 50px">
        <center><h1 style="color: green">Escolha sua Forma de Pagamento</h1></center>
        <form action="#" id="form_resgate" class="form" method="post">
            <div class="form-group" style="margin-top: 50px;">
                <label for="valor_resgate" style="color: green; margin-left: 305px"><b>Valor a ser Resgatado (R$):</b></label>
                <input type="text" name="valorresgate" id="valor_resgate" class="form-control" style="max-width: 500px; margin-left: 305px">
            </div>
        </form> 
    </div>
    <div id="pagamento">
        <div class="container">
            <div id="pagamento-row" class="row justify-content-center align-items-center">
                <div id="pagamento-column" class="col-md-6">
                    <div id="pagamento-box" class="col-md-12">
                        <div class="card border-success mb-3" style="width: 13rem;margin-top: 30px;margin-left:300px">
                            <div class="card-body">
                                <center><h5 class="card-title">PIX</h5></center>
                                <center><a href="#" class="btn btn-success">Escolher</a></center>
                            </div>
                        </div>
                        <div class="card border-success mb-3" style="width: 13rem;margin-top: 30px;margin-left:300px">
                            <div class="card-body">
                                <center><h5 class="card-title">Débito</h5></center>
                                <center><a href="#" class="btn btn-success">Escolher</a></center>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pagamento-column" class="col-md-6">
                    <div id="pagamento-box" class="col-md-12">
                        <div class="card border-success mb-3" style="width: 13rem;margin-top: 30px">
                            <div class="card-body">
                                <center><h5 class="card-title">Boleto</h5></center>
                                <center><a href="#" class="btn btn-success">Escolher</a></center>
                            </div>
                        </div>
                        <div class="card border-success mb-3" style="width: 13rem;margin-top: 30px">
                            <div class="card-body">
                                <center><h5 class="card-title">Crédito</h5></center>
                                <center><a href="#" class="btn btn-success">Escolher</a></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>