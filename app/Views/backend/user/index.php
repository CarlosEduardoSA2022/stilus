<?= $this->extend('layouts/backend/base')?>

<?= $this->section('custom-css')?> 
    <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

<?= $this->endSection() ?>

<?= $this->section('page-title')?> 
    <h1>Usuários</h1>    
<?= $this->endSection() ?>

<?= $this->section('page-body')?> 

    <h2 class="section-title">Lista de usuários</h2>

    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= route_to('back.user.create')?>" class="btn btn-primary">Novo Usuário</a>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table id="tblUser" class="table table-striped">
                <thead>                                 
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>E-Mail</th>
                        <th>CPF</th>
                        <th>Grupo</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($users as $user): ?>
                        <tr>
                            <td><?= $user->usr_id ?></td>
                            <td><?= $user->usr_nome ?></td>
                            <td><?= $user->usr_email ?></td>
                            <td><?= $user->usr_cpf ?></td>

                            <td>
                                <?= $user->usr_usuario_tipo_id == 1 ? 'Administrador' :  (($user->usr_usuario_tipo_id == 2) ? 'Estoquista' : 'Cliente')?>
                            </td>

                            <td>
                                <?php if($user->usr_id != session('userInfo')->usr_id): ?>
                                <div class="form-check">
                                    <input id="<?= $user->usr_id ?>" onclick="activeUser(this, <?= $user->usr_id ?>)" <?= $user->usr_ativo == 1 ? 'Checked' : '' ?> class="form-check-input" type="checkbox">
                                </div>
                                <?php endif;?>
                            </td>

                            <td><a href="#" class="btn btn-secondary">Alterar</a></td>
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
  <?= $this->include('backend/user/inc/_index'); ?>
  <?= $this->include('backend/user/inc/_update'); ?>

<?= $this->endSection() ?>
