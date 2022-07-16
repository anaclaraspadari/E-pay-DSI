
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
                                    <th value="data_transacao" scope="col">Data</th>
                                    <th value="descricao" scope="col">Descrição</th>
                                    <th value="valor" scope="col">Valor</th>
                                    <th value="observacao" scope="col">Observação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($transacoes_extrato as $transacao_extrato){
                                        echo '<tr>';
                                        echo '<td>'.$transacao_extrato->data_transacao.'</td>';
                                        echo '<td>'.$transacao_extrato->descricao.'</td>';
                                        echo '<td>'.$transacao_extrato->valor.'</td>';
                                        echo '<td>'.$transacao_extrato->observacao.'</td>';
                                        echo '<tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
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