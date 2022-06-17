<?php
namespace App\Models;
use CodeIgniter\Model;

    class Transacao_Model extends Model {
        protected $table = 'transacao';
        protected $primaryKey = 'cod_transacao';
        protected $allowedFields = ['valor', 'operacao', 'conta_origem', 'conta_destino', 'data_transacao'];

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


            // foreach ($query->getResult() as $row) {
            //     echo $row->valor;
            //     echo ";";
            //     echo $row->data_transacao;
            //     echo "<br/>";
            // }
            return $query->getResult();
        }
    }

?>