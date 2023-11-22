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

    public function store()
    {
        $payLoad = $this->request->getPost();

        $productNew = $this->produtoService->store($payLoad);

        if(!$productNew['success']){

            $startMessage = '<div style="margin-top: 15px;"  class="alert alert-warning"> <div class="alert-title">Atenção!</div>';

            $boryMessage = '';

            foreach ($productNew['errors'] as $error => $value) $boryMessage = $boryMessage . "<p>" . $value . '</p>';

            $boryMessage = $boryMessage . '</div>';

            $this->session->setFlashdata('errors',  $startMessage . $boryMessage );

            return redirect()->back();
        }

        $produtctID = $productNew['prd_id'];

        $imagemPadrao = $this->request->getFile('imagemPadrao');

        $imagemsProduto = $this->request->getFileMultiple('imagensProduto');

        $caminhoImagem = base_url().'uploads/products/';

        if($imagemsProduto[0]->getName() != ''){

            foreach ($imagemsProduto as $imagem) {
                
                if ($imagem->isValid() && !$imagem->hasMoved()){

                    $nomeImagem = $imagem->getRandomName();

                    $newImage = [
                        'pri_produto_id'        => $produtctID,
                        'pri_caminho_imagem'    => $caminhoImagem,
                        'pri_nome_imagem'       => $nomeImagem,
                        'pri_padrao'            => 0,
                        'pri_ativa'             => 1
                    ];   

                    $imagem->store('../../public/uploads/products', $nomeImagem);

                    $this->produtoService->storeImage($newImage);
                }
            }
        }

        if ($imagemPadrao->getName() != '' && !$this->validate([
          'imagemPadrao' => 'uploaded[imagemPadrao]|is_image[imagemPadrao]|ext_in[imagemPadrao,jpeg,png,jpg,svg]'
        ], [
          'imagemPadrao' => [
            'uploaded' => 'Escolha uma imagem padrão',
            'is_image' => 'O que você escolheu não é uma imagem',
            'ext_in' => 'A extensão ' . $imagemPadrao->getExtension() . ' não é válida',
          ]
        ])) {
            $errors['errors'] = $this->validator->getErrors();

            $startMessage = '<div style="margin-top: 15px;"  class="alert alert-warning"> <div class="alert-title">Atenção!</div>';

            $boryMessage = '';

            foreach ($errors['errors'] as $error => $value) $boryMessage = $boryMessage . "<p>" . $value . '</p>';

            $boryMessage = $boryMessage . '</div>';

            $this->session->setFlashdata('errors',  $startMessage . $boryMessage );

            return redirect()->back();
        }

        $nomeImagemPadrao = $imagemPadrao->getRandomName();

        if ($imagemPadrao->isValid() && !$imagemPadrao->hasMoved()) {
            
            $imagemPadrao->store('../../public/uploads/products', $nomeImagemPadrao);

            $newImageDefault = [
                'pri_produto_id'        => $produtctID,
                'pri_caminho_imagem'    => $caminhoImagem,
                'pri_nome_imagem'       => $nomeImagemPadrao,
                'pri_padrao'            => 1,
                'pri_ativa'             => 1
            ];

            $imageDefaultNew = $this->produtoService->storeImage($newImageDefault);

            if(!$imageDefaultNew['success']){

                $startMessage = '<div style="margin-top: 15px;"  class="alert alert-warning"> <div class="alert-title">Atenção!</div>';
    
                $boryMessage = '';
    
                foreach ($imageDefaultNew['errors'] as $error => $value) $boryMessage = $boryMessage . "<p>" . $value . '</p>';
    
                $boryMessage = $boryMessage . '</div>';
    
                $this->session->setFlashdata('errors',  $startMessage . $boryMessage );
    
                return redirect()->back();
            }
        }
        
        $this->session->setFlashdata('sucesso', 'Produto inserido com sucesso');

        return redirect()->to(base_url('produto/lista'));
    }

    public function edit(int $productId)
    {
        if(!session()->has('loggedIn')) return redirect()->route('back.login');

        $product = $this->produtoService->getById($productId);

        if(!$product) return redirect()->back();

        $productImages = $this->produtoService->getImagesByProductId($productId);

        $payLoad = [
            'product'       => $product,
            'productImages' => $productImages
        ];

        return view('backend/product/edit', $payLoad);
    }

    public function updateStatusProductImage(int $idImage)
    {
        $this->produtoService->updateStatusProductImage($idImage);
    }    

    public function update()
    {
        $payLoad = $this->request->getPost();

        $productId = $payLoad['prd_id'];

        $payLoad['prd_preco'] =  str_replace(",",".", $payLoad['prd_preco']);

        $payLoad['prd_ativo'] = $payLoad['prd_ativo'] == '0' ? 0 : 1;

        unset($payLoad['prd_id']);

        $this->produtoService->update($productId, $payLoad);

        $imagemPadrao = $this->request->getFile('imagemPadrao');

        $imagemsProduto = $this->request->getFileMultiple('imagensProduto');

        $caminhoImagem = base_url().'uploads/products/';

        if($imagemPadrao && $imagemPadrao->getName() != '') {

            $nomeImagemPadrao = $imagemPadrao->getRandomName();

            if ($imagemPadrao->isValid() && !$imagemPadrao->hasMoved()) {

                $newImageDefault = [
                    'pri_produto_id'        => $productId,
                    'pri_caminho_imagem'    => $caminhoImagem,
                    'pri_nome_imagem'       => $nomeImagemPadrao,
                    'pri_padrao'            => 1,
                    'pri_ativa'             => 1
                ];

                $imagemPadrao->store('../../public/uploads/products', $nomeImagemPadrao);
    
                $this->produtoService->storeImage($newImageDefault);                
            }
        }

        if($imagemsProduto[0]->getName() != ''){

            foreach ($imagemsProduto as $imagem) {
                
                if ($imagem->isValid() && !$imagem->hasMoved()){

                    $nomeImagem = $imagem->getRandomName();

                    $newImage = [
                        'pri_produto_id'        => $productId,
                        'pri_caminho_imagem'    => $caminhoImagem,
                        'pri_nome_imagem'       => $nomeImagem,
                        'pri_padrao'            => 0,
                        'pri_ativa'             => 1
                    ];   

                    $imagem->store('../../public/uploads/products', $nomeImagem);

                    $this->produtoService->storeImage($newImage);
                }
            }
        }

        $productImages = $this->produtoService->getImagesByProductId($productId);

        foreach ($productImages as $productImage) {
            
            $imageProduct = $this->request->getFile('timg'.$productImage->pri_id);

            if($imageProduct && $imageProduct->getName() != '') {

                unlink("uploads/products/". $productImage->pri_nome_imagem );

                $nomeImagem = $imageProduct->getRandomName();

                if ($imageProduct->isValid() && !$imageProduct->hasMoved()) {

                    $imageProduct->store('../../public/uploads/products', $nomeImagem);

                    $newImageDefault = [
                        'pri_nome_imagem'       => $nomeImagem,
                        'pri_padrao'            => $productImage->pri_padrao,
                        'pri_ativa'             => $productImage->pri_ativa
                    ];
        
                    $this->produtoService->updateImage($productImage->pri_id, $newImageDefault);                    
                }
            }
        }

        $this->session->setFlashdata('sucesso', 'Produto atualizado com sucesso');

        return redirect()->to(base_url('produto/lista'));
    }
}
