<?= $this->extend('layout/temp'); ?>
<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col-md-10">
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
                            <th style="width: 30%;" scope="col">Pemilik</th>
                            <th style="width: 20%;" scope="col">Lokasi</th>
                            <th style="width: 10%;" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($canteenData) <= 0) : ?>
                            <tr>
                                <td class="text-center" colspan="5">Kantin tidak ditemukan</td>
                            </tr>
                        <?php else : ?>
                            <?php $i = 1; ?>
                            <?php foreach ($canteenData as $data) ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data['name_canteen']; ?></td>
                                <td><?= $data['first_name'] . ' ' . $data['last_name']; ?></td>
                                <td>Kampus <?= $data['location']; ?></td>
                                <td class="text-center"><a class="text-danger canteen-delete" href="/admin/canteen/<?= $data['id']; ?>"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <?php if (count($canteenData) > 0) : ?>
                    <?= $pager->makeLinks(($_GET['page'] ?? 1), 10, $totalData, 'bs_active'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('spesificFiles'); ?>
<script src="<?= base_url(); ?>js/admin/listcanteen.js"></script>
<?= $this->endSection(); ?>