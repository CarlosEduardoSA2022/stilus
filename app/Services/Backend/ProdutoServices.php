<?php

namespace App\Services\Backend;

use App\Models\ProdutoModel;
use CodeIgniter\Config\Factories;

class ProdutoServices
{
    private $produtoModel;

    public function __construct()
    {
        $this->produtoModel = Factories::class(ProdutoModel::class);
    }

    public function getAll()
    {
        return $this->produtoModel->orderBy('prd_id', 'DESC')->findAll();
    }
}
