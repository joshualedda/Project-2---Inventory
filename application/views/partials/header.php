  <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventory</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/images/logos/favicon.png'); ?>" />
  <!-- <link rel="stylesheet" href="<?= base_url('assets/css/styles.min.css'); ?>" /> -->
  <link rel="stylesheet" href="<?= base_url('assets/css/styles.css'); ?>" />

  <!-- Main Css for additional components -->
  <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>" />


  <!-- End Test -->
  <!-- <link rel="icon" href="?= base_url('assets/images/logo.png'); ?>" type="image/x-icon"> -->

  <!-- Icon Boxicon -->
  <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">

  <!-- Datatable -->
  <!-- Style -->

  <link rel="stylesheet" href="<?= base_url('assets/css/dataTables.bootstrap5.min.css') ?>" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="<?= base_url('assets/js/jquery-3.5.1.js') ?>"></script>
  <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/dataTables.bootstrap5.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>


  <!-- forms JQUERY -->
  <script src="<?= base_url('assets/js/forms/refferences.js ') ?>"></script>

  <!-- Select Filter -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>


  <!-- Charts Nice Admin -->

  <script src="<?= base_url('assets/vendor/chart.js/chart.umd.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/apexcharts/apexcharts.min.js') ?>"></script>


  <!-- Datatable for Nice Admin -->
  <!-- Not yet deployed -->
  <!-- <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> -->



  <script>
    $(document).ready(function() {
      $('#datatable').DataTable();
    });
  </script>



  <style>
    /* Custom scrollbar styles */
    .scroll-sidebar {
      position: relative;
      height: 100%;
      overflow: hidden;
    }

    .scroll-sidebar::-webkit-scrollbar {
      width: 3px;
      height: 3px;
    }

    .scroll-sidebar::-webkit-scrollbar-track {
      background: #f1f1f1;
      /* Track color */
    }

    .scroll-sidebar::-webkit-scrollbar-thumb {
      background: #888;
      /* Scrollbar color */
      border-radius: 10px;
    }

    .scroll-sidebar::-webkit-scrollbar-thumb:hover {
      background: #555;
      /* Scrollbar color on hover */
    }

    .scroll-sidebar::-webkit-scrollbar-corner {
      background: transparent;
    }

    #main {
      padding: 20px 30px;
      transition: all 0.3s;
    }

    .main-container {
      margin-top: 80px;
    }

    @media (max-width: 1199px) {
      #main {
        padding: 20px;
      }
    }

    .nav-content {
      max-height: 0;
      /* Start with a height of 0 */
      opacity: 0;
      /* Start with opacity 0 */
      overflow: hidden;
      /* Hide overflow to prevent content from showing */
      transition: max-height 0.3s ease, opacity 0.3s ease;
      /* Smooth transition */
    }

    .nav-content.show {
      max-height: 1000px;
      /* Arbitrary large value to allow content expansion */
      opacity: 1;
      /* Fade in the content */
    }

    .nav-small-cap-icon {
      transition: transform 0.3s ease;
      /* Smooth rotation */
    }

    .nav-small-cap-icon.rotate {
      transform: rotate(180deg);
      /* Rotate the icon */
    }


    /* For Inputs */
    .custom-select {
      padding: 5px 5px;
      border-radius: 7px;
      border-color: gainsboro;

    }
  </style>
</head>

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">