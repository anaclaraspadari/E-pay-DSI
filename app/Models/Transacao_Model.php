<?php
namespace App\Models;
use CodeIgniter\Model;

    class Transacao_Model extends Model {
        protected $table = 'transacao';
        protected $primaryKey = 'cod_transacao';
        protected $allowedFields = ['valor', 'operacao', 'conta_origem', 'conta_destino', 'data_transacao','observacao'];

        public function getData($id = null){
            if ($id == null){
                return $this->findAll();
            }
            return $this->asArray()->where(['cod_transacao' => $id])->first();
        }
        public function getTransacoes($operacaoLista, $contaLista){
            $db=db_connect();
            $builder=$db->table('transacao');
            $builder->select('*');
            if($operacaoLista!=null){
                $builder->join('operacao','transacao.operacao=operacao.cod_operacao');
            }
            if($contaLista!=null){
                $builder->join('conta','transacao.conta_origem=conta.numero_conta');
            }
            if($operacaoLista!=null){
                $builder->whereIn('operacao.cod_operacao', $operacaoLista);
            }
            if($contaLista!=null){
                $builder->whereIn('conta.numero_conta', $contaLista);
            }

            $query = $builder->get();

            return $query->getResult();
        }
        public function novaTransacao($valor,$operacao,$conta_origem,$conta_destino,$data_transacao,$observacao){
            $data=[
                'valor' => $valor,
                'operacao' => $operacao,
                'conta_origem' => $conta_origem,
                'conta_destino' => $conta_destino, 
                'data_transacao' => $data_transacao,
                'observacao' => $observacao,
            ];
            print_r($data);
            return $this->insert($data);
        }
        public function calculaSaldo($conta_origem){
            $db=db_connect();

            return $db->query(' select registro_negativo.conta_origem, registro_negativo.saldo_inicial, registro_negativo.valor_pagamento as pagamentos, registro_positivo.valor_pagamento as recebimentos,
            coalesce(registro_negativo.saldo_inicial,0)-coalesce(registro_negativo.valor_pagamento,0)+coalesce(registro_positivo.valor_pagamento,0)+coalesce(registro_positivo2.valor_pagamento,0) as saldo_final
            from conta c left join (
                select conta_origem,
                sum(valor) as valor_pagamento,
                conta.saldo as saldo_inicial 
            
                from transacao
            
                join operacao on transacao.operacao=operacao.cod_operacao
                join conta on transacao.conta_origem=conta.numero_conta
            
                where operacao.relacao_saldo = 0
                group by conta_origem, conta.saldo
            ) registro_negativo 
            on c.numero_conta = registro_negativo.conta_origem
            left join (
            select conta_origem,
            sum(valor) as valor_pagamento,
            conta.saldo as saldo_inicial 
        
            from transacao
        
            join operacao on transacao.operacao=operacao.cod_operacao
            join conta on transacao.conta_origem=conta.numero_conta
        
            
            where operacao.relacao_saldo = 1
            group by conta_origem, conta.saldo
            ) registro_positivo on
            registro_positivo.conta_origem = c.numero_conta
            left join (
                select conta_destino,
                sum(valor) as valor_pagamento,
                conta.saldo as saldo_inicial 
            
                from transacao
            
                join operacao on transacao.operacao=operacao.cod_operacao
                join conta on transacao.conta_destino=conta.numero_conta
            
                
                where operacao.nome = \'Transferencia\'
                group by conta_destino, conta.saldo
                ) registro_positivo2 on
                registro_positivo2.conta_destino = c.numero_conta
            where registro_positivo.conta_origem = ?', $conta_origem);
        }


        public function calculaSaldoPoupanca($conta_origem){
            $db=db_connect();
            return $db->query(' select registro_negativo.conta_origem, registro_negativo.valor_pagamento as pagamentos, registro_positivo.valor_pagamento as recebimentos,
            coalesce(registro_negativo.saldo_poupanca,0)-coalesce(registro_negativo.valor_pagamento,0)+coalesce(registro_positivo.valor_pagamento,0) as saldo_poupancafrom (
                select conta_origem,
                sum(valor) as valor_pagamento,
                conta.saldo_poupanca as saldo_poupanca 
            
                from transacao
            
                join operacao on transacao.operacao=operacao.cod_operacao
                join conta on transacao.conta_origem=conta.numero_conta
            
                where operacao.nome = \'Resgate\'
                group by conta_origem, conta.saldo_poupanca
            ) registro_negativo
            full join (
                select conta_origem,
                sum(valor) as valor_pagamento,
                conta.saldo_poupanca as saldo_poupanca 
            
                from transacao
            
                join operacao on transacao.operacao=operacao.cod_operacao
                join conta on transacao.conta_origem=conta.numero_conta
            
                
                where operacao.nome = \'Aplicacao\'
                group by conta_origem, conta.saldo_poupanca
            ) registro_positivo on
            registro_positivo.conta_origem = registro_negativo.conta_origem
            where registro_positivo.conta_origem = ?', $conta_origem);
        }
        public function getExtrato($conta_origem){
            $db=db_connect();
            $builder=$db->table('transacao');
            $builder->select('data_transacao, operacao.descricao, valor, observacao');
            $builder->join('operacao','transacao.operacao=operacao.cod_operacao');
            $builder->join('conta','transacao.conta_origem=conta.numero_conta');
            $builder->where('conta_origem',$conta_origem);
            $query=$builder->get();
            return $query->getResult();
        }
    }

?>