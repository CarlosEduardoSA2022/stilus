<?php

namespace App\Services\Backend;

use App\Models\ProdutoModel;
use App\Models\ProdutoImagemModel;
use CodeIgniter\Config\Factories;

class ProdutoServices
{
    private $produtoModel;
    private $imagemModel;

    public function __construct()
    {
        $this->produtoModel = Factories::class(ProdutoModel::class);

        $this->imagemModel = Factories::class(ProdutoImagemModel::class);
    }

    public function getAll()
    {
        return $this->produtoModel->orderBy('prd_id', 'DESC')->findAll();
    }

    public function store(array $product): array
    {
        if(!$id = $this->produtoModel->insert($product)) return ['errors' => $this->produtoModel->errors(), 'success' => false];

        return ['prd_id' => $id, 'success' => true];
    }

    public function storeImage(array $image): array
    {
        if(!$id = $this->imagemModel->insert($image)) return ['errors' => $this->imagemModel->errors(), 'success' => false];

        return ['pri_id' => $id, 'success' => true];
    }    
}
