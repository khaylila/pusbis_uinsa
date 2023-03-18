<?= $this->extend('layout/temp'); ?>
<?= $this->section('content'); ?>
<div class="row justify-content-center">
    <div class="col-11 col-lg-9">
        <div class="card" id="addCanteen">
            <div class="card-body p-3">
                <form action="/canteen/menu" method="POST" id="formAddCanteen">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="menuName">Nama Menu</label>
                                        <input type="text" class="form-control" id="menuName" name="menuName" placeholder="Masukkan nama menu" autofocus required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="menuType">Type</label>
                                        <select class="form-control" id="menuType" name="menuType">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="menuQty">Kuantitas</label>
                                        <input type="number" class="form-control" id="menuQty" name="menuQty" placeholder="Masukkan jumlah kuantitas" autofocus required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="menuPrice">Harga Menu</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupMenuPrice">Rp</span>
                                            </div>
                                            <input type="number" class="form-control" id="menuPrice" name="menuPrice" placeholder="Masukkan Harga Menu" aria-describedby="inputGroupMenuPrice" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="menuCategories">Kategori</label>
                                        <select class="form-control" id="menuCategories" name="menuCategories" multiple>
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="menuDesc">Deskripsi Menu</label>
                                        <textarea rows="15" class="form-control h-100" name="menuDesc" id="menuDesc" placeholder="Masukkan deskripsi menu" required=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="menuPoster1">Gambar Menu 1</label>
                                        <input type="file" class="form-control" name="menuPoster1" id="menuPoster1" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="text-dark d-md-none">Preview</label>
                                    <div class="d-flex justify-content-center">
                                        <img src="/img/<?= $canteenData['menuPoster'][0] ?? 'upload-thumb.png'; ?>" class="img-thumbnail" id="previewMenuPoster1" alt="Menu Preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="menuPoster2">Gambar Menu 2</label>
                                        <input type="file" class="form-control" name="menuPoster2" id="menuPoster2">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="text-dark d-md-none">Preview</label>
                                    <div class="d-flex justify-content-center">
                                        <img src="/img/<?= $canteenData['menuPoster'][1] ?? 'upload-thumb.png'; ?>" class="img-thumbnail" id="previewMenuPoster2" alt="Menu Preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="menuPoster3">Gambar Menu 3</label>
                                        <input type="file" class="form-control" name="menuPoster3" id="menuPoster3">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="text-dark d-md-none">Preview</label>
                                    <div class="d-flex justify-content-center">
                                        <img src="/img/<?= $canteenData['menuPoster'][2] ?? 'upload-thumb.png'; ?>" class="img-thumbnail" id="previewMenuPoster3" alt="Menu Preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="menuPoster4">Gambar Menu 4</label>
                                        <input type="file" class="form-control" name="menuPoster4" id="menuPoster4">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="text-dark d-md-none">Preview</label>
                                    <div class="d-flex justify-content-center">
                                        <img src="/img/<?= $canteenData['menuPoster'][3] ?? 'upload-thumb.png'; ?>" class="img-thumbnail" id="previewMenuPoster4" alt="Menu Preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-primary">Save <i class="fas fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('cssLibraries'); ?>
<link href="/assets/select2/select2.min.css" rel="stylesheet" />
<?= $this->endSection(); ?>

<?= $this->section('jsLibraries'); ?>
<script src="/assets/select2/select2.full.min.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('spesificFiles'); ?>
<script src="<?= base_url(); ?>js/seller/addcanteen.js"></script>
<?= $this->endSection(); ?>