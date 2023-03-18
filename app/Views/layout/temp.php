<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?> &mdash; Pusat Bisnis UINSA</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS Libraries -->
    <?= $this->renderSection('cssLibraries') ?>

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/stisla/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/stisla/css/components.css">

    <!-- <style>
        .select2-selection__choice__display {
            color: gray;
        }
    </style> -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?= $this->include('layout/navbar'); ?>
            <?= $this->include('layout/sidebar'); ?>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1><?= $title; ?></h1>
                        <div class="section-header-breadcrumb">
                            <?php foreach ($breadcrumbs as $breadcrumb) : ?>
                                <div class="breadcrumb-item <?= ($breadcrumb['active'] ?? false) ? 'active' : ''; ?>"><a <?= ($breadcrumb['link'] ?? false) ? ' href="' . $breadcrumb['link'] . '"' : ""; ?> <?= ($breadcrumb['active'] ?? false) ? 'aria-current="page"' : ''; ?>><?= $breadcrumb['title']; ?></a></div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="section-body">
                        <?= $this->renderSection('content'); ?>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; <?= date('Y'); ?> <a href="https://pusbis.uinsa.ac.id/">Pusat Bisnis UINSA</a>. All right reserved.
                </div>
                <div class="footer-right">
                    v1.0-rc
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url(); ?>assets/stisla/js/stisla.js"></script>

    <!-- JS Libraies -->
    <?= $this->renderSection('jsLibraries') ?>

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>assets/stisla/js/scripts.js"></script>
    <script src="<?= base_url(); ?>assets/stisla/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <?= $this->renderSection('spesificFiles') ?>
</body>

</html>