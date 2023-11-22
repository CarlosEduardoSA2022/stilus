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
        if(session('userInfo')->usr_usuario_tipo_id != 1) return redirect()->back();
        
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

    public function edit(int $userId)
    {
        if(session('userInfo')->usr_id == $userId) return redirect()->back();

        $user = $this->userServices->getUserById($userId);

        if(!$user) return redirect()->back();

        $payLoad = [
            'user' => $user
        ];

        return view('backend/user/edit', $payLoad);
    }

    public function update()
    {
        $payLoad = $this->request->getPost();

        $userId = $payLoad['usr_id'] ;

        $payLoad['usr_cpf'] = str_replace('-', '', str_replace('.', '', $payLoad['usr_cpf']));

        $payLoad['usr_senha'] = password_hash($payLoad['usr_senha'], PASSWORD_DEFAULT);

        $payLoad['usr_ativo'] = $payLoad['usr_ativo'] == '0' ? 0 : 1;

        if($payLoad['alterPassword'] == '0'){

            unset($payLoad['alterPassword']);

            unset($payLoad['usr_senha']);

            unset($payLoad['senha_confirmar']);

        }

        unset($payLoad['usr_id']);

        unset($payLoad['senha_confirmar']);

        unset($payLoad['alterPassword']);

        $this->userServices->update($userId, $payLoad);

        $this->session->setFlashdata('sucesso', '<div style="margin-top: 15px;"  class="alert alert-success">
        <div class="alert-title">Sucesso</div>Usuário alterado com sucesso!</div>');  
        
        return redirect()->back();
    }    

    public function updateStatusUser(int $userID)
    {
        $this->userServices->updateStatusUser($userID);
    }
}
