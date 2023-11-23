<script src="<?= base_url() ?>assets/frontend/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/tiny-slider.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/custom.js"></script>

<script src="<?= base_url() ?>assets/backend/modules/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/plugins/toastr/js/toastr.min.js"></script>

<script>
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>

<!-- Custom Script -->
<?= $this->renderSection('custom-script')?>