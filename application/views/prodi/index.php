<div class="mb-3">
    <a href="<?php echo base_url('prodi/tambah') ?>" class="btn btn-primary">Tambah Program Studi</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Fakultas</th>
                    <th>Strata</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($prodi as $p): ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo htmlspecialchars($p['prodi_name']) ?></td>
                        <td><?php echo htmlspecialchars($p['fakultas_name']) ?></td>
                        <td><?php echo htmlspecialchars($p['prodi_strata']) ?></td>
                        <td>
                            <a href="<?php echo base_url('prodi/ubah/'.$p['prodi_id']) ?>" class="btn btn-sm btn-warning">Ubah</a>
                            <a href="<?php echo base_url('prodi/hapus/'.$p['prodi_id']) ?>" class="btn btn-sm btn-danger btn-hapus">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
