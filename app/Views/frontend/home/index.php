<?= $this->extend('layouts/frontend/base')?>

<?= $this->section('custom-css')?> 
    
<?= $this->endSection() ?>

<?= $this->section('page-hero-section')?>

    <div class="col-lg-5">
        <div class="intro-excerpt">
            <h1>Loja <span clsas="d-block">Moderna de sofá e poltronas</span></h1>
            <p class="mb-4">Seu cantinho com sua cara na <strong>Stilus</strong> você encontra muitas opções para dar aquele estilo para sua sala.</p>
            <p><a href="" class="btn btn-secondary me-2">Ver todos produtos</a></p>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="hero-img-wrap">
            <img src="<?= base_url() ?>assets/frontend/images/couch.png" class="img-fluid">
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('page-body')?> 

		<!-- Start Testimonial Slider Produtos -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Produtos em destaque</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">
                                <?php foreach ($productsDefault as $product): ?>
                                <div class="product-section">
                                    <div class="item">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8 mx-auto">
                                                <div class="text-center">
                                                    <a class="product-item" href="#">
                                                        <img src="<?= $product->pri_caminho_imagem . $product->pri_nome_imagem ?>" class="img-fluid product-thumbnail">
                                                        <h3 class="product-title"><?= $product->prd_nome ?></h3>
                                                        <strong class="product-price"><?= 'R$ ' . number_format($product->prd_preco, 2, ',', '.');  ?></strong>

                                                        <span class="icon-cross">
                                                            <img src="<?= base_url() ?>assets/frontend/images/cross.svg" class="img-fluid">
                                                        </span>
                                                    </a>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <!-- END item -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="<?= base_url() ?>assets/frontend/images/img-grid-1.jpg" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="<?= base_url() ?>assets/frontend/images/img-grid-2.jpg" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="<?= base_url() ?>assets/frontend/images/img-grid-3.jpg" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4">Nós ajudamos você a criar um design de interiores moderno</h2>
						<p>Mussum Ipsum, cacilds vidis litro abertis.  Si num tem leite então bota uma pinga aí cumpadi! Delegadis gente finis, bibendum egestas augue arcu ut est. Nullam volutpat risus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio. Quem manda na minha terra sou euzis!</p>

						<ul class="list-unstyled custom-list my-4">
							<li>Quem manda na minha terra sou euzis!</li>
							<li>Quem manda na minha terra sou euzis!</li>
                            <li>Si num tem leite então bota uma pinga aí cumpadi!</li>
							<li>Si num tem leite então bota uma pinga aí cumpadi!</li>
						</ul>
						<p><a herf="#" class="btn">Ver mais...</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- End We Help Section -->

<?= $this->endSection() ?>

<?= $this->section('custom-script')?> 
    
<?= $this->endSection() ?>
