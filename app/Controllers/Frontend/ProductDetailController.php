<?php

namespace App\Controllers\Frontend;

use CodeIgniter\Config\Factories;
use App\Controllers\BaseController;
use App\Services\Frontend\ProdutoServices;

class ProductDetailController extends BaseController
{
    private $produtoService;

    public function __construct()
    {
        $this->produtoService = Factories::class(ProdutoServices::class);
    }
    
    public function detail(int $productId)
    {
        $product = $this->produtoService->getById($productId);

        if(!$product) return redirect()->back();

        $productImageDefault =  $this->produtoService->getImagesByProductId($productId, 1);

        $productImages =  $this->produtoService->getImagesByProductId($productId);

        $payLoad = [
            'product'               => $product,
            'productImages'         => $productImages,
            'productImageDefault'   => $productImageDefault,
        ];

        return view('frontend/product/detail', $payLoad);
    }
}
