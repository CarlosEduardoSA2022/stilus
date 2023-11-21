<!DOCTYPE html>
<html lang="pt-BR">

<?= $this->include('layouts/backend/head') ?>

<body>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">

        <?= $this->include('layouts/backend/navbar') ?>

        <?= $this->include('layouts/backend/sidebar') ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <?= $this->renderSection('page-title')?>
          </div>

          <div class="section-body">
            <?= $this->renderSection('page-body')?>
          </div>

        </section>
      </div>

      <?= $this->include('layouts/backend/footer') ?>

    </div>
  </div>

  <?= $this->include('layouts/backend/scripts') ?>
 
</body>
</html>