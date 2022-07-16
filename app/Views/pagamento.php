
    <div class="container" style="margin-top: 50px">
        <center><h1 style="color: green">Escolha sua Forma de Pagamento</h1></center>
        <form action="<?php echo base_url()?>/processaNovoPagamento" id="form_pagamento" class="form" method="post">
            <div class="form-group" style="margin-top: 50px;">
                <label for="valor_pagamento" style="color: green; margin-left: 305px"><b>Valor a ser Pago (R$):</b></label>
                <input type="text" name="valorpagamento" id="valor_pagamento" class="form-control" style="max-width: 500px; margin-left: 305px">
            </div>
            <div class="form-group">
                <label for="tipopagamentos" style="color: green; margin-left: 305px"><b>Opções de Pagamento:</b></label>
                <select class="form-control" name="tipopagamentos" id="tipopagamentos" style="max-width: 500px; margin-left: 305px">
                    <!-- <option value='1'>Pix</option> -->
                    <?php
                        foreach($tipopagamentos as $tipopagamento){
                            echo '<option value='.$tipopagamento['cod_operacao'].'>'.$tipopagamento['nome'].'</option>';
                        }
                    ?>
                </select>
                <div class="form-group" style="margin-top: 20px;">
                    <label for="observacao" style="color: green; margin-left: 305px"><b>Observações (Opcional):</b></label>
                    <input type="text" name="observacao" id="observacao" class="form-control" style="max-width: 500px; margin-left: 305px">
                </div>
                <center><input type="submit" name="submit" class="btn btn-success btn-md" style="margin-top: 10px;" value="Enviar"></center>
            </div>
        </form>
        <div class="col-sm-6" style="margin-top: 20px; margin-left:277px">
            <center><a href="<?php echo base_url('menu');?>" role="button" class="btn btn-sm btn-success">Voltar ao Menu</a></center>
        </div>
    </div>
</body>
</html>