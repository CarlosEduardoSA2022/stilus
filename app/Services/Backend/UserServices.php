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

    public function index()
    {
        //
    }
}
