</div>

</div>

<!-- Charts -->
<script src="<?= base_url('assets/js/charts.js'); ?>"></script>




<script src="<?= base_url('assets/js/main.js'); ?>"></script>
<script src="<?= base_url('assets/js/index.js'); ?>"></script>


<!-- <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script> -->
<!-- <script src="<?= base_url('assets/libs/simplebar/dist/simplebar.js'); ?>"></script> -->
<!-- Js -->
<script src="<?= base_url('assets/js/app.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sidebarmenu.js'); ?>"></script>
<script src="<?= base_url('assets/js/dashboard.js'); ?>"></script>

<!-- Additional -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Forms -->
<script src="<?= base_url('assets/js/forms.js') ?>"></script>

<!-- Toast Notifications Script -->
<script>
$(document).ready(function() {
    // Configure toastr
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
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
    };

    // Check for flash data and show toast
    <?php if ($this->session->flashdata('toast_message')): ?>
        var message = '<?= $this->session->flashdata('toast_message') ?>';
        var type = '<?= $this->session->flashdata('toast_type') ?: 'info' ?>';
        
        switch(type) {
            case 'success':
                toastr.success(message);
                break;
            case 'error':
                toastr.error(message);
                break;
            case 'warning':
                toastr.warning(message);
                break;
            case 'info':
            default:
                toastr.info(message);
                break;
        }
    <?php endif; ?>
});
</script>

</body>

</html>