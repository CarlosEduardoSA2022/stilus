<head>
  <meta charset="UTF-8">
  <meta name="<?= csrf_token();?>" content="<?= csrf_hash();?>" class="csrf">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Stilus</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/components.css">

  <!-- Custom CSS -->
<?= $this->renderSection('custom-css')?>

</head>