<?= $this->extend('layouts/backend/base')?>

<?= $this->section('custom-css')?> 
    <!-- CSS Libraries -->

<?= $this->endSection() ?>

<?= $this->section('page-title')?> 
    <h1>Usuário</h1>    
<?= $this->endSection() ?>

<?= $this->section('page-body')?> 

    <h2 class="section-title">Adicionar Usuário</h2>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <form action="<?= route_to('back.user.store') ?>" method="post" class="needs-validation" novalidate="">
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
                        <input class="btn btn-primary" type="submit" value="Salvar"> | <a href="<?= route_to('back.user.index')?>">Voltar para lista</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('custom-script')?> 
    <!-- JS Libraies -->
    <script src="<?= base_url() ?>assets/backend/modules/jquery-mask/jquery.mask.min.js"></script>

    <script>

        $('.cpf').mask('000.000.000-00', {reverse: true});

        $("#usr_cpf").on("blur", ()=>{

            if($("#usr_cpf").val() != '' && !isCpf($("#usr_cpf").val())){

                $("#usr_cpf").focus();

                $("#usr_cpf").val('');

                swal("Atenção!", "Precisa ser um CPF válido!", "warning")
                .then((value) => {
                    $("#usr_cpf").focus();
                });
            }

        });

        $("#senha_confirmar").on("blur", ()=>{
            const senhaDigitada = $('#usr_senha').val().trim();
            const senhaComparar = $('#senha_confirmar').val().trim();
            
            if(senhaDigitada != '' && senhaComparar != '' && senhaDigitada != senhaComparar){

                swal("Atenção!", "As senhas devem ser iguais!", "warning")
                .then((value) => {

                    $("#usr_senha").focus();

                    $('#usr_senha').val('');

                    $('#senha_confirmar').val('');

                });                
            }
        })

        function isCpf(cpf) {
            exp = /\.|-/g;
            cpf = cpf.toString().replace(exp, "");
            var digitoDigitado = eval(cpf.charAt(9) + cpf.charAt(10));
            var soma1 = 0,
                    soma2 = 0;
            var vlr = 11;
            for (i = 0; i < 9; i++) {
                soma1 += eval(cpf.charAt(i) * (vlr - 1));
                soma2 += eval(cpf.charAt(i) * vlr);
                vlr--;
            }
            soma1 = (((soma1 * 10) % 11) === 10 ? 0 : ((soma1 * 10) % 11));
            soma2 = (((soma2 + (2 * soma1)) * 10) % 11);
            if (cpf === "11111111111" || cpf === "22222222222" || cpf === "33333333333" || cpf === "44444444444" || cpf === "55555555555" || cpf === "66666666666" || cpf === "77777777777" || cpf === "88888888888" || cpf === "99999999999" || cpf === "00000000000") {
                var digitoGerado = null;
            } else {
                var digitoGerado = (soma1 * 10) + soma2;
            }
            if (digitoGerado !== digitoDigitado) {
                return false;
            }
            return true;
        }

    </script>

  <!-- Page Specific JS File -->

<?= $this->endSection() ?>
