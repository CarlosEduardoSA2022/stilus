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

    public function existUserByEmail(string $email): bool
    {
        $return = false;

        $user = $this->userModel->where('usr_email', $email)->first();

        if($user) $return = true;

        return $return;
    }

    public function getUserById(int $userId): object|Null
    {
        return $this->userModel->find($userId);
    }

    public function store(array $user): array
    {
        if(!$userId = $this->userModel->insert($user)) return $this->userModel->errors();

        return ['usr_id' => $userId, 'success' => true];
    }

    public function update(int $userId, array $user): array
    {
        if(!$this->userModel->update($userId, $user)) return $this->userModel->errors();

        return ['success' => true];
    }    

    public function updateStatusUser(int $userID)
    {
        $user = $this->userModel->find($userID);

        $this->userModel->where('usr_id', $userID)->set('usr_ativo', !$user->usr_ativo)->update();
    }

}
