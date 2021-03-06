<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-pay - Cadastro</title>
</head>
<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <div class="container" style="margin-top: 50px">
        <center><h1 style="color: green">E-pay - Pagamentos Bancários</h1></center>
    </div>
    <div class="container" style="margin-top: 20px">
        <center><h3 style="color: green">Cadastro de Usuário</h3></center>
    </div>
    <div id="cadastro">
        <div class="container">
            <div id="cadastro-row" class="row justify-content-center align-items-center">
                <div id="cadastro-column" class="col-md-6">
                    <div id="cadastro-box" class="col-md-12">
                        <form id="cadastro-form" class="form" action="<?php echo base_url()?>/processaNovoUsuario" method="post">
                            <div class="form-group" style="margin-top: 30px;">
                                <label for="nome" style="color: green">Nome Completo:</label><br>
                                <input type="text" name="nome" id="nome" class="form-control">
                            </div>
                            <div class="form-group" style="margin-top: 30px;">
                                <label for="username" style="color: green">Usuário:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group" style="margin-top: 30px;">
                                <label for="senha" style="color: green">Senha:</label><br>
                                <input type="password" name="senha" id="senha" class="form-control">
                            </div>
                            <div class="form-group" style="margin-top: 30px;">
                                <label for="saldo" style="color: green">Saldo Inicial(R$):</label><br>
                                <input type="text" name="saldo" id="saldo" class="form-control">
                            </div>
                            <div class="form-group">
                                <center><input type="submit" name="submit" class="btn btn-success btn-md" style="margin-top: 10px;" value="Cadastrar"></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
    
