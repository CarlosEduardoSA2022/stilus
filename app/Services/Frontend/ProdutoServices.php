<?php

namespace App\Services\Frontend;

use App\Models\ProdutoModel;
use App\Models\ProdutoImagemModel;
use CodeIgniter\Config\Factories;

class ProdutoServices
{
    private $produtoModel;
    private $imagemModel;
    private $db;

    public function __construct()
    {
        $this->produtoModel = Factories::class(ProdutoModel::class);

        $this->imagemModel = Factories::class(ProdutoImagemModel::class);

        $this->db = db_connect();
    }

    public function getAll()
    {
        return $this->produtoModel->orderBy('prd_id', 'DESC')->findAll();
    }

    public function getProductImageDefault(int $limit = 10)
    {
        $query = $this->db->table("produto");
        $query->select('prd_id,prd_nome,prd_preco,pri_id,pri_caminho_imagem, pri_nome_imagem');
        $query->join('produto_imagem', 'produto.prd_id = produto_imagem.pri_produto_id');
        $query->where('prd_ativo', 1);
        $query->where('pri_padrao', 1);
        $query->where('pri_ativa', 1);
        $query->limit($limit);

        return $query->get()->getResult();
    }    

    public function getById(int $id): object|Null
    {
        return $this->produtoModel->find($id);
    }

    public function getImagesByProductId(int $productId, int $imageDefault = 0)
    {
        $conditions = [
            'pri_produto_id'    => $productId,
            'pri_padrao'        => $imageDefault
        ];

        return $this->imagemModel->where($conditions)->orderBy('pri_padrao', 'DESC')->get()->getResult();
    }    

    
}
