<?= $this->extend('layouts/frontend/base')?>

<?= $this->section('custom-css')?> 
    
<?= $this->endSection() ?>

<?= $this->section('page-hero-section')?>

    <div class="col-lg-5">
        <div class="intro-excerpt">
            <h1><?= $product->prd_nome ?></h1>
            <small style="color: white;">Por apenas </small> <br>
            <p class="h2"><?= 'R$ ' . number_format($product->prd_preco, 2, ',', '.');  ?> </p>
            <p>Avaliação de <strong><?= $product->prd_avaliacao ?></strong> estrelas.</p>

            <p><a href="" class="btn btn-secondary me-2">Comprar agora</a></p>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="hero-img-wrap">
            <img src="<?= $productImageDefault[0]->pri_caminho_imagem . $productImageDefault[0]->pri_nome_imagem ?>" class="img-fluid">
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('page-body')?> 

        <?php if(count($productImages) > 0): ?>
		<!-- Start Testimonial Slider Produtos -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h5 class="section-title">Produtos de qualidade</h2>
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
                                <?php foreach ($productImages as $productImage): ?>
                                <div class="product-section">
                                    <div class="item">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8 mx-auto">
                                                <div class="text-center">
                                                    <img width="300px" height="300px" src="<?= $productImage->pri_caminho_imagem . $productImage->pri_nome_imagem ?>" class="img-fluid product-thumbnail">

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
        <?php endif ?>

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-8 ps-lg-8">
						<h2 class="section-title mb-4"><?= $product->prd_nome?></h2>
                        <small>Por apenas </small> <br>
                        <p class="h2"><?= 'R$ ' . number_format($product->prd_preco, 2, ',', '.');  ?> </p>
                        <p>Avaliação de <strong><?= $product->prd_avaliacao ?></strong> estrelas.</p>                        
						<p><?= $product->prd_descricao?></p>

						<p><a herf="#" class="btn btn-primary">Comprar agora</a></p>
					</div>
                    <div class="col-lg-4 ps-lg-4">
                        <img src="<?= $productImageDefault[0]->pri_caminho_imagem . $productImageDefault[0]->pri_nome_imagem ?>" class="img-fluid">
                    </div>
				</div>
			</div>
		</div>
		<!-- End We Help Section -->

<?= $this->endSection() ?>

<?= $this->section('custom-script')?> 
    
<?= $this->endSection() ?>
