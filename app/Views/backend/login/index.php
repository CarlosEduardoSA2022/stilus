<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="<?= csrf_token();?>" content="<?= csrf_hash();?>" class="csrf">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Stilus</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/css/style.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?= base_url()?>assets/backend/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login de usuário</h4></div>

              <div class="card-body">
                <form method="post" action="<?= route_to('doLogin')?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Por favor, digite seu e-mail
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="senha" class="control-label">Senha</label>
                    </div>
                    <input id="senha" type="password" class="form-control" name="senha" tabindex="2" required>
                    <div class="invalid-feedback">
                        Por favor, digite a sua senha
                    </div>
                  </div>

                  <?php
                    if(session('mensagem')){ echo session('mensagem');}?>                  

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                  
                </form>
              </div>
            </div>

            <div class="simple-footer">
              Copyright &copy; Stilus <?= date('Y')?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url()?>assets/backend/modules/jquery.min.js"></script>
  <script src="<?= base_url()?>assets/backend/modules/popper.js"></script>
  <script src="<?= base_url()?>assets/backend/modules/tooltip.js"></script>
  <script src="<?= base_url()?>assets/backend/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url()?>assets/backend/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url()?>assets/backend/modules/moment.min.js"></script>
  <script src="<?= base_url()?>assets/backend/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?= base_url()?>assets/backend/js/scripts.js"></script>
  <script src="<?= base_url()?>assets/backend/js/custom.js"></script>
</body>
</html>