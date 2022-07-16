<?php
namespace App\Models;
use CodeIgniter\Model;

    class Operacao_Model extends Model {
        protected $table = 'operacao';
        protected $primaryKey = 'cod_operacao';
        protected $allowedFields = ['nome', 'descricao','tipo_operacao'];

        public function getData($id = null){
            if ($id == null){
                return $this->findAll();
            }
            return $this->asArray()->where(['cod_operacao' => $id])->first();
        }
        public function getOperacoes($operacoesLista){
            $db=db_connect();
            $builder=$db->table('operacao');
            $builder->select('*');
            if($listaOperacoes!=null){
                $builder->whereIn('operacao.cod_operacao', $operacoesLista);
            }
            $query = $builder->get();

        }
        public function getOperacoesPagamento(){
            
            return $this->asArray()->where(['tipo_operacao'=> 1])->findAll();
        }
        public function getOperacaoDeposito(){
            return $this->asArray()->where(['nome'=> 'Deposito'])->first();
        }
        public function getOperacaoTransferencia(){
            return $this->asArray()->where(['nome'=> 'Transferencia'])->first();
        }
        public function getOperacaoAplicacao(){
            return $this->asArray()->where(['nome'=> 'Aplicacao'])->first();
        }
        public function getOperacaoResgate(){
            return $this->asArray()->where(['nome'=> 'Resgate'])->first();
        }
    }

?>