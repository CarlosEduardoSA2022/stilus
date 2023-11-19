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

    public function updateStatusUser(int $userID)
    {
        $this->userServices->updateStatusUser($userID);
    }
}
