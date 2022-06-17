<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-pay - Pagamentos Bancários</title>
</head>
<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <?php 
        if (\Config\Services::validation()->getErrors()){?>
            <div class="alert alert-danger" role="alert">
                <?= \Config\Services::validation()->listErrors();?>
            </div>
        <?php
        }
    ?>
    <?php
        if (session()->get('messageRegisterOk')){?>
            <div class="alert alert-info" role="alert">
                <?php echo "<strong>". session()->getFlashdata('messageRegisterOk')."</strong>"; ?>
            </div>
        <?php
        }
    ?>
    <?php
        if (session()->get('loginFail')){
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo "<strong>". session()->getFlashdata('loginFail')."</strong>"; ?>
            </div>
        <?php
        }
    ?> 

    <div class="container" style="margin-top: 50px">
        <center><h1 style="color: green">E-pay - Pagamentos Bancários</h1></center>
    </div>
    <div class="container" style="margin-top: 20px">
        <center><h3 style="color: green">Login</h3></center>
    </div>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?php echo base_url()?>/sessaoUsuario" method="post">
                            <div class="form-group" style="margin-top: 30px;">
                                <label for="username" style="color: green">Usuário</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group" style="margin-top: 30px;">
                                <label for="senha" style="color: green">Senha:</label><br>
                                <input type="password" name="senha" id="senha" class="form-control">
                            </div>
                            <div id="register-link" style="margin-top: 30px;">
                                <center><a href="<?php echo base_url()?>/registration" style="color: green">Não tem uma conta? Registre-se aqui!</a></center>
                            </div>
                            <div class="form-group">
                                <center><input type="submit" name="submit" class="btn btn-success btn-md" style="margin-top: 10px;" value="Entrar"></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>