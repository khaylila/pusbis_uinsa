<?= $this->extend('layout/temp'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-body">
        <h1>Selamat datang <?= auth()->user()->username; ?> , ini adalah halaman yang muncul setelah melakukan login</h1>
        <br>
        <br>
        <a href="/logout">Tekan ini untuk logout</a>
    </div>
</div>

<?= $this->endSection(); ?>