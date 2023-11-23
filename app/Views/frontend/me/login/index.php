<?= $this->extend('layouts/frontend/base')?>

<?= $this->section('custom-css')?> 
    
<?= $this->endSection() ?>

<?= $this->section('page-hero-section')?>



    <div class="col-lg-5">
        <div class="intro-excerpt">
            <h1>Minha <span clsas="d-block">conta</span></h1>
            <form method="post" action="<?= route_to('front.doLogin')?>" class="row g-3">
                <div class="col-auto">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Digite seu E-Mail" required autofocus>
                </div>
                <div class="col-auto">
                    <input id="senha" type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
                    <div class="invalid-feedback">
                      Por favor, digite sua senha
                    </div>

                    <input type="submit" class="btn btn-white-outline mt-3" value="Acessar"> 
                </div>
                <div class="mt-2">
                    <div class="text-white">
                        <span>Ainda não tem conta?</span> <br>
                        <a href="#" class="link-light" onclick="habilitaCriarConta(this)">Clique aqui para criar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="hero-img-wrap">
            <img src="<?= base_url() ?>assets/frontend/images/minha-conta.png" class="img-fluid">
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('page-body')?> 


		<!-- Start We Help Section -->
		<div id="divCriarConta" class="we-help-section d-none">
			<div class="container">
                <div class="row justify-content-between">
                        <div class="col-lg-8">
                            <div class="subscription-form">
                                <h3 class="d-flex align-items-center"><span>Subscribe to Newsletter</span></h3>
                                <form action="#" class="row g-3">
                                    <div class="col-auto">
                                        <input type="text" class="form-control" placeholder="Enter your name" required>
                                    </div>
                                    <div class="col-auto">
                                        <input type="email" class="form-control" placeholder="Enter your email" required>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-primary">
                                            <span class="fa fa-paper-plane"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
			</div>
		</div>
		<!-- End We Help Section -->

<?= $this->endSection() ?>

<?= $this->section('custom-script')?>

<script>

    const habilitaCriarConta = (e)=> {

        let eleDivCriarConta = document.querySelector('#divCriarConta');

        eleDivCriarConta.classList.toggle('d-none');

        e.href = '#divCriarConta';

        toastr["success"]("Acesso realizado com sucesso.", "Sucesso!");
    }




</script>

<?php
    if(session('success')){
        echo "<script>toastr['success']('Acesso realizado com sucesso.', 'Sucesso!');</script>";
    }

    if(session('error')){
        echo "<script>toastr['warning']('Credenciais inválidas, tente novamente ou entre em contato!', 'Atenção!');</script>";
    }    
?> 


<?= $this->endSection() ?>
