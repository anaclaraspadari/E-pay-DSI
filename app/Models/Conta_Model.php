<?php
namespace App\Models;
use CodeIgniter\Model;

    class Conta_Model extends Model {
        protected $table = 'conta';
        protected $primaryKey = 'numero_conta';
        protected $allowedFields = ['usuario', 'saldo'];

        public function getData($id = null){
            if ($id == null){
                return $this->findAll();
            }
            return $this->asArray()->where(['numero_conta' => $id])->first();
        }
        public function getContas($usuarioLista){
            $db=db_connect();
            $builder=$db->table('conta');
            $builder->select('*');
            if($usuarioLista!=null){
                $builder->join('usuario','conta.usuario=usuario.username');
            }
            if($usuarioLista!=null){
                $builder->whereIn('usuario.username', $usuarioLista);
            }
            $query = $builder->get();


            // foreach ($query->getResult() as $row) {
            //     echo $row->numero_conta;
            //     echo ";";
            //     echo $row->usuario;
            //     echo ";";
            //     echo $row->nome;
            //     echo "<br/>";
            // }
            return $query->getResult();
        }
    }

?>