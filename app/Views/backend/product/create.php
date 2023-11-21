<?= $this->extend('layouts/backend/base')?>

<?= $this->section('custom-css')?> 
    <!-- CSS Libraries -->

<?= $this->endSection() ?>

<?= $this->section('page-title')?> 
    <h1>Produto</h1>    
<?= $this->endSection() ?>

<?= $this->section('page-body')?> 

    <h2 class="section-title">Adicionar Produto</h2>

    <div class="row">
        <div class="col-12 col-md-8 col-lg-8">
            <div class="card">
                <form action="<?= route_to('back.product.store')?>" method="post" class="needs-validation" novalidate=""  enctype="multipart/form-data">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="prd_nome">Nome</label>
                            <input id="prd_nome" name="prd_nome" type="text" class="form-control" placeholder="Nome do Produto" maxlength="200" tabindex="1" required autofocus>
                            <div class="invalid-feedback">
                                Por favor, digite o Nome do Produto
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="prd_preco">Preço</label>
                                <input id="prd_preco" name="prd_preco" class="form-control money" type="text" tabindex="2" required/>
                                <div class="invalid-feedback">
                                    Por favor, digite o Preço do Produto
                                </div>                                
                            </div>

                            <div class="form-group col-md-2">
                                <label for="prd_avaliacao">Avaliação</label>
                                <input id="prd_avaliacao" name="prd_avaliacao" type="number" class="form-control" onchange="setTwoNumberDecimal" min="1" max="5" step="0.5"  tabindex="3"/>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="prd_quantidade">Quantidade</label>
                                <input id="prd_quantidade" name="prd_quantidade" class="form-control" value="0" min="0" type="number" tabindex="4" />
                            </div>                            
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea id="prd_descricao" name="prd_descricao" class="form-control" maxlength="2000" tabindex="5"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="section-title">Imagem do Padão</div>
                                <input id="imagemPadrao" name="imagemPadrao" type="file" accept="image/*" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <div class="section-title">Imagens do Produto</div>
                                <input id="imagensProduto" name="imagensProduto" type="file" accept="image/*" multiple class="form-control">
                            </div>
                        </div>   -->

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                   <div class="form-check">
                                    <input type="hidden" name="usr_ativo" value="1">
                                    <input id="usr_ativo" name="usr_ativo" class="form-check-input" type="checkbox" checked disabled>
                                    <label class="form-check-label" for="usr_ativo">
                                        Ativo
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php
                        if(session('mensagem')){ echo session('mensagem');}

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
  <script>
    $('.money').mask('000.000.000.000.000,00', {reverse: true});

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

    imagemPadrao.onchange = function(e) {
        const ext = this.value.match(/\.([^\.]+)$/)[1];

        switch (ext) {
            case 'jpg':
            case 'bmp':
            case 'png':
            case 'tif':
            break;
            default:
            swal("Atenção!", "Arquivo selecionado não é válido", "warning")
            .then((value) => {
                this.value = '';
            });
        }
    };

  </script>

<?= $this->endSection() ?>
