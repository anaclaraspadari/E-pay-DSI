<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuario_Model;
use App\Models\Conta_Model;
use App\Models\Transacao_Model;

class Home extends BaseController
{
    

    

    public function index()
    {
        return view('login');
    }
    public function cadastroUsuario(){
        echo view('cadastro-usuario');
    }

    public function processaCadastroNovoUsuario(){
        // $this->request = \Config\Services::request();
        $dadosUsuario['username'] = $this->request->getVar('username');
        $dadosUsuario['nome'] = $this->request->getVar('nome');
        $dadosUsuario['senha'] = $this->request->getVar('senha');
        $usuarioModel=new Usuario_Model();
        $usuarioModel->cadastrarNovoUsuario($dadosUsuario['username'], $dadosUsuario['nome'], $dadosUsuario['senha']);
        return redirect()->to('/');
    }

    public function menu(){
        echo view('menu');
    }
    public function extrato(){
        echo view('extrato');
    }
    public function pagamento(){
        echo view('pagamento');
    }
    public function transferencia(){
        echo view('transferencia');
    }
    public function poupanca(){
        echo view('poupanca');
    }
    public function aplicacao(){
        echo view('aplicacao');
    }
    public function resgate(){
        echo view('resgate');
    }
    // public function teste(){                            //Função usada para checar conexão com banco
    //     // $usuarioModel = new Usuario_Model();
    //     // print_r($usuarioModel->getData());
    //     // // echo view('teste');
    //     // $transacaoModel = new Transacao_Model();
    //     // $operacaoLista=array(2,3,4,5);
    //     // $contaLista=array(3);
    //     // print_r($transacaoModel->getTransacoes($operacaoLista,$contaLista));
    //     $contaModel = new Conta_Model();
    //     $usuarioLista=array('anaclaraspadari','ewbriao');
    //     print_r($contaModel->getContas($usuarioLista));
    //     echo view('teste');
    // }
    public function sessaoUsuario(){
        $rules = [
			'username' => 'required|min_length[6]|max_length[15]',
			'senha'=> 'required|min_length[5]|max_length[60]', 
		];

		$usuarioModel = new Usuario_Model();
		$this->session = \Config\Services::session();
		 
		if ($this->validate($rules)){
			$data = array(
				'username' => $this->request->getVar('username'),
				'senha' => $this->request->getVar('senha'),
				'nome' => '',
				'logged_in' => FALSE
			);
			
			if(!($userRow = $usuarioModel->checkUserPassword($data))){
				$this->session->setFlashdata('loginFail','Nome ou Senha Incorretos');
				return redirect()->to('/');
			}else{
				$data['logged_in'] = TRUE;
				$data['username'] = $userRow['username'];
				$data['nome'] = $userRow['nome'];
				$this->session->set($data);
				if ($data['nome'] == 'admin'){
					return redirect()->to(base_url('adminsession'));
				}else{ 
					return redirect()->to(base_url('menu'));
				}	
			}
		} else {
			return view('login');
		}
	} 
}


