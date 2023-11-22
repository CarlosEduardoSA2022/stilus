<?= $this->extend('layouts/backend/base')?>

<?= $this->section('custom-css')?> 
    <!-- CSS Libraries -->

<?= $this->endSection() ?>

<?= $this->section('page-title')?> 
    <h1>Produto</h1>    
<?= $this->endSection() ?>

<?= $this->section('page-body')?> 
    <h2 class="section-title">Alterar Produto</h2>

    <div class="row">
        <div class="col-12 col-md-8 col-lg-8">
            <div class="card">
                <form action="<?= route_to('back.product.update')?>" method="post" class="needs-validation" novalidate=""  enctype="multipart/form-data">
                    <div class="card-body">
                        <input type="hidden" name="prd_id" value="<?= $product->prd_id ?>">
                        <div class="form-group">
                            <label for="prd_nome">Nome</label>
                            <input id="prd_nome" name="prd_nome" type="text" value="<?= $product->prd_nome ?>" class="form-control" placeholder="Nome do Produto" maxlength="200" tabindex="1" required autofocus>
                            <div class="invalid-feedback">
                                Por favor, digite o Nome do Produto
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="prd_preco">Preço</label>
                                <input id="prd_preco" name="prd_preco" value="<?= $product->prd_preco ?>"  class="form-control money" type="text" tabindex="2" required/>
                                <div class="invalid-feedback">
                                    Por favor, digite o Preço do Produto
                                </div>                                
                            </div>

                            <div class="form-group col-md-2">
                                <label for="prd_avaliacao">Avaliação</label>
                                <input id="prd_avaliacao" name="prd_avaliacao" value="<?= $product->prd_avaliacao ?>"  type="number" class="form-control" onchange="setTwoNumberDecimal" min="1" max="5" step="0.5"  tabindex="3"/>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="prd_quantidade">Quantidade</label>
                                <input id="prd_quantidade" name="prd_quantidade" value="<?= $product->prd_quantidade ?>" class="form-control" value="0" min="0" type="number" tabindex="4" />
                            </div>                            
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea id="prd_descricao" name="prd_descricao" class="form-control" maxlength="2000" tabindex="5"><?= $product->prd_descricao ?> </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-check">
                                    <input type="hidden" name="prd_ativo" value="0">
                                    
                                    <input id="prd_ativo" name="prd_ativo" class="form-check-input" type="checkbox" <?= $product->prd_ativo == 1 ? 'checked' : ''?>>
                                    <label class="form-check-label" for="prd_ativo">
                                        Ativo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <div id="divImage">
                            <div class="form-row">
                                <?php if(count($productImages) == 0): ?>
                                    <div class="form-group col-md-6">
                                        <div class="section-title">Imagem Padão <small class="text text-primary">Ficará em destaque na loja.</small></div>
                                        <input id="imagemPadrao" name="imagemPadrao" type="file" accept="image/*" class="form-control">
                                    </div>
                                <?php endif; ?>

                                <div class="form-group col-md-6">
                                    <div class="section-title">Adicionar Imagens do Produto</div>
                                    <input id="imagensProduto" name="imagensProduto[]" type="file" accept="image/*" multiple class="form-control">
                                </div>
                            </div>

                            <?php if(count($productImages) > 0): ?>
                            <h5>Imagens do Produto</h5>
                            <hr>
                            <div class="row">
                                <?php foreach ($productImages as $productImage): ?>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                        <article class="article">
                                        <div class="article-header">
                                            <img id="<?= 'img' . $productImage->pri_id ?>" class="article-image" src="<?= $productImage->pri_caminho_imagem . $productImage->pri_nome_imagem?>" alt="">
                                        </div>
                                        <div class="article-details">

                                            <?php if($productImage->pri_padrao): ?>
                                                <h6 class="text text-primary"><b>Padrão</b> <small>Destaque</small></h6>
                                            <?php else: ?>
                                                <h6><b>Imagem</b> <small>Loja</small></h6>
                                            <?php endif; ?>

                                            <div class="form-check">

                                                <input id="<?= $productImage->pri_id ?>" class="form-check-input" type="checkbox" <?= $productImage->pri_ativa == 1 ? 'checked' : ''?> onchange="activeImage(this)" />
                                                <label class="form-check-label" for="<?= $productImage->pri_id ?>">
                                                    Ativa
                                                </label>
                                            </div>

                                            <div class="article-cta mt-3">
                                                <label class="btn btn-light" for="<?= 'timg' . $productImage->pri_id ?>">Trocar imagem</label>
                                                <input onchange="readURL(this, <?='img' . $productImage->pri_id ?>)" id="<?= 'timg' . $productImage->pri_id ?>" name="<?= 'timg' . $productImage->pri_id ?>" type="file" accept="image/*" class="form-control d-none">
                                            </div>
                                        </div>
                                        </article>
                                    </div>
                                <?php endforeach; ?>
                            </div>                        
                            <?php endif; ?>

                        </div><!-- Fim div Images -->
                    </div>

                    <?php
                        if(session('errors')){ echo session('errors');}

                        if(session('sucesso')){ echo session('sucesso');}
                    ?>

                    <div class="card-footer">
                        <input class="btn btn-primary" type="submit" value="Salvar" /> |
                            <a href="<?= route_to('back.product.index')?>">Voltar para lista</a>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('custom-script')?> 
    <!-- JS Libraies -->
    <script src="<?= base_url() ?>assets/backend/modules/jquery-mask/jquery.mask.min.js"></script>

  <!-- Page Specific JS File -->
  <?= $this->include('backend/product/inc/_update'); ?>

  <script>
    $('.money').mask('000.000.000.000.000,00', {reverse: true});

    function readURL(input, img) {
        if (input.files && input.files[0]) {
            var i;
            for (i = 0; i < input.files.length; ++i) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#'+img.id).attr("src", e.target.result);
              }

              reader.readAsDataURL(input.files[i]);
            }
        }
    }

    $("#prd_avaliacao").on("blur", ()=>{
        if($("#prd_avaliacao").val() != '' && parseFloat($("#prd_avaliacao").val()) > 5.0){

            $("#prd_avaliacao").focus();

            $("#prd_avaliacao").val('5'); 

            swal("Atenção!", "A avaliação é até 5", "warning")
            .then((value) => {
                $("#prd_avaliacao").focus();
            });
        }
    });

    $("#pro_quantidade").on("blur", ()=>{

        if($("#pro_quantidade").val() != '' && $("#pro_quantidade").val().includes(".")) {

            $("#pro_quantidade").focus();

            $("#pro_quantidade").val(''); 

            swal("Atenção!", "A quantidade precisa ser um número inteiro", "warning")
            .then((value) => {
                $("#pro_quantidade").focus();
            });            

        }

    })

    const setTwoNumberDecimal = (event) => {

        this.value = parseFloat(this.value).toFixed(1);

    }

    const imagemPadrao = document.getElementById('imagemPadrao');

    if(imagemPadrao){
            imagemPadrao.onchange = function(e) {
            const ext = this.value.match(/\.([^\.]+)$/)[1];

            switch (ext) {
                case 'jpg':
                case 'png':
                case 'svg':
                case 'jpeg':
                break;
                default:
                swal("Atenção!", "Arquivo selecionado não é válido", "warning")
                .then((value) => {
                    this.value = '';
                });
            }
        };
    }



  </script>

<?= $this->endSection() ?>
