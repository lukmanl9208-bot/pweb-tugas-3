<div class="card shadow border-0 mb-4">
    <div class="card-header bg-secondary text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
        <div>
            <h5 class="mb-0 fw-bold"><?php echo isset($button) && $button === 'Update' ? 'Ubah Program Studi' : 'Tambah Program Studi'; ?></h5>
        </div>
        <a class="btn btn-light" href="<?php echo base_url('prodi') ?>">Kembali</a>
    </div>
    <div class="card-body">
        <?php $is_edit = isset($row); ?>
        <form action="<?php echo isset($action) ? $action : ($is_edit ? base_url('prodi/ubah/'.$row['prodi_id']) : base_url('prodi/tambah')) ?>" method="post">
            <div class="mb-3">
                <label class="form-label">ID Prodi</label>
                <?php if ($is_edit): ?>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($row['prodi_id']) ?>" disabled>
                <?php else: ?>
                    <input type="text" name="prodi_id" class="form-control <?php echo form_error('prodi_id') ? 'is-invalid' : (set_value('prodi_id') !== null ? 'is-valid' : '') ?>" value="<?php echo set_value('prodi_id') ?>" placeholder="Masukkan ID Prodi">
                    <?php if (form_error('prodi_id')): ?>
                        <div class="invalid-feedback"><?php echo form_error('prodi_id') ?></div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Program Studi</label>
                <input type="text" name="prodi_name" class="form-control <?php echo form_error('prodi_name') ? 'is-invalid' : (set_value('prodi_name') !== null ? 'is-valid' : '') ?>" value="<?php echo set_value('prodi_name', $is_edit ? $row['prodi_name'] : '') ?>" placeholder="Masukkan Nama Program Studi">
                <?php if (form_error('prodi_name')): ?>
                    <div class="invalid-feedback"><?php echo form_error('prodi_name') ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Fakultas</label>
                <select name="fakultas_id" class="form-select <?php echo form_error('fakultas_id') ? 'is-invalid' : (set_value('fakultas_id') !== null ? 'is-valid' : '') ?>">
                    <option value="">-- Pilih Fakultas --</option>
                    <?php foreach ($fakultas as $f): ?>
                        <option value="<?php echo $f['fakultas_id'] ?>" <?php echo set_select('fakultas_id', $f['fakultas_id'], $is_edit && isset($row['fakultas_id']) && $row['fakultas_id'] == $f['fakultas_id']) ?>><?php echo htmlspecialchars($f['fakultas_name']) ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if (form_error('fakultas_id')): ?>
                    <div class="invalid-feedback"><?php echo form_error('fakultas_id') ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Strata</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input <?php echo form_error('prodi_strata') ? 'is-invalid' : (set_value('prodi_strata') !== null ? 'is-valid' : '') ?>" type="radio" name="prodi_strata" id="strata_s1" value="S1" <?php echo set_radio('prodi_strata', 'S1', $is_edit && isset($row['prodi_strata']) && $row['prodi_strata'] === 'S1') ?> />
                        <label class="form-check-label" for="strata_s1">S1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input <?php echo form_error('prodi_strata') ? 'is-invalid' : (set_value('prodi_strata') !== null ? 'is-valid' : '') ?>" type="radio" name="prodi_strata" id="strata_d3" value="D3" <?php echo set_radio('prodi_strata', 'D3', $is_edit && isset($row['prodi_strata']) && $row['prodi_strata'] === 'D3') ?> />
                        <label class="form-check-label" for="strata_d3">D3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input <?php echo form_error('prodi_strata') ? 'is-invalid' : (set_value('prodi_strata') !== null ? 'is-valid' : '') ?>" type="radio" name="prodi_strata" id="strata_s2" value="S2" <?php echo set_radio('prodi_strata', 'S2', $is_edit && isset($row['prodi_strata']) && $row['prodi_strata'] === 'S2') ?> />
                        <label class="form-check-label" for="strata_s2">S2</label>
                    </div>
                </div>
                <?php if (form_error('prodi_strata')): ?>
                    <div class="text-danger small mt-1"><?php echo form_error('prodi_strata') ?></div>
                <?php endif; ?>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><?php echo isset($button) ? $button : 'Simpan'; ?></button>
                <a href="<?php echo base_url('prodi') ?>" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
