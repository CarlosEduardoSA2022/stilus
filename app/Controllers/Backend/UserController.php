<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Services\Backend\UserServices;
use CodeIgniter\Config\Factories;

class UserController extends BaseController
{
    private $userServices;

    public function __construct()
    {
        $this->userServices = Factories::class(UserServices::class);
    }

    public function index()
    {
        if(!session()->has('loggedIn')) return redirect()->route('back.login');

        if(session('userInfo')->usr_usuario_tipo_id != 1) return redirect()->route('back.login');

        $payLoad = [
            'users' => $this->userServices->getAll()
        ];
        
        return view('backend/user/index', $payLoad);
    }

    public function adicionar()
    {
        return view('backend/user/create');
    }

    public function store()
    {
        $payLoad = $this->request->getPost();

        if($this->userServices->existUserByEmail($payLoad['usr_email'])){

            $this->session->setFlashdata('mensagem', '<div style="margin-top: 15px;"  class="alert alert-warning">
            <div class="alert-title">Atenção</div>Já existe usuário cadastrado com esse e-mail!</div>');  
            
            return redirect()->back();
        }

        $payLoad['usr_cpf'] = str_replace('-', '', str_replace('.', '', $payLoad['usr_cpf']));

        $payLoad['usr_senha'] = password_hash($payLoad['usr_senha'], PASSWORD_DEFAULT);

        $payLoad['usr_ativo'] = 1;

        $this->userServices->store($payLoad);

        $this->session->setFlashdata('sucesso', '<div style="margin-top: 15px;"  class="alert alert-success">
        <div class="alert-title">Sucesso</div>Usuário cadastrado com sucesso!</div>');  
        
        return redirect()->back();
    }

    public function updateStatusUser(int $userID)
    {
        $this->userServices->updateStatusUser($userID);
    }
}
