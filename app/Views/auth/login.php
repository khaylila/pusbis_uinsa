<?= $this->extend('auth/template'); ?>
<?= $this->section('content'); ?>

<form method="POST" action="login" id="form_login" class="needs-validation" novalidate="">
    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus autocomplete="email">
    </div>

    <div class="form-group">
        <div class="d-block">
            <label for="password" class="control-label">Password</label>
            <div class="float-right">
                <a href="/forgot-password" class="text-small">
                    Forgot Password?
                </a>
            </div>
        </div>
        <input id="password" type="password" class="form-control" name="password" tabindex="2" required autocomplete="password">
    </div>

    <div class="form-group">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember">
            <label class="custom-control-label" for="remember">Remember Me</label>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
            Login
        </button>
    </div>
</form>
<div class="text-center mt-4 mb-3">
    <div class="text-job text-muted">Login With Social</div>
</div>
<div class="row sm-gutters">
    <div class="col-12">
        <a href="/oauth/google" class="btn btn-block btn-social btn-google text-center">
            <span class="fab fa-google"></span> Google
        </a>
    </div>
</div>
<div class="d-flex justify-content-center my-3">
    <a href="/register">Create an Account!</a>
</div>

<?= $this->endSection(); ?>