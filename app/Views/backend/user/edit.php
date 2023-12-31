<?= $this->extend('layouts/backend/base')?>

<?= $this->section('custom-css')?> 
    <!-- CSS Libraries -->

<?= $this->endSection() ?>

<?= $this->section('page-title')?> 
    <h1>Usuário</h1>    
<?= $this->endSection() ?>

<?= $this->section('page-body')?> 

    <h2 class="section-title">Alterar usuário </h2>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <form action="<?= route_to('back.user.update') ?>" method="post" class="needs-validation" novalidate="">
                    <input type="hidden" value="<?= $user->usr_id?>" name="usr_id">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="usr_nome">Nome</label>
                            <input id="usr_nome" name="usr_nome" value="<?= $user->usr_nome?>" type="text" class="form-control" placeholder="Nome do Usuário" tabindex="1" required autofocus>
                            <div class="invalid-feedback">
                                Por favor, digite seu Nome
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="usr_email">E-Mail</label>
                                <input id="usr_email" name="usr_email" value="<?= $user->usr_email?>" type="email" class="form-control" placeholder="E-Mail do Usuário" tabindex="2" disabled>
                                <div class="invalid-feedback">
                                    Por favor, digite seu E-Mail, precisar ser um e-mail válido
                                </div>  
                            </div>
                            <div class="form-group col-md-4">
                                <label for="usr_cpf">CPF</label>
                                <input id="usr_cpf" name="usr_cpf" value="<?= $user->usr_cpf?>" type="text" maxlength="14" class="form-control cpf" placeholder="CPF" tabindex="3" required>
                                <div class="invalid-feedback">
                                    Por favor, digite o CPF 
                                </div>
                            </div>
                        </div>                        

                        <div class="form-group mb-3">
                            <div class="form-check">
                                <input type="hidden" name="alterPassword" value="0">
                                <input class="form-check-input" type="checkbox" id="alterPassword" name="alterPassword">
                                <label class="form-check-label" for="alterPassword">
                                Alterar senha?
                                </label>
                            </div>
                        </div>

                        <div id="divSenha" class="form-row d-none">
                            <div class="form-group col-md-6">
                                <label for="usr_senha">Senha</label>
                                <input id="usr_senha" name="usr_senha" type="password" class="form-control" placeholder="Senha" tabindex="4">
                                <div class="invalid-feedback">
                                    Por favor, digite a senha
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="senha_confirmar">Confirmação de Senha</label>
                                <input id="senha_confirmar" name="senha_confirmar" type="password" class="form-control" placeholder="Confirmar Senha" tabindex="5">
                                <div class="invalid-feedback">
                                    Por favor, digite a confirmação de senha
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputState">Grupo</label>
                                <select id="usr_usuario_tipo_id" name="usr_usuario_tipo_id" class="form-control" tabindex="6" required >
                                    <option value="">Selecione...</option>
                                    <option value="1" <?= $user->usr_usuario_tipo_id == 1 ? 'selected' : ''?> >Administrador</option>
                                    <option value="2" <?= $user->usr_usuario_tipo_id == 2 ? 'selected' : ''?>>Estoquista</option>
                                    <option value="3" <?= $user->usr_usuario_tipo_id == 3 ? 'selected' : ''?>>Cliente</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, selecione o Grupo do Usuário
                                </div>                                

                                <div style="margin-top: 20px;" class="form-check">
                                    <input type="hidden" name="usr_ativo" value="0">
                                    
                                    <input id="usr_ativo" name="usr_ativo" class="form-check-input" type="checkbox" <?= $user->usr_ativo == 1 ? 'checked' : ''?>>
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

        $('#alterPassword').change(() =>{
            if($('#alterPassword').is(":checked")) {

                $("#usr_senha").attr("required", "req");

                $("#senha_confirmar").attr("required", "req");              

                $("#divSenha").removeClass("d-none");

            }else{

                $('#usr_senha').val('');

                $('#senha_confirmar').val('');

                $("#usr_senha").removeAttr("required");

                $("#senha_confirmar").removeAttr("required");

                $("#divSenha").addClass("d-none");
            }
        })

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
