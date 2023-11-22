<!doctype html>
<html lang="pt-br">

    <?= $this->include('layouts/frontend/head') ?>

	<body>
		<!-- Start Header/Navigation -->

        <?= $this->include('layouts/frontend/navbar') ?>

		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">

                        <?= $this->renderSection('page-hero-section')?>

					</div>
				</div>
			</div>
		<!-- End Hero Section -->

        <!-- Page body  Section -->

        <?= $this->renderSection('page-body')?>

        <!-- End Page body -->

		<!-- Start Footer Section -->

        <?= $this->include('layouts/frontend/footer') ?>

		<!-- End Footer Section -->	

        <?= $this->include('layouts/frontend/scripts') ?>

	</body>

</html>