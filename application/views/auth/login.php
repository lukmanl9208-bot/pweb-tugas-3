<div class="card shadow border-0 mb-4">
    <div class="card-header bg-secondary text-white">
        <h5 class="mb-0">Login</h5>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url('auth/login') ?>" method="post">
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
