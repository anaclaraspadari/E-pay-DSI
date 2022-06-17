<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-pay - Extrato</title>
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
        <center><h1 style="color: green">E-pay - Extrato da Conta</h1></center>
    </div>
    <div id="extrato">
        <div class="container">
            <div id="extrato-row" class="row justify-content-center align-items-center">
                <div id="extrato-column" class="col-md-6">
                    <div id="extrato-box" class="col-md-12">
                        <table class="table" id="extrato" style="margin-top: 30px;">
                            <thead>
                                <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Saldo</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>