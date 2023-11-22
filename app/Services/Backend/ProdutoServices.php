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

    public function getById(int $id): object|Null
    {
        return $this->produtoModel->find($id);
    }

    public function store(array $product): array
    {
        if(!$id = $this->produtoModel->insert($product)) return ['errors' => $this->produtoModel->errors(), 'success' => false];

        return ['prd_id' => $id, 'success' => true];
    }

    public function update(int $id, array $product): array
    {
        if(!$this->produtoModel->update($id, $product)) return ['errors' => $this->produtoModel->errors(), 'success' => false];

        return ['success' => true];
    }

    public function updateStatusProduct(int $id)
    {
        $product = $this->produtoModel->find($id);

        $this->produtoModel->where('prd_id', $id)->set('prd_ativo', !$product->prd_ativo)->update();
    }

    public function storeImage(array $image): array
    {
        if(!$id = $this->imagemModel->insert($image)) return ['errors' => $this->imagemModel->errors(), 'success' => false];

        return ['pri_id' => $id, 'success' => true];
    }  

    public function updateImage(int $id, array $productImage): array
    {
        if(!$this->imagemModel->update($id, $productImage)) return ['errors' => $this->imagemModel->errors(), 'success' => false];

        return ['success' => true];
    }    
    
    public function getImageById(int $id): object|Null
    {
        return $this->imagemModel->find($id);
    }     

    public function getImagesByProductId(int $productId)
    {
        return $this->imagemModel->where('pri_produto_id', $productId)->orderBy('pri_padrao', 'DESC')->get()->getResult();
    }

    public function updateStatusProductImage(int $idImage)
    {
        $image = $this->imagemModel->find($idImage);

        $this->imagemModel->where('pri_id', $idImage)->set('pri_ativa', !$image->pri_ativa)->update();
    }
}
