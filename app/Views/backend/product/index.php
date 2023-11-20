<?= $this->extend('layouts/backend/base')?>

<?= $this->section('custom-css')?> 
    <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

<?= $this->endSection() ?>

<?= $this->section('page-title')?> 
    <h1>Produtos</h1>    
<?= $this->endSection() ?>

<?= $this->section('page-body')?> 

    <h2 class="section-title">Lista de produtos</h2>

    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= route_to('back.user.create')?>" class="btn btn-primary btn-icon icon-left">
                    <i class="fas fa-plus"></i>Novo Produto
                </a>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table id="tblRegister" class="table table-striped">
                <thead>                                 
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($products as $product): ?>
                        <tr>
                            <td><?= $product->prd_id ?></td>
                            <td><?= $product->prd_nome ?></td>
                            <td><?= $product->prd_quantidade ?></td>
                            <td><?= 'R$ ' . number_format($product->prd_preco, 2, ',', '.') ?></td>
                            <td><?= $product->prd_ativo ?></td>

                            <td>
                                <a href="#" class="btn btn-secondary">Alterar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('custom-script')?> 
  <!-- JS Libraies -->
  <script src="<?= base_url()?>assets/backend/modules/datatables/datatables.min.js"></script>
  <script src="<?= base_url()?>assets/backend/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url()?>assets/backend/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>

  <!-- Page Specific JS File -->
  <?= $this->include('backend/product/inc/_index'); ?>

<?= $this->endSection() ?>
