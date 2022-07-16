
    <div class="container" style="margin-top: 50px">
        <center><h1 style="color: green">E-pay - Resgate</h1></center>
    </div>
    <div id="resgate">
        <div class="container">
            <div id="resgate-row" class="row justify-content-center align-items-center">
                <div id="resgate-column" class="col-md-6">
                    <div id="resgate-box" class="col-md-12" style="margin-top: 30px;">
                        <form action="<?php echo base_url('processaNovoResgate');?>" id="form_resgate" class="form" method="post">
                            <div class="form-group" style="margin-top: 50px;">
                                <label for="valorresgate" style="color: green"><b>Valor a ser Resgatado (R$):</b></label>
                                <input type="text" name="valorresgate" id="valor_resgate" class="form-control">
                                <center><input type="submit" name="submit" class="btn btn-success btn-md" style="margin-top: 20px;" value="Enviar"></center>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-sm-6">
                              <div class="card text-white bg-success mb-3"  style="margin-top: 40px;">
                                <div class="card-header">
                                    <h5 class="card-title">Saldo da conta</h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">R$ <?php echo number_format($saldo_final, 2, ',', '.'); ?></p>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="card text-white bg-success mb-3"  style="margin-top: 40px;">
                                <div class="card-header">
                                    <h5 class="card-title">Saldo da Poupança</h5>
                                </div>
                                <div class="card-body">
                                  <p class="card-text">R$ <?php echo number_format($saldo_poupanca, 2, ',', '.'); ?></p>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6" style="margin-top: 20px; margin-left:130px">
                              <center><a href="<?php echo base_url('menu');?>" role="button" class="btn btn-sm btn-success">Voltar ao Menu</a></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>