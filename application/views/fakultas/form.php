<div class="card shadow border-0 mb-4">
    <div class="card-header bg-secondary text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
        <div>
            <h5 class="mb-0 fw-bold"><?php echo isset($button) && $button === 'Update' ? 'Ubah Fakultas' : 'Tambah Fakultas'; ?></h5>
        </div>
        <a class="btn btn-light" href="<?php echo base_url('fakultas') ?>">Kembali</a>
    </div>
    <div class="card-body">
        <?php $is_edit = isset($row); ?>
        <form action="<?php echo isset($action) ? $action : ($is_edit ? base_url('fakultas/ubah/'.$row['fakultas_id']) : base_url('fakultas/tambah')) ?>" method="post">
            <div class="mb-3">
                <label class="form-label">ID Fakultas</label>
                <?php if ($is_edit): ?>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($row['fakultas_id']) ?>" disabled>
                <?php else: ?>
                    <input type="text" name="fakultas_id" class="form-control <?php echo form_error('fakultas_id') ? 'is-invalid' : (set_value('fakultas_id') !== null ? 'is-valid' : '') ?>" value="<?php echo set_value('fakultas_id') ?>" placeholder="Masukkan ID Fakultas">
                    <?php if (form_error('fakultas_id')): ?>
                        <div class="invalid-feedback"><?php echo form_error('fakultas_id') ?></div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Fakultas</label>
                <input type="text" name="fakultas_name" class="form-control <?php echo form_error('fakultas_name') ? 'is-invalid' : (set_value('fakultas_name') !== null ? 'is-valid' : '') ?>" value="<?php echo set_value('fakultas_name', $is_edit ? $row['fakultas_name'] : '') ?>" placeholder="Masukkan Nama Fakultas">
                <?php if (form_error('fakultas_name')): ?>
                    <div class="invalid-feedback"><?php echo form_error('fakultas_name') ?></div>
                <?php endif; ?>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><?php echo isset($button) ? $button : 'Simpan'; ?></button>
                <a href="<?php echo base_url('fakultas') ?>" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
