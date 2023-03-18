<?= $this->extend('auth/template'); ?>
<?= $this->section('content'); ?>

<p class="text-muted">Don't worry, we'll send a new password to your email.</p>
<form method="POST" action="/forgot-password" id="form_reset" class="mb-3">
    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control" name="email" tabindex="1" required="" autofocus="">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
            Forgot Password
        </button>
    </div>
</form>


<div class="d-flex justify-content-center my-3">
    <a href="/login">Remember your password? Login!</a>
</div>

<?= $this->endSection(); ?>