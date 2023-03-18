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
                            <div class="wizard-step">
                                <div class="wizard-step-icon">
                                    <i class="fas fa-store"></i>
                                </div>
                                <div class="wizard-step-label">
                                    Informasi Kantin
                                </div>
                            </div>
                            <div class="wizard-step wizard-step-active">
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
                                <div class="form-group row justify-content-center">
                                    <label for="cashOnDelivery" class="col-4">Cash On Delivery</label>
                                    <div class="col-1">
                                        <input class="form-check-input" type="checkbox" id="cashOnDelivery" value="cashOnDelivery">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="hidden" name="type" value="paymentMethod">
                            <button type="submit" class="btn btn-primary">Save <i class="fas fa-save"></i></button>
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