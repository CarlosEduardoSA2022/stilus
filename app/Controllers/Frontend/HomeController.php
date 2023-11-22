<?php

namespace App\Controllers\Frontend;

use CodeIgniter\Config\Factories;
use App\Controllers\BaseController;
use App\Services\Frontend\ProdutoServices;

class HomeController extends BaseController
{
    private $produtoService;

    public function __construct()
    {
        $this->produtoService = Factories::class(ProdutoServices::class);
    }
    
    public function index()
    {
        $payLoad = [
            'productsDefault' => $this->produtoService->getProductImageDefault()
        ];

        return view('frontend/home/index', $payLoad);
    }
}
