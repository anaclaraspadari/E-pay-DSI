<?php
namespace App\Models;
use CodeIgniter\Model;

    class Usuario_Model extends Model {
        protected $table = 'usuario';
        protected $primaryKey = 'id';
        protected $allowedFields = ['username','nome', 'senha'];

        public function getData($id = null){
            if ($id == null){
                return $this->findAll();
            }
            return $this->asArray()->where(['username' => $id])->first();
        }

        public function cadastrarNovoUsuario($username,$nome,$senha){
            echo $username;
            // $db=db_connect();
            // $builder=$db->table('usuario');
            // $builder->select('*');
            // $query=$builder->get();
            
            $buscaUsuario=$this->asArray()->where(['username' => $username])->first();
            if($buscaUsuario==null){
                $data=[
                    'username' => $username,
                    'nome'  => $nome,
                    'senha'  => md5($senha),
                ];
                print_r($data);
                return $this->insert($data);
            }

            throw new Exception("Usuario ja cadastrado!");
        }

        public function checkUserPassword($data){
            return $this->where(['username' => $data['username'], 'senha' => md5($data['senha'])])->first();
        }
    }

?>
