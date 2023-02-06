<?= $this->extend('auth/template'); ?>
<?= $this->section('content'); ?>

<form method="POST" action="/register" id="form_register">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="first_name">First Name</label>
            <input id="first_name" type="text" class="form-control" name="first_name" autofocus>
        </div>
        <div class="form-group col-md-6">
            <label for="last_name">Last Name</label>
            <input id="last_name" type="text" class="form-control" name="last_name">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="username">Username</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                </div>
                <input id="username" type="username" class="form-control" name="username">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="phone">Phone</label>
            <input id="phone" type="text" class="form-control" name="phone">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-12">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control" name="email">
        </div>
    </div>

    <div class="form-divider">
        Address
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label>Province</label>
            <select name="province" id="province" class="form-control">
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>City</label>
            <select id="city" name="city" class="form-control use-select2" disabled>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label>Regency</label>
            <select id="regency" name="regency" class="form-control use-select2" disabled>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>District</label>
            <select id="district" name="district" class="form-control use-select2" disabled>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" class="form-control" rows="3"></textarea>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                <label class="custom-control-label" for="agree">I agree with <a href="/terms-condition">terms and conditions</a></label>
            </div>
        </div>
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block">
            Register
        </button>
    </div>
</form>

<div class="text-center mt-4 mb-3">
    <div class="text-job text-muted">Register With Social</div>
</div>
<div class="row sm-gutters">
    <div class="col-12">
        <a href="/oauth/google" class="btn btn-block btn-social btn-google text-center">
            <span class="fab fa-google"></span> Google
        </a>
    </div>
</div>
<div class="d-flex justify-content-center my-3">
    <a href="/login">Already have an account? Login!</a>
</div>

<?= $this->endSection(); ?>