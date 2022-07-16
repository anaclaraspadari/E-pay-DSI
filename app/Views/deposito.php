
    <div class="container" style="margin-top: 20px">
        <center><h3 style="color: green">Depósito de Dinheiro na Conta</h3></center>
    </div>
    <div id="deposito">
        <div class="container">
            <div id="deposito-row" class="row justify-content-center align-items-center">
                <div id="deposito-column" class="col-md-6">
                    <div id="deposito-box" class="col-md-12">
                        <form id="deposito-form" class="form" action="<?php echo base_url()?>/processaNovoDeposito" method="post">
                            <div class="form-group" style="margin-top: 30px;">
                                <label for="valordeposito" style="color: green">Valor a depositar na conta(R$):</label><br>
                                <input type="text" name="valordeposito" id="valordeposito" class="form-control">
                            </div>
                            <div class="form-group" style="margin-top: 30px;">
                                <label for="obsdeposito" style="color: green">Observação (Opcional):</label><br>
                                <input type="text" name="obsdeposito" id="obsdeposito" class="form-control">
                            </div>
                            <div class="form-group">
                                <center><input type="submit" name="submit" class="btn btn-success btn-md" style="margin-top: 10px;" value="Depositar"></center>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6" style="margin-top: 20px; margin-left:3px">
                    <center><a href="<?php echo base_url('menu');?>" role="button" class="btn btn-sm btn-success">Voltar ao Menu</a></center>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
    
