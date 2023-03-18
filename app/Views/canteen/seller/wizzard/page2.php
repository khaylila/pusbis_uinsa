<?= $this->extend('layout/temp'); ?>
<?= $this->section('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card" id="setup_wizzard">
            <div class="card-body">
                <div class="row mt-4">
                    <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="wizard-steps">
                            <div class="wizard-step">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Data Penjual
                                </div>
                            </div>
                            <div class="wizard-step wizard-step-active">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-store"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Informasi Kantin
                                </div>
                            </div>
                            <div class="wizard-step">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-receipt"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Metode Pembayaran
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form class="wizard-content mt-2" action="/setup-wizzard" method="POST" id="form_setup_wizzard">
                    <div class="wizard-pane">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="section-title mt-0">Informasi Kantin</div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name_canteen">Nama Kantin</label>
                                            <input type="text" class="form-control" name="name_canteen" id="name_canteen" value="<?= $canteenData['name']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="lokasi_kantin">Lokasi Kantin</label>
                                            <select class="custom-select" id="lokasi_kantin">
                                                <option value="<?= $canteenData['location']; ?>" selected disabled>Kampus <?= $canteenData['location']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="logo_kantin">Logo Kantin</label>
                                            <input type="file" class="form-control" name="logo_kantin" id="logo_kantin" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="text-dark d-md-none">Preview</label>
                                        <div class="d-flex justify-content-center">
                                            <img src="/img/<?= $canteenData['logo_kantin'] ?? 'upload-thumb.png'; ?>" class="img-thumbnail" alt="Logo Kantil Preview">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="hidden" name="type" value="dataCanteen">
                            <button type="submit" class="btn btn-primary">Next <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('spesificFiles'); ?>
<script src="<?= base_url(); ?>js/wizzard.js"></script>
<?= $this->endSection(); ?>