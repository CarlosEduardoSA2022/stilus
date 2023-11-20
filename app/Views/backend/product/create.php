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
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <form action="#" method="post" class="needs-validation" novalidate="">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="usr_nome">Nome</label>
                            <input id="usr_nome" name="usr_nome" type="text" class="form-control" placeholder="Nome do Usuário" tabindex="1" required autofocus>
                            <div class="invalid-feedback">
                                Por favor, digite seu Nome
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="usr_email">E-Mail</label>
                                <input id="usr_email" name="usr_email" type="email" class="form-control" placeholder="E-Mail do Usuário" tabindex="2" required>
                                <div class="invalid-feedback">
                                    Por favor, digite seu E-Mail, precisar ser um e-mail válido
                                </div>  
                            </div>
                            <div class="form-group col-md-4">
                                <label for="usr_cpf">CPF</label>
                                <input id="usr_cpf" name="usr_cpf" type="text" maxlength="14" class="form-control cpf" placeholder="CPF" tabindex="3" required>
                                <div class="invalid-feedback">
                                    Por favor, digite o CPF 
                                </div>
                            </div>
                        </div>                        

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="usr_senha">Senha</label>
                                <input id="usr_senha" name="usr_senha" type="password" class="form-control" placeholder="Senha" tabindex="4" required>
                                <div class="invalid-feedback">
                                    Por favor, digite a senha
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="senha_confirmar">Confirmação de Senha</label>
                                <input id="senha_confirmar" name="senha_confirmar" type="password" class="form-control" placeholder="Confirmar Senha" tabindex="5" required>
                                <div class="invalid-feedback">
                                    Por favor, digite a confirmação de senha
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputState">Grupo</label>
                                <select id="usr_usuario_tipo_id" name="usr_usuario_tipo_id" class="form-control" tabindex="6" required >
                                    <option value="" selected>Selecione...</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Estoquista</option>
                                    <option value="3">Cliente</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, selecione o Grupo do Usuário
                                </div>                                

                                <div style="margin-top: 20px;" class="form-check">
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
                        <input class="btn btn-primary" type="submit" value="Salvar"> | <a href="<?= route_to('back.product.index')?>">Voltar para lista</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('custom-script')?> 
    <!-- JS Libraies -->


  <!-- Page Specific JS File -->

<?= $this->endSection() ?>
