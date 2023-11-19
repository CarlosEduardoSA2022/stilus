<?= $this->extend('layouts/backend/base')?>

<?= $this->section('custom-css')?> 
    
<?= $this->endSection() ?>

<?= $this->section('page-title')?> 
    <h1>Página Inicial</h1>    
<?= $this->endSection() ?>

<?= $this->section('page-body')?> 

    <h2 class="section-title">Stilus</h2>
    <p class="section-lead">A Stilus é isso e aquilo!</p>
    <div class="card">
        <div class="card-header">
            <h4>Comunicado</h4>
        </div>
        <div class="card-body">
            <p>Está avisado {*-*} .</p>

            <p>Está Logado: <?= session('loggedIn');?></p>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('custom-script')?> 
    
<?= $this->endSection() ?>
