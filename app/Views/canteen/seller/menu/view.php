<?= $this->extend('layout/temp'); ?>
<?= $this->section('content'); ?>
<div class="row justify-content-center">
    <div class="col-11 col-lg-9">
        <div class="card" id="canteen_user">
            <div class="card-body">
                <div class="row mb-3 justify-content-end">
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="input-group input-group-sm mb-3 w-100">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary px-3" type="button">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10%;" scope="col">No</th>
                            <th style="width: 30%;" scope="col">Nama</th>
                            <th style="width: 30%;" scope="col">Harga</th>
                            <th style="width: 20%;" scope="col">Qty</th>
                            <th style="width: 10%;" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($canteenMenu) <= 0) : ?>
                            <tr>
                                <td class="text-center" colspan="5">Menu tidak ditemukan tidak ditemukan. <a href="<?= base_url(); ?>canteen/menu/create">Tambah menu!</a></td>
                            </tr>
                        <?php else : ?>
                            <?php $i = 1; ?>
                            <?php foreach ($canteenMenu as $data) ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data['name']; ?></td>
                                <td><?= $data['price']; ?></td>
                                <td><?= $data['qty']; ?></td>
                                <td class="text-center"><a class="text-danger canteen-delete" href="/admin/canteen/<?= $data['id']; ?>"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <?php if (count($canteenMenu) > 0) : ?>
                    <?= $pager->makeLinks(($_GET['page'] ?? 1), 10, $totalData, 'bs_active'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('cssLibraries'); ?>
<?= $this->endSection(); ?>

<?= $this->section('jsLibraries'); ?>
<?= $this->endSection(); ?>

<?= $this->section('spesificFiles'); ?>
<?= $this->endSection(); ?>