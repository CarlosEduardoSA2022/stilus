<?php

namespace App\Controllers\Frontend;

use CodeIgniter\Config\Factories;
use App\Controllers\BaseController;
use App\Models\Login as loginModel;

class MinhaContaController extends BaseController
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
        return view('frontend/me/login/index');
    }

    public function doLogin()
    {
        $conditions = [
            'usr_email'             => $this->request->getPost('email'),
            'usr_ativo'             => 1,
            'usr_usuario_tipo_id'   => 3,
        ];

        $usuario = $this->login->where($conditions)->first();

        if(!$usuario){

            $this->session->setFlashdata('error', 'Credenciais inválidas, tente novamente ou entre em contato!');  
            
            return redirect()->back();
        }

        if(!$this->passwordCompare($this->request->getPost('senha'), $usuario->usr_senha)){
            $this->session->setFlashdata('error', 'Credenciais inválidas, tente novamente ou entre em contato!');  
            
            return redirect()->back();
        }

        $this->session->setFlashdata('success', 'Credenciais inválidas, tente novamente ou entre em contato!');

        $this->setSessionUserLogged($usuario);

        return redirect()->to(base_url());
    }

    public function doLogOut()
    {
        $this->session->destroy();

        return redirect()->to(base_url());
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
