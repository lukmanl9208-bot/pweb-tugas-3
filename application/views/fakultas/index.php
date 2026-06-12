<div class="mb-3">
    <a href="<?php echo base_url('fakultas/tambah') ?>" class="btn btn-primary">Tambah Fakultas</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Fakultas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($fakultas as $f): ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo htmlspecialchars($f['fakultas_name']) ?></td>
                        <td>
                            <a href="<?php echo base_url('fakultas/ubah/'.$f['fakultas_id']) ?>" class="btn btn-sm btn-warning">Ubah</a>
                            <a href="<?php echo base_url('fakultas/hapus/'.$f['fakultas_id']) ?>" class="btn btn-sm btn-danger btn-hapus">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
