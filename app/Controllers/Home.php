<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuario_Model;
use App\Models\Conta_Model;
use App\Models\Transacao_Model;
use App\Models\Operacao_Model;
use CodeIgniter\I18n\Time;


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
        $this->session = \Config\Services::session();
        $rules = [
			'username' => 'required|min_length[6]|max_length[20]',
			'senha'=> 'required|min_length[5]|max_length[60]', 
		];
        $usuarioModel=new Usuario_Model();
        $dadosUsuario['username'] = $this->request->getVar('username');
        $dadosUsuario['nome'] = $this->request->getVar('nome');
        $dadosUsuario['senha'] = $this->request->getVar('senha');
        $contaModel=new Conta_Model();
        $dadosConta['saldo']=$this->request->getVar('saldo');
        if($this->validate($rules)){
            $usuarioModel->cadastrarNovoUsuario($dadosUsuario['username'], $dadosUsuario['nome'], $dadosUsuario['senha']);
            $contaModel->cadastrarNovaConta($dadosUsuario['username'], $dadosConta['saldo']);
            $this->session->setFlashdata('messageRegisterOk','Usuario registrado com sucesso!');
            return redirect()->to('/');
        }else{
            $this->session->setFlashdata('cadastroFail','Não foi possível cadastrar o usuario.');
            return redirect()->to('/');
        }
    }
    public function menu(){
        $this->session = \Config\Services::session();
        $transacaoModel = new Transacao_Model();

        $saldo_final = 0;
        foreach ($transacaoModel->calculaSaldo($this->session->get('conta')->numero_conta)->getResult() as $row) {
            $saldo_final =  $row->saldo_final;
        }

        $data=array(
            'saldo_final'=> $saldo_final
        );
        echo view('menu', $data);
    }
    public function deposito(){
        echo view('common/header');
        echo view('deposito');
    }
    public function processaNovoDeposito(){
        $this->session = \Config\Services::session();
        $transacaoModel = new Transacao_Model();
        $operacaoModel=new Operacao_Model();
        $dadosDeposito['valor']=$this->request->getVar('valordeposito');
        $dadosDeposito['operacao']=$operacaoModel->getOperacaoDeposito()['cod_operacao'];
        $dadosDeposito['conta_origem']=$this->session->get('conta')->numero_conta;
        $dadosDeposito['conta_destino']=null;
        $dadosDeposito['data_transacao']=new Time('now');
        $dadosDeposito['observacao']= $this->request->getVar('obsdeposito');
        $transacaoModel=new Transacao_Model();
        $transacaoModel->novaTransacao($dadosDeposito['valor'], $dadosDeposito['operacao'], $dadosDeposito['conta_origem'], $dadosDeposito['conta_destino'], $dadosDeposito['data_transacao'], $dadosDeposito['observacao']);
        $this->session->setFlashdata('messageRegisterOk','Deposito realizado com sucesso!');
        return redirect()->to('/menu');
    }
    public function extrato(){
        $this->session = \Config\Services::session();
        echo view ('common/header');
        $transacaoModel=new Transacao_Model();
        $data=array(
            'transacoes_extrato'=>$transacaoModel->getExtrato($this->session->get('conta')->numero_conta),
        ); 
        echo view('extrato',$data);
    }
    public function pagamento(){
        echo view ('common/header');
        $operacaoModel=new Operacao_Model();
        $data=array(
            'tipopagamentos'=>$operacaoModel->getOperacoesPagamento()
        );
        echo view('pagamento',$data);
    }
    public function processaNovoPagamento(){
        $this->session = \Config\Services::session();
        $saldoModel = new Transacao_Model();
        $saldo_final = 0;
        foreach ($saldoModel->calculaSaldo($this->session->get('conta')->numero_conta)->getResult() as $row) {
            $saldo_final =  $row->saldo_final;
        }
        $rules = [
			'valorpagamento' => 'required|less_than_equal_to['.$saldo_final.']'
		];
        $this->session = \Config\Services::session();
        $dadosPagamento['valor']=$this->request->getVar('valorpagamento');
        $dadosPagamento['operacao']=$this->request->getVar('tipopagamentos');
        $dadosPagamento['conta_origem']=$this->session->get('conta')->numero_conta;
        $dadosPagamento['conta_destino']=null;
        $dadosPagamento['data_transacao']=new Time('now');
        $dadosPagamento['observacao']= $this->request->getVar('observacao');
        $transacaoModel=new Transacao_Model();
        if($this->validate($rules)){
            $transacaoModel->novaTransacao($dadosPagamento['valor'], $dadosPagamento['operacao'], $dadosPagamento['conta_origem'], $dadosPagamento['conta_destino'], $dadosPagamento['data_transacao'], $dadosPagamento['observacao']);
            $this->session->setFlashdata('messageRegisterOk','Pagamento realizado com sucesso!');
            return redirect()->to('/menu');
        }else{
            $this->session->setFlashdata('operacaoFail','Nao foi possivel realizar a operacao.');
            return redirect()->to('/menu');
        }
        
    }
    public function transferencia(){
        echo view ('common/header');
        echo view('transferencia');
    }
    public function processaNovaTransferencia(){
        $this->session = \Config\Services::session();
        $operacaoModel=new Operacao_Model();
        $saldoModel=new Transacao_Model();
        $saldo_final = 0;
        foreach ($saldoModel->calculaSaldo($this->session->get('conta')->numero_conta)->getResult() as $row) {
            $saldo_final =  $row->saldo_final;
        }
        $rules = [
			'valortransferencia' => 'required|less_than_equal_to['.$saldo_final.']'
		];
        $contaModel=new Conta_Model();
        $buscaConta=$contaModel->getData($this->request->getVar('contatransferencia'));
        if($buscaConta==null){
            $this->session->setFlashdata('operacaoFail','Conta de destino inexistente');
            return redirect()->to('/transferencia');
        }else{
            $dadosTransferencia['valor']=$this->request->getVar('valortransferencia');
            $dadosTransferencia['operacao']=$operacaoModel->getOperacaoTransferencia()['cod_operacao'];
            $dadosTransferencia['conta_origem']=$this->session->get('conta')->numero_conta;
            $dadosTransferencia['conta_destino']=$this->request->getVar('contatransferencia');
            $dadosTransferencia['data_transacao']=new Time('now');
            $dadosTransferencia['observacao']= $this->request->getVar('obstransferencia');
            $transacaoModel=new Transacao_Model();
            if($this->validate($rules)){
                $transacaoModel->novaTransacao($dadosTransferencia['valor'], $dadosTransferencia['operacao'], $dadosTransferencia['conta_origem'], $dadosTransferencia['conta_destino'], $dadosTransferencia['data_transacao'], $dadosTransferencia['observacao']);
                $this->session->setFlashdata('messageRegisterOk','Transferencia realizada com sucesso!');
                return redirect()->to('/menu');
            }else{
                $this->session->setFlashdata('operacaoFail','Nao foi possivel realizar a operacao.');
                return redirect()->to('/menu');
            }
        }
        
    }
    public function poupanca(){
        $this->session = \Config\Services::session();
        $saldoModel = new Transacao_Model();

        $saldo_poupanca = 0;
        foreach ($saldoModel->calculaSaldoPoupanca($this->session->get('conta')->numero_conta)->getResult() as $row) {
            $saldo_poupanca =  $row->saldo_poupanca;
        }
        $saldo_final = 0;
        foreach ($saldoModel->calculaSaldo($this->session->get('conta')->numero_conta)->getResult() as $row) {
            $saldo_final =  $row->saldo_final;
        }

        $data=array(
            'saldo_poupanca'=> $saldo_poupanca,
            'saldo_final'=>$saldo_final
        );
        echo view('poupanca', $data);
    }
    public function aplicacao(){
        echo view ('common/header');
        $this->session = \Config\Services::session();
        $saldoModel = new Transacao_Model();

        $saldo_poupanca = 0;
        foreach ($saldoModel->calculaSaldoPoupanca($this->session->get('conta')->numero_conta)->getResult() as $row) {
            $saldo_poupanca = $row->saldo_poupanca;
        }
        $saldo_final = 0;
        foreach ($saldoModel->calculaSaldo($this->session->get('conta')->numero_conta)->getResult() as $row) {
            $saldo_final =  $row->saldo_final;
        }

        $data=array(
            'saldo_poupanca'=> $saldo_poupanca,
            'saldo_final'=>$saldo_final
        );
        echo view('aplicacao',$data);
    }
    public function processaNovaAplicacao(){
        $this->session = \Config\Services::session();
        $saldoModel=new Transacao_Model();
        $saldo_final = 0;
        foreach ($saldoModel->calculaSaldo($this->session->get('conta')->numero_conta)->getResult() as $row) {
            $saldo_final =  $row->saldo_final;
        }
        $rules = [
			'valoraplicacao' => 'required|less_than_equal_to['.$saldo_final.']'
		];
        
        $operacaoModel=new Operacao_Model();
        $dadosAplicacao['valor']=$this->request->getVar('valoraplicacao');
        $dadosAplicacao['operacao']=$operacaoModel->getOperacaoAplicacao()['cod_operacao'];
        $dadosAplicacao['conta_origem']=$this->session->get('conta')->numero_conta;
        $dadosAplicacao['conta_destino']=null;
        $dadosAplicacao['data_transacao']=new Time('now');
        $dadosAplicacao['observacao']=$this->request->getVar('observacao');
        $transacaoModel=new Transacao_Model();
        
        if($this->validate($rules)){
            $transacaoModel->novaTransacao($dadosAplicacao['valor'], $dadosAplicacao['operacao'], $dadosAplicacao['conta_origem'], $dadosAplicacao['conta_destino'], $dadosAplicacao['data_transacao'], $dadosAplicacao['observacao']);
            $this->session->setFlashdata('messageRegisterOk','Aplicacao realizada com sucesso!');
            return redirect()->to('/poupanca');
        }else{
            $this->session->setFlashdata('operacaoFail','Nao foi possivel realizar a operacao.');
            return redirect()->to('/poupanca');
        }
    }
    public function resgate(){
        echo view ('common/header');
        $this->session = \Config\Services::session();
        $saldoModel = new Transacao_Model();

        $saldo_poupanca = 0;
        foreach ($saldoModel->calculaSaldoPoupanca($this->session->get('conta')->numero_conta)->getResult() as $row) {
            $saldo_poupanca =  $row->saldo_poupanca;
        }
        $saldo_final = 0;
        foreach ($saldoModel->calculaSaldo($this->session->get('conta')->numero_conta)->getResult() as $row) {
            $saldo_final =  $row->saldo_final;
        }

        $data=array(
            'saldo_poupanca'=> $saldo_poupanca,
            'saldo_final'=>$saldo_final
        );
        echo view('resgate',$data);
    }
    public function processaNovoResgate(){
        $this->session = \Config\Services::session();
        $saldoModel=new Transacao_Model();
        $saldo_poupanca = 0;
        foreach ($saldoModel->calculaSaldoPoupanca($this->session->get('conta')->numero_conta)->getResult() as $row) {
            $saldo_poupanca =  $row->saldo_poupanca;
        }
        $rules = [
			'valorresgate' => 'required|less_than_equal_to['.$saldo_poupanca.']'
		];
        
        $operacaoModel=new Operacao_Model();
        $dadosResgate['valor']=$this->request->getVar('valorresgate');
        $dadosResgate['operacao']=$operacaoModel->getOperacaoResgate()['cod_operacao'];
        $dadosResgate['conta_origem']=$this->session->get('conta')->numero_conta;
        $dadosResgate['conta_destino']=null;
        $dadosResgate['data_transacao']=new Time('now');
        $dadosResgate['observacao']= $this->request->getVar('observacao');
        $transacaoModel=new Transacao_Model();
        
        if($this->validate($rules)){
            $transacaoModel->novaTransacao($dadosResgate['valor'], $dadosResgate['operacao'], $dadosResgate['conta_origem'], $dadosResgate['conta_destino'], $dadosResgate['data_transacao'], $dadosResgate['observacao']);
            $this->session->setFlashdata('messageRegisterOk','Resgate realizado com sucesso!');
            return redirect()->to('/poupanca');
        }else{
            $this->session->setFlashdata('operacaoFail','Nao foi possivel realizar a operacao.');
            return redirect()->to('/poupanca');
        }
    }
    
    public function sessaoUsuario(){
        $rules = [
			'username' => 'required|min_length[6]|max_length[20]',
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
                $contaModel=new Conta_Model();
				$data['logged_in'] = TRUE;
				$data['username'] = $userRow['username'];
				$data['nome'] = $userRow['nome'];
                $data['conta']=$contaModel->getContas(array($userRow['username']))[0];
				$this->session->set($data);
				if ($data['nome'] == 'admin'){
					return redirect()->to(base_url('adminsession'));
				}else{ 
                    $this->session->setFlashdata('messageRegisterOk','Bem Vindo, '.$data['nome']);
					return redirect()->to(base_url('menu'));
				}	
			}
		} else {
			return view('login');
		}
	}
    public function logoutSessaoUsuario(){
        $this->session = \Config\Services::session();
        $data['logged_in'] = FALSE;
        $data['name'] = "";
        $data['email']="";
        $data['password']="";
        $this->session->set($data);
        $this->session->destroy();
        $this->session->setFlashdata('messageLogoutOk','Logout concluido.');
        return redirect()->to('/'); 
    } 
}


