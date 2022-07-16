
    <div class="container" style="margin-top: 50px">
        <center><h1 style="color: green">E-pay - Aplicação</h1></center>
    </div>
    <div id="aplicacao">
        <div class="container">
            <div id="aplicacao-row" class="row justify-content-center align-items-center">
                <div id="aplicacao-column" class="col-md-6">
                    <div id="aplicacao-box" class="col-md-12" style="margin-top: 30px;">
                        <form action="<?php echo base_url('processaNovaAplicacao');?>" id="form_aplicacao" class="form" method="post">
                            <div class="form-group" style="margin-top: 30px;">
                                <label for="valoraplicacao" style="color: green"><b>Valor a ser Aplicado (R$):</b></label>
                                <input type="text" name="valoraplicacao" id="valor_aplicacao" class="form-control">
                                <center><input type="submit" name="submit" class="btn btn-success btn-md" style="margin-top: 20px;" value="Enviar"></center>
                            </div>
                            <div class="form-group" style="margin-top: 30px;">
                            </div>
                        </form>
                        <div class="container" style="margin-top: 30px">
                            <div class="card text-white bg-success mb-3" style="margin-top: 30px; ">
                                <div class="card-header">
                                    <h6><b>Saldo da conta:</b></h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-text" style="margin-left:10px">R$ <?php echo number_format($saldo_final, 2, ',', '.'); ?></h4>
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
</body>
</html>