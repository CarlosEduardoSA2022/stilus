<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="<?= route_to('front.index')?>">Stilus<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= route_to('front.index')?>">Home</a>
                </li>
                <li><a class="nav-link" href="#">Produtos</a></li>
                <li><a class="nav-link" href="#">Sobre</a></li>
                <li><a class="nav-link" href="#">Contato</a></li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li>
                    <a class="nav-link" href="cart.html"><img src="<?= base_url() ?>assets/frontend/images/cart.svg"></a>
                </li>

                <?php if(session()->has('loggedIn')) : ?>
                <li> 
                    <span class="nav-link"><?= session('userInfo')->usr_nome ?></span>
                </li>
                <?php endif; ?>

                <?php if(!session()->has('loggedIn')) : ?>
                <li>
                    <a class="nav-link" href="<?= route_to('front.me.login') ?>"><img src="<?= base_url() ?>assets/frontend/images/user.svg"></a>
                </li>
                <?php else: ?>
                <li title="Sair da Loja">
                    <a class="nav-link" href="<?= route_to('front.doLogout') ?>"><img src="<?= base_url() ?>assets/frontend/images/exit.png"></a>
                </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>