<?= $this->extend('layout/temp'); ?>
<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col-12 col-lg-10">
        <div class="card" id="add_canteen">
            <div class="card-body p-3">
                <form action="/admin/canteen" method="POST" id="form_canteenadd">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-uppercase font-weight-bold" for="canteen_name">Nama Kantin</label>
                                <input type="text" class="form-control" id="canteen_name" name="canteen_name" placeholder="Masukkan nama kantin" autofocus required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-uppercase font-weight-bold" for="first_name">Nama Depan</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Masukkan nama depan" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-uppercase font-weight-bold" for="last_name">Nama Belakang</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Masukkan nama belakang" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="text-uppercase font-weight-bold" for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="text-uppercase font-weight-bold" for="phone_number">Nomor Telpon</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputgroup_phonenumber">+62</span>
                                    </div>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Masukkan nomor telpon" aria-describedby="inputgroup_phonenumber" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="text-uppercase font-weight-bold" for="location">Lokasi</label>
                                <select class="custom-select" id="location" name="location" required>
                                    <option selected disabled value="">Pilih...</option>
                                    <option value="1">Kampus 1</option>
                                    <option value="2">Kampus 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="small">*User password akan dikirimkan melalui email</p>
                        </div>
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-success">Tambah Kantin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('spesificFiles'); ?>
<script src="<?= base_url(); ?>js/admin/addcanteen.js"></script>
<?= $this->endSection(); ?>