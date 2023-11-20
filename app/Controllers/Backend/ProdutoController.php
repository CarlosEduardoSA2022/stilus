<?php

namespace App\Controllers\Backend;

use CodeIgniter\Config\Factories;
use App\Controllers\BaseController;
use App\Services\Backend\ProdutoServices;

class ProdutoController extends BaseController
{
    private $produtoService;

    public function __construct()
    {
        $this->produtoService = Factories::class(ProdutoServices::class);
    }

    public function index()
    {
        if(!session()->has('loggedIn')) return redirect()->route('back.login');

        $payLoad = [
            'products' => $this->produtoService->getAll()
        ];
        
        return view('backend/product/index', $payLoad);
    }

    public function create()
    {
        return view('backend/product/create');
    }    
}
