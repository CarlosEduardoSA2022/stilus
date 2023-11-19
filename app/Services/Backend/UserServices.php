<?php

namespace App\Services\Backend;

use App\Models\UserModel;
use CodeIgniter\Config\Factories;

class UserServices
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = Factories::class(UserModel::class);
    }

    public function getAll()
    {
        return $this->userModel->findAll();
    }

    public function updateStatusUser(int $userID)
    {
        $user = $this->userModel->find($userID);

        $this->userModel->where('usr_id', $userID)->set('usr_ativo', !$user->usr_ativo)->update();
    }
}
