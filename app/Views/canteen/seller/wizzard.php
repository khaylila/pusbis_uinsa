<?= $this->extend('layout/temp'); ?>
<?= $this->section('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4>Create New App</h4>
            </div>
            <div class="card-body">
                <div class="row mt-4">
                    <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="wizard-steps">
                            <div class="wizard-step wizard-step-active">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Data Penjual
                                </div>
                            </div>
                            <div class="wizard-step">
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

                <form class="wizard-content mt-2">
                    <div class="wizard-pane">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="section-title mt-0">Data Penjual</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">Nama Depan</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Nama Belakang</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="phone">Nomor Telepon</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputgroup_phonenumber">+62</span>
                                                </div>
                                                <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Masukkan nomor telpon" aria-describedby="inputgroup_phonenumber" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="name_canteen">Nama Kantin</label>
                                    <input type="text" class="form-control" name="name_canteen" id="name_canteen">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="logo_canteen">Logo Kantin</label>
                                    <input type="file" class="form-control" name="logo_canteen" id="logo_canteen">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Next <i class="fas fa-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>