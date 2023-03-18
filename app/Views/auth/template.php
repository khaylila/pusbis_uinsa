<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?> &mdash; Pusat Bisnis UINSA</title>


    <?php if ($title != 'Login') : ?>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php endif; ?>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="./assets/stisla/css/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="./assets/stisla/css/style.css">
    <link rel="stylesheet" href="./assets/stisla/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-10 <?= $title == "Register" ? "col-md-8 col-lg-8 col-xl-8" : "col-md-6 col-lg-4"; ?>">
                        <div class="login-brand">
                            <img src="img/uinsa-logo-md.png" alt="logo" width="100" class="shadow rounded-circle">
                        </div>

                        <div class="card card-primary" id="auth">
                            <div class="card-header">
                                <h4><?= $title; ?></h4>
                            </div>

                            <div class="card-body">
                                <?= $this->renderSection('content'); ?>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="d-flex justify-content-center my-3">
                    <a href="/"><span class="fas fa-arrow-left"></span> Back</a>
                </div>
                <div class="simple-footer">
                    Copyright <?= date('Y'); ?> &copy; <a href="https://pusbis.uinsa.ac.id">Pusat Bisnis UINSA</a>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="./assets/stisla/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if ($title == "Register") : ?>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <?php endif; ?>

    <!-- Template JS File -->
    <script src="./assets/stisla/js/scripts.js"></script>
    <script src="./assets/stisla/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <?php foreach ($scripts as $script) : ?>
        <script src="<?= $script; ?>"></script>
    <?php endforeach; ?>
</body>

</html>