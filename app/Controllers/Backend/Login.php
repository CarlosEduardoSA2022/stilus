<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\Login as loginModel;
use CodeIgniter\Config\Factories;

class Login extends BaseController
{
    private $login;

    public $session;
    
    public function __construct()
    {
        $this->login = Factories::class(loginModel::class);

        $this->session = session();
    }

    public function index()
    {
        if(session()->has('loggedIn')) return redirect()->route('back.home.index');

        return view('backend/login/index');
    }

    public function doLogin()
    {
        $conditions = [
            'usr_email' => $this->request->getPost('email'),
            'usr_ativo' => 1,
        ];

        $usuario = $this->login->where($conditions)->first();

        if(!$usuario){

            $this->session->setFlashdata('mensagem', '<div class="alert alert-warning">
            <div class="alert-title">Atenção</div>Credenciais inválidas, tente novamente ou entre em contato!</div>');  
            
            return redirect()->to(base_url('/'));
        }

        if(!$this->passwordCompare($this->request->getPost('senha'), $usuario->usr_senha)){
            $this->session->setFlashdata('mensagem', '<div class="alert alert-warning">
            <div class="alert-title">Atenção</div>Credenciais inválidas, tente novamente ou entre em contato!</div>');  
            
            return redirect()->to(base_url('/'));            
        }

        if($usuario->usr_usuario_tipo_id == 3){

            $this->session->setFlashdata('mensagem', '<div class="alert alert-warning">
            <div class="alert-title">Atenção</div>Credenciais inválidas, tente novamente ou entre em contato!</div>');  
            
            return redirect()->to(base_url('/'));
        }        

        $this->setSessionUserLogged($usuario);

        return redirect()->route('back.home.index');
    }

    public function doLogOut()
    {
        $this->session->destroy();

        return redirect()->route('back.login');
    }

    private function passwordCompare($password, string $hash): bool
    {
        return password_verify($password, $hash);
    }

    private function setSessionUserLogged(object $usuario)
    {
        $userLogged = [
            'userInfo'  => $usuario,
            'loggedIn'  => true
        ];

        $this->session->set($userLogged);
    }
}
