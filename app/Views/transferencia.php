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
        <center><h1 style="color: green">E-pay - Transferência</h1></center>
    </div>
    <div id="transferencia">
        <div class="container">
            <div id="transferencia-row" class="row justify-content-center align-items-center">
                <div id="transferencia-column" class="col-md-6">
                    <div id="transferencia-box" class="col-md-12" style="margin-top: 40px;">
                        <form action="<?php echo base_url('processaNovaTransferencia');?>" id="form_transferencia" class="form" method="post">
                            <div class="form-group">
                                <label for="contatransferencia">Número da Conta:</label>
                                <input type="text" name="contatransferencia" id="contatransferencia" class="form-control">
                            </div>
                            <div class="form-group" style="margin-top: 30px;">
                                <label for="valortransferencia">Valor a ser Transferido (R$):</label>
                                <input type="text" name="valortransferencia" id="valortransferencia" class="form-control">
                            </div>
                            <div class="form-group" style="margin-top: 30px;">
                                <label for="obstransferencia">Observação (Opcional):</label>
                                <input type="text" name="obstransferencia" id="obstransferencia" class="form-control">
                            </div>
                            <div class="form-group" style="margin-top: 30px;">
                                <center><input type="submit" name="submit" class="btn btn-success btn-md" style="margin-top: 10px;" value="Enviar"></center>
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